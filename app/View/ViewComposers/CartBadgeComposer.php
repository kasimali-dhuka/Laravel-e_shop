<?php

namespace App\View\ViewComposers;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class CartBadgeComposer 
{
    public function compose(View $view)
    {
        $cart_count = Cart::where('user_id', Auth::id())->count();
        $view->with('cart_count', $cart_count);
    }
}