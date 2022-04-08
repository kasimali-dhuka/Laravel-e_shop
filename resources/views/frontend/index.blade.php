@extends('layouts.front')

@section('title')
    Welcome to E-Shop
@endsection

@section('content')
    @include('layouts.inc.slidebar')
    
    <div class="py-5">
        <div class="conatainer">
            <div class="row">
                <h1>Trending Products</h1>
                @if (!empty($trending_products))
                    <div class="trending-products">
                        @foreach ($trending_products as $product)
                            <div class="col-md-3 m-2">
                                <div class="card h-100">
                                    <div class="image text-center">
                                        <img src="{{ $product->img_url() }}" alt="{{ $product->name }}" height="200px" width="200px" class="product-img m-auto" style="object-fit:contain" />
                                    </div>
                                    <div class="card-body">
                                        <h5>{{ $product->name }}</h5>
                                        <span class="fs-5 fw-bold">₹{{ $product->selling_price }}</span>
                                        <small><del>₹{{ $product->original_price }}</del></small>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="col-md-12">
                        <h2 class="text-center display-5 fw-bold">
                            ⚠ No Records Found ⚠
                        </h2>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="py-5">
        <div class="conatainer">
            <div class="row">
                <h1>Trending Categories</h1>
                @if (!empty($trending_categories))
                    <div class="trending-products">
                        @foreach ($trending_categories as $category)
                            <div class="col-md-3 m-2">
                                <div class="card h-100">
                                    <div class="image text-center">
                                        <img src="{{ $category->img_url() }}" alt="{{ $category->name }}" height="200px" width="200px" class="product-img m-auto" style="object-fit:contain" />
                                    </div>
                                    <div class="card-body">
                                        <h5>{{ $category->name }}</h5>
                                        <p>{{ $category->description }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="col-md-12">
                        <h2 class="text-center display-5 fw-bold">
                            ⚠ No Records Found ⚠
                        </h2>
                    </div>
                @endif
            </div>
        </div>
    </div>
    
@endsection