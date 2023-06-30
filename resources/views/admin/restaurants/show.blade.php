@extends('layouts.admin')

@section('content')
    @if (session('message'))
        <div class="alert alert-success" role="alert">
            <strong>{{ session('message') }}</strong>
        </div>
    @endif

    <div class="card overflow-hidden">
        <div class="card-header">
            <h2 class="mb-0">{{ $restaurant->slug }}</h2>
        </div>
        <div class="card-body bg-dark text-light">
            <h4>restaurant name:
                <br>
                <span class="fw-normal">{{ $restaurant->name }}</span>
            </h4>
            <h4>restaurant image:
                <br>
                <span>
                    <img height="100" src="{{ $restaurant->image_url }}" alt="{{ $restaurant->name }}">
                </span>
            </h4>
            <h4>description:
                <br>
                <span class="fw-normal">{{ $restaurant->description }}</span>
            </h4>
            <h4>address:
                <br>
                <span class="fw-normal">{{ $restaurant->address }}</span>
            </h4>
            <h4>P.IVA:
                <br>
                <span class="fw-normal">{{ $restaurant->p_iva }}</span>
            </h4>
            <h4>Phone:
                <br>
                {{ $restaurant->phone }}
            </h4>

            <h4>restaurant starting date:
                <br>
                <span class="fw-normal">{{ $restaurant->created_at }}</span>
            </h4>
        </div>
    </div>

    <div class="mt-2">
        <a class="btn btn-outline-light" href="{{ route('admin.restaurants.index') }}" role="button">Back</a>
    </div>
@endsection
