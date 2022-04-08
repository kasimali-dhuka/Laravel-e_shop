@extends('layouts.front')

@section('title')
    {{ $category->name }} Products
@endsection

@section('content')

    <x-breadcrumbs :crumbs="[
        'Home' => route('frontend.index'),
        'Category' => route('frontend.category'),
        $category->name => route('frontend.category', ['slug' => $category->slug])
    ]" />

    <div class="py-5">
        <div class="container">
            <div class="row">
                <h1>{{ $category->name }}'s Products</h1>
                @forelse ($products as $product)
                    <div class="col-md-3 m-2">
                        <a href="{{ route('frontend.category', ['slug' => $category->slug, 'product' => $product->slug]) }}" class="text-decoration-none">
                            <div class="card h-100">
                                <div class="image text-center">
                                    <img src="{{ $product->img_url() }}" alt="{{ $product->name }}" height="200px" width="200px" class="product-img m-auto" style="object-fit:contain" />
                                </div>
                                <div class="card-body text-dark">
                                    <h5 class="text-decoration-underline">{{ $product->name }}</h5>
                                    <span class="fs-5 fw-bold">₹{{ $product->selling_price }}</span>
                                    <small><del>₹{{ $product->original_price }}</del></small>
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                    <div class="col-md-12">
                        <h2 class="text-center display-5 fw-bold">
                            ⚠ No Records Found ⚠
                        </h2>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection