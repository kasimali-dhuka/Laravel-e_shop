@extends('layouts.front')

@section('title')
    Category
@endsection

@section('content')
    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <h1>All Categories</h1>
                        @forelse ($category as $item)
                            <div class="col-md-4 mb-3">
                                <a href="{{ route('frontend.category', ['slug' => $item->slug]) }}" class="text-dark text-decoration-none">
                                    <div class="card h-100">
                                        <img src="{{ $item->img_url() }}" alt="{{ $item->name }}" class="w-100" height="300px" width="300px" style="object-fit:contain" class="category-img" />
                                        <div class="card-body">
                                            <h5 class="text-decoration-underline">{{ $item->name }}</h5>
                                            <p>
                                                {{ $item->description }}
                                            </p>
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
        </div>
    </div>
@endsection