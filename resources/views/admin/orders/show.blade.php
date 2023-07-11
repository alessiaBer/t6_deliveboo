@extends('layouts.admin')

@section('content')
    @if (session('message'))
        <div class="alert alert-success" role="alert">
            <strong>{{ session('message') }}</strong>
        </div>
    @endif

    <div class="card overflow-hidden">
        <div class="card-header">
            <h2>{{ $order->status }}</h2>
        </div>
        <div class="card-body bg-dark text-light">
            <h4>order name:
                <br>
                <span class="fw-normal">{{ $order->fullname }}</span>
            </h4>
            <h4>Address:
                <br>
                <span class="fw-normal">{{ $order->address }}</span>
            </h4>
            <h4>Price:
                <br>
                <span class="fw-normal">{{ $order->total_price}}</span>
            </h4>
            <h4>Phone:
                <br>
                <span class="fw-normal">{{ $order->phone }}</span>
            </h4>
            <h4>Email:
                <br>
                <span class="fw-normal">{{ $order->email }}</span>
            </h4>


            {{--  <h4>order starting date:
                <br>
                <span class="fw-normal">{{ $order->created_at }}</span>
            </h4> --}}
        </div>
    </div>

    <div class="mt-2">
        <a class="btn btn-outline-light" href="{{ route('admin.orders.index') }}" role="button">Back</a>
    </div>
@endsection
