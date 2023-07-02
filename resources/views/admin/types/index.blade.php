@extends('layouts.admin')

@section('content')
<h1 class="my-3">Types</h1>
    <a class="btn btn-primary mb-3" href="{{ route('admin.restaurants.create') }}" role="button">New Type</a>
    @if (session('message'))
        <div class="alert alert-success" role="alert">
            <strong>{{ session('message') }}</strong>
        </div>
    @endif
    {{--TODO CRUDS--}}

    <ul>
        @forelse ($types as $type)
        <li>{{$type->name}}</li>
        @empty
        <li>No types recorded</li>
        @endforelse
    </ul>

@endsection