@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Add Product</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.products.store') }}" method="post" enctype="multipart/form-data">
                <x-form form="products" :categories="$categories" />
            </form>
        </div>
    </div>

@endsection