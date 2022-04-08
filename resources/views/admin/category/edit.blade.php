@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Edit Category</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.categories.update', ['category' => $category->id]) }}" method="post" enctype="multipart/form-data">
                @method('PUT')
                <x-form :data="$category" form="category" />
            </form>
        </div>
    </div>

@endsection