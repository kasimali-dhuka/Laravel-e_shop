@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Edit Product</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.products.update', ['product' => $product->id]) }}" method="post" enctype="multipart/form-data">
                @method('PUT')
                <x-form :data="$product" form="products" :categories="$categories" />
            </form>
        </div>
    </div>

@endsection