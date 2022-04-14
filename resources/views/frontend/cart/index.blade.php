@extends('layouts.front')

@section('title')
    My Cart | E-Shop
@endsection

@section('content')

    <x-breadcrumbs :crumbs="['Home' => route('frontend.index'), 'Cart' => route('cart.index') ]" />
    
    @php
        $original_price = 0;
        $price = 0;
        $discount = 0;
        $counter = 0;
    @endphp
    <div class="container">
        <div class="card-shadow shadow-lg">
            <div class="card-body">
                @forelse ($cart_data as $item)
                    @php
                        $counter++;
                        $original_price += $item->product->original_price * $item->prod_qty;
                        $price += $item->product->selling_price * $item->prod_qty;
                        $discount += $item->product->original_price - $item->product->selling_price;
                    @endphp
                    <div class="row my-3 py-3 item-cart">
                        <div class="col-md-2 text-center">
                            <img 
                                src="{{ $item->product->img_url() }}" 
                                alt="{{ $item->product->name }}" 
                                width="100px" 
                                height="100px" 
                                style="object-fit:contain" 
                            />
                        </div>
                        <div class="col-md-5">
                            <h3 class="fs-4">
                                {{ $item->product->name }}
                            </h3>
                            <p class="fs-6 mb-1">
                                {{ $item->product->small_description }}
                            </p>
                            <P class="fw-bold">
                                ₹{{ $item->product->selling_price }}/-
                                <small class="fw-normal text-decoration-line-through ms-2">₹{{ $item->product->original_price }}/-</small>
                            </P>
                        </div>
                        <div class="col-md-3 text-center product-quantity">
                            <label for="Quantity" class="mb-1">Quantity</label>
                            <input type="hidden" value="{{ $item->prod_id }}" class="prod_id">
                            <div class="input-group text-center mb-3 m-auto" style="width:110px;">
                                <button class="input-group-text qty-btn" data-action="dec"> - </button>
                                <input 
                                    type="text" 
                                    name="quantity" 
                                    id="quantity" 
                                    value="{{ $item->prod_qty }}" 
                                    max="{{ $item->product->qty }}" 
                                    class="form-control shadow-none bg-light text-center prod_qty" 
                                    data-limit="{{ $item->product->qty }}"
                                    readonly
                                />
                                <button class="input-group-text qty-btn" data-action="inc"> + </button>
                            </div>
                        </div>
                        <div class="col-md-2 align-self-center">
                            <button class="btn btn-danger deleteCartProduct" data-id="{{ $item-> id }}">
                                <i class="fas fa-trash me-1"></i> DELETE
                            </button>
                        </div>
                    </div>
                    <hr />
                @empty
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="fs-2 fw-bold text-center">
                                ⚠ No Products ⚠
                            </h3>
                        </div>
                    </div>
                @endforelse
                <div class="price-wrapper mt-4">
                    <h4 class="border-bottom fw-bold text-secondary mb-3">PRICE DETAILS</h4>
                    <div class="price-details border-bottom" style="border-bottom-style:dashed!important;">
                        <div class="list d-flex justify-content-between mb-3 me-2">
                            <p class="m-0">Price ({{ $counter }} items)</p>
                            <span class="fw-bold">₹{{ $original_price }} </span>
                        </div>
                        <div class="list d-flex justify-content-between mb-3 me-2">
                            <p class="m-0">Discount</p>
                            <span class="text-success"> - ₹{{ $discount }} </span>
                        </div>
                        <div class="list d-flex justify-content-between mb-3 me-2">
                            <p class="m-0">Delivery</p>
                            <span class="text-success"> Free </span>
                        </div>
                    </div>
                    <div class="price-details border-bottom" style="border-bottom-style:dashed!important;">
                        <div class="list d-flex justify-content-between my-3 me-2">
                            <p class="m-0 fw-bold fs-5">Total Amount</p>
                            <span class="fs-5 fw-bold"> ₹{{ $price }} </span>
                        </div>
                    </div>
                    <div class="note mt-3">
                        <h6 class="text-success">You will save ₹{{ $original_price-$price }} on this order </h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection