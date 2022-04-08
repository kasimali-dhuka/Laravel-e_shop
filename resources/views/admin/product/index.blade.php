@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Category Page</h1>
        </div>
        <div class="card-body">
            <x-datatable :data="$products" table="products" />
        </div>
    </div>
@endsection
