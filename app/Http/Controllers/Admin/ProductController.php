<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProducts;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
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
        return view('admin.product.index', [
            'products' => Product::all()
        ]);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create', ['categories' => Category::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProducts $request)
    {
        $product_data = $request->validated();
        $product_data['status'] = $request->input('status') === 'true' ? '1' : '0';
        $product_data['trending'] = $request->input('trending') === 'true' ? '1' : '0';

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $file_name = time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('product', $file_name);
            $product_data['image'] = $path;
        }

        $product = Product::create($product_data);

        return redirect()->route('admin.products.index')->with('status', "Product Added Successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('admin.product.edit', [
            'product' => $product,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(CreateProducts $request, Product $product)
    {
        $updated_data = $request->validated();
        $updated_data['status'] = $request->input('status') === 'true' ? '1' : '0';
        $updated_data['trending'] = $request->input('trending') === 'true' ? '1' : '0';

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $file_name = time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('product', $file_name);
            if ($product->image) {
                Storage::delete($product->image);
            }
            $updated_data['image'] = $path;
        }

        $product->fill($updated_data);
        $product->save();

        return redirect()->route('admin.products.index')->with('status', "Product Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        try {
            $image_path = $product->image;
            $product->delete();
            
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
