<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCart;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cart_data = Cart::where('user_id', Auth::id())->get();
        return view('frontend.cart.index', [
            'cart_data' => $cart_data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCart $request)
    {
        if (Auth::check()) {
            $cart_data = $request->validated();
            $cart_data['user_id'] = Auth::id();
            
            if (Cart::where('prod_id', $cart_data['prod_id'])->where('user_id', $cart_data['user_id'])->exists()) {
                return response()->json([
                    'status' => 'warning',
                    'message' => 'Product already exists in the cart.'
                ]);
            }

            $cart = Cart::create($cart_data);

            return response()->json([
                'status' => 'success',
                'product_name' => $cart->product->name
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Join us for getting new and exciting offers',
                'redirect_url' => route('login')
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        try {
            $deleted_product = $cart->delete();
            return response()->json([
                'status' => 'success',
                'product' => $cart->product->name
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => 'Something went wrong !'
            ]);
        }
    }
}
