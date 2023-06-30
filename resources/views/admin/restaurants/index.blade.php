@extends('layouts.admin')

@section('content')
<h1 class="my-3">Restaurants</h1>
    @if (session('message'))
        <div class="alert alert-success" role="alert">
            <strong>{{ session('message') }}</strong>
        </div>
    @endif

    <div class="table-responsive rounded mb-3">
        <table class="table table-striped">
            <thead>
                <tr class="align-middle">
                    <th scope="col">ID</th>
                    <th scope="col">image_url</th>
                    <th scope="col">user_id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">P_iva</th>
                    <th scope="col">phone</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($restaurants as $restaurant)
                    <tr class="align-middle">
                        <td scope="row">{{ $restaurant->id }}</td>
                        <td scope="row">
                            <img height="100" src="{{ $restaurant->image_url }}" alt="{{ $restaurant->name }}">
                        </td>
                        <td scope="row">{{ $restaurant->user_id }}</td>
                        <td scope="row">{{ $restaurant->name }}</td>
                        <td scope="row">{{ $restaurant->address }}</td>
                        <td scope="row">{{ $restaurant->p_iva }}</td>
                        <td scope="row">{{ $restaurant->phone }}</td>
                        <td scope="row">
                            <a class="btn btn-success" href="{{ route('admin.restaurants.show', $restaurant->slug) }}">
                                <i class="fa-regular fa-eye fa-fw"></i>
                            </a>
                        </td>
                    </tr>

                @empty
                    <tr>
                        <td scope="row">No projects found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
