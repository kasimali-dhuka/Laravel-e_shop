@extends('layouts.front')

@section('title')
    Checkout | E-Shop
@endsection

@section('content')

    <x-breadcrumbs :crumbs="['Home' => route('frontend.index'), 'Checkout' => route('checkout.index') ]" />

    <div class="container-lg mt-5">
        <form action="{{ route('checkout.index') }}" method="POST">
            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <h6>Basic Details</h6>
                            <hr />
                            <x-checkoutform :formdata="$user_data" />
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            Order Details
                            <hr />
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <td>Name</td>
                                        <td>Quantity</td>
                                        <td>Price</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($cart_data as $item)
                                        <tr>
                                            <td>{{ $item->product->name }}</td>
                                            <td>{{ $item->prod_qty }}</td>
                                            <td>{{ $item->product->selling_price }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="10" class="fw-bold fs-4 text-center">
                                                Nothing to see here
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="button text-end">
                                <button class="btn btn-success ">Place Order</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </form>
    </div>
    
@endsection