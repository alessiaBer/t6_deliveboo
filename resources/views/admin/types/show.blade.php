@extends('layouts.admin')

@section('content')
    @if (session('message'))
        <div class="alert alert-success" role="alert">
            <strong>{{ session('message') }}</strong>
        </div>
    @endif

    <div class="card overflow-hidden">
        <div class="card-header">
            <h2 class="mb-0">{{ $type->slug }}</h2>
        </div>
        <div class="card-body bg-dark text-light">
            <h4>Type name:
                <br>
                <span class="fw-normal">{{ $type->name }}</span>
            </h4>
           
           


            {{--  <h4>type starting date:
                <br>
                <span class="fw-normal">{{ $type->created_at }}</span>
            </h4> --}}
        </div>
    </div>

    <div class="mt-2">
        <a class="btn btn-outline-light" href="{{ route('admin.types.index') }}" role="button">Back</a>
    </div>
@endsection
