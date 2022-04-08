<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCategories;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('isAdmin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.category.index', ['categories' => Category::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategories $request)
    {
        $category_data = $request->validated();
        $category_data['status'] = $request->input('status') === 'true' ? '1' : '0';
        $category_data['popular'] = $request->input('popular') === 'true' ? '1' : '0';

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $file_name = time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('category', $file_name);
            $category_data['image'] = $path;
        }

        $category = Category::create($category_data);

        return redirect()->route('admin.categories.index')->with('status', "Category Added Successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CreateCategories $request, Category $category)
    {
        $updated_data = $request->validated();
        $updated_data['status'] = $request->input('status') === 'true' ? '1' : '0';
        $updated_data['popular'] = $request->input('popular') === 'true' ? '1' : '0';

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $file_name = time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('category', $file_name);
            if ($category->image) {
                Storage::delete($category->image);
            }
            $updated_data['image'] = $path;
        }

        $category->fill($updated_data);
        $category->save();

        return redirect()->route('admin.categories.index')->with('status', 'Category Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        try {
            $image_path = $category->image;
            $category->delete();
            
            if (isset($image_path) && Storage::exists($image_path)) {
                Storage::delete($image_path);
            }

            return json_encode([
                'status' => 'success',
            ]);
        } catch (\Throwable $th) {
            return json_encode([
                'status' => 'error',
                'message' => 'Something went wrong!'
            ]);
        }
    }
}
