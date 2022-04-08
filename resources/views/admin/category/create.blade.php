@extends('layouts.admin')

@section('content')

    <div class="card">
        <div class="card-header">
            <h1>Add Category</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.categories.store') }}" method="post" enctype="multipart/form-data">
                <x-form form="category" />
            </form>
        </div>
    </div>

@endsection