@extends('layouts.front')

@section('title')
    My Cart | E-Shop
@endsection

@section('content')

    <x-breadcrumbs :crumbs="['Home' => route('frontend.index'), 'Cart' => route('cart.index') ]" />
    
    <div class="container">
        <div class="card-shadow">
            <div class="card-body">
                @forelse ($cart_data as $item)
                    <div class="row my-3 py-3 shadow item-cart">
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
                            <p class="fs-6">
                                {{ $item->product->small_description }}
                            </p>
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
                @empty
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="fs-2 fw-bold">
                                ⚠ No Products ⚠
                            </h3>
                        </div>
                    </div>
                @endforelse
                    
            </div>
        </div>
    </div>
@endsection