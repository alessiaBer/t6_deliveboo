@extends('layouts.admin')

@section('content')
    @if (session('message'))
        <div class="alert alert-success" role="alert">
            <strong>{{ session('message') }}</strong>
        </div>
    @endif

    <div class="card overflow-hidden">
        <div class="card-header">
            <h2 class="mb-0">{{ $plate->slug }}</h2>
        </div>
        <div class="card-body bg-dark text-light">
            <h4>Plate name:
                <br>
                <span class="fw-normal">{{ $plate->name }}</span>
            </h4>
            <h4>Plate image:
                <br>
                <span>
                    <img height="100" src="{{ $plate->image_url }}" alt="{{ $plate->name }}">
                </span>
            </h4>
            <h4>Description:
                <br>
                <span class="fw-normal">{{ $plate->description }}</span>
            </h4>
            <h4>Price:
                <br>
                <span class="fw-normal">{{ $plate->price }}</span>
            </h4>
            <h4>Is Available
                <br>
                <span class="fw-normal">{{ $plate->is_available }}</span>
            </h4>


            {{--  <h4>plate starting date:
                <br>
                <span class="fw-normal">{{ $plate->created_at }}</span>
            </h4> --}}
        </div>
    </div>

    <div class="mt-2">
        <a class="btn btn-outline-light" href="{{ route('admin.plates.index') }}" role="button">Back</a>
    </div>
@endsection
