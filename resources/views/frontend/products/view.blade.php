@extends('layouts.front')

@section('title')
    {{ $product->name }}
@endsection

@section('content')

    <x-breadcrumbs :crumbs="[
        'Home' => route('frontend.index'),
        'Category' => route('frontend.category'),
        $product->category->name => route('frontend.category', ['slug' => $product->category->slug]),
        $product->name => ''
    ]" />

    <div class="container-lg">
        <div class="card-shadow shadow">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 border-right">
                        <img src="{{ $product->img_url() }}" alt="{{ $product->name }}" class="w-100" width="320px" height="320px" style="object-fit:contain" />
                    </div>
                    <div class="col-md-8">
                        <h2 class="mb-0">
                            {{ $product->name }}
                            @if ($product->trending == 1)
                                <label style="font-size:16px" class="float-end badge bg-danger tending_tag">Trending</label>
                            @endif
                        </h2>
                        <hr />
                        <label class="me-3">Original Price : <s>₹{{ $product->original_price }}</s> </label>
                        <label class="fw-bold">Selling Price : ₹{{ $product->selling_price }} </label>
                        <p class="mt-3">
                            {{ $product->small_description }}
                        </p>
                        <hr />
                        @if ($product->qty > 0)
                            <label class="badge bg-success">In Stock</label>
                        @else
                            <label class="badge bg-danger">Out of Stock</label>
                        @endif
                        <div class="row mt-2 product-quantity">
                            <div class="col-xl-2 col-md-3">
                                <label for="Quantity">Quantity</label>
                                <div class="input-group text-center mb-3" style="width: 110px">
                                    <input type="hidden" value="{{ $product->id }}" class="prod_id">
                                    <button class="input-group-text qty-btn" data-action="dec"> - </button>
                                    <input 
                                        type="text" 
                                        name="quantity" 
                                        id="quantity" 
                                        value="1" 
                                        max="{{ $product->qty }}" 
                                        class="form-control shadow-none bg-light text-center prod_qty" 
                                        data-limit="{{ $product->qty }}"
                                        readonly
                                    />
                                    <button class="input-group-text qty-btn" data-action="inc"> + </button>
                                </div>
                            </div>
                            <div class="col-xl-10 col-md-9">
                                <br />
                                <button class="btn btn-success me-3 float-start">
                                    Add to Wishlist
                                    <i class="ms-1  fas fa-heart"></i>
                                </button>
                                <button class="btn btn-primary me-3 float-start addToCartBtn">
                                    Add to Cart
                                    <i class="ms-1 fas fa-shopping-cart"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <hr />
                <div class="content">
                    <h4>Description</h4>
                    <p>{{ $product->description }}</p>
                </div>
                <hr />
                <div class="price-wrapper">
                    <div class="price">
                        <h5 class="text-end">
                            Total Price : ₹ <span class="cart-price" data-price="{{ $product->selling_price }}">{{ $product->selling_price }}</span> /-
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection