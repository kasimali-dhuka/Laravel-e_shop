<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart_data = [];
        $data = Cart::where('user_id', Auth::id())->get();
        foreach ($data as $key => $item) {
            if ($item->product->qty >= $item->prod_qty) {
                array_push($cart_data, $item);
            }
        }
        return view('frontend.checkout', [
            'cart_data' => $cart_data,
            'user_data' => Auth::user()
        ]);
    }

    public function placeOrder()
    {

    }
}
