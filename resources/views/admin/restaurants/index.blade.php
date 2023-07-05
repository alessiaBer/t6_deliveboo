@extends('layouts.admin')

@section('content')
    <h1 class="my-3">Restaurants</h1>
    {{-- <a class="btn btn-primary mb-3" href="{{ route('admin.restaurants.create') }}" role="button">New Restaurant</a> --}}
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
                    <th scope="col">image_url </th>
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
                            <img height="100" src="{{ asset('storage/' . $restaurant->image_url) }}" alt="{{ $restaurant->name }}">
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
                            <a class="btn btn-info my-1" href="{{ route('admin.restaurants.edit', $restaurant->slug) }}">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#modal-{{ $restaurant->id }}">
                                <i class="fa-regular fa-trash-can fa-fw"></i>
                            </button>
                        </td>
                    </tr>
                    <div class="modal fade" id="modal-{{ $restaurant->id }}" tabindex="-1" data-bs-backdrop="static"
                        data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitle-{{ $restaurant->id }}"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title text-dark" id="modalTitle-{{ $restaurant->id }}">Attenzione!</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body text-black">
                                    Sicuro di voler togliere questo ristorante?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                    <form action="{{ route('admin.restaurants.destroy', $restaurant->slug) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">delete</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <tr>
                        <td scope="row">No restaurants found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
