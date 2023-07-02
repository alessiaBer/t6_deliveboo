@extends('layouts.admin')

@section('content')
    @if (session('message'))
        <div class="alert alert-success" role="alert">
            <strong>{{ session('message') }}</strong>
        </div>
    @endif
    <a name="add" id="add" class="text-uppercase text-white btn btn-info mb-3" href="{{ route('admin.plates.create') }}"
        role="button">Add New Plate</a>


    <div class="table-responsive rounded mb-3">
        <table class="table table-striped">
            <thead>
                <tr class="align-middle">
                    <th scope="col">ID</th>
                    <th scope="col">image_url</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Is Available</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($plates as $plate)
                
                    <tr class="align-middle">
                        <td scope="row">{{ $plate->id }}</td>
                        <td scope="row">
                            <img height="100" src="{{ $plate->image_url }}" alt="{{ $plate->name }}">
                        </td>
                        <td scope="row">{{ $plate->name }}</td>
                        <td scope="row">{{ $plate->price }}</td>
                        <td scope="row">{{ $plate->is_available }}</td>
                        <td scope="row">
                            <a class="btn btn-success" href="{{ route('admin.plates.edit', $plate) }}">
                                <i class="fa-solid fa-pen-to-square text-white"></i>
                            </a>
                            <a class="btn btn-info" href="{{ route('admin.plates.show', $plate) }}">
                                <i class="fa-solid fa-eye text-white"></i>
                            </a>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#modal-{{ $plate->id }}">
                                <i class="fa-regular fa-trash-can fa-fw"></i>
                            </button>
                        </td>
                    </tr>
                    <div class="modal fade" id="modal-{{ $plate->id }}" tabindex="-1" data-bs-backdrop="static"
                        data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitle-{{ $plate->id }}"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title text-dark" id="modalTitle-{{ $plate->id }}">Attenzione!
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body text-black">
                                    Sicuro di voler cancellare il piatto?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                    <form action="{{ route('admin.plates.destroy', $plate->slug) }}"
                                        method="POST">
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
                        <td scope="row">No plates found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
