@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Category Page</h1>
        </div>
        <div class="card-body">
            <x-datatable :data="$categories" table="categories" />
        </div>
    </div>
@endsection