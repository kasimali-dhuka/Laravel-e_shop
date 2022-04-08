<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $featured_products = Product::where('trending', 1)->take(10)->get();
        $trending_categories = Category::where('popular', 1)->take(10)->get();
        return view('frontend.index', [
            'trending_products' => $featured_products,
            'trending_categories' => $trending_categories
        ]);
    }

    public function category($slug=null, $product=null)
    {
        if ($slug !== null) {

            if ($product !== null) {
                $product = Product::where('slug', $product)->first();
                return view('frontend.products.view', [
                    'product' => $product
                ]);
            }

            $category = Category::where('slug', $slug)->first();
            $products = $category->product;
            return view('frontend.products.index', [
                'category' => $category,
                'products' => $products
            ]);
        } else {
            $category = Category::where('status', 0)->get();
            return view('frontend.category', ['category' => $category]);
        }
    }
}
