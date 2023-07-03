@extends('layouts.admin')

@section('content')

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger" role="alert">
                <strong>{{ $error }}</strong>
            </div>
        @endforeach
    @endif

    <form action="{{ route('admin.restaurants.update', $restaurant) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $restaurant->name) }}" placeholder="Restaurant name">

            @error('name')
                <small class="text-danger">Please, fill the field correctly</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <input type="text" name="address" id="address" class="form-control @error('address') is-invalid @enderror"
                value="{{ old('address', $restaurant->address) }}" placeholder="Restaurant address">

            @error('address')
                <small class="text-danger">Please, fill the field correctly</small>
            @enderror

        </div>

        <div class="mb-3">
            <label for="p_iva" class="form-label">P. IVA</label>
            <input type="text" name="p_iva" id="p_iva" class="form-control @error('p_iva') is-invalid @enderror"
                value="{{ old('p_iva', $restaurant->p_iva) }}" placeholder="Restaurant p_iva">

            @error('p_iva')
                <small class="text-danger">Please, fill the field correctly</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">phone</label>
            <input type="text" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror"
                value="{{ old('phone', $restaurant->phone) }}" placeholder="Restaurant phone">

            @error('phone')
                <small class="text-danger">Please, fill the field correctly</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="created_at" class="form-label">Starting Date</label>
            <input type="date" name="created_at" id="created_at"
                class="form-control @error('created_at') is-invalid @enderror"
                placeholder="Restaurant creation date">

            @error('created_at')
                <small class="text-danger">Please, fill the field correctly</small>
            @enderror
        </div>

        <div class="d-flex">
            <img width="100" src="{{ asset('storage/' . $restaurant->image_url)}}" alt="{{$restaurant->image_url}}">
        </div>

        <div class="mb-3">
            <label for="image_url" class="form-label">Image</label>
            <input type="file" name="image_url" id="image_url"
                class="form-control @error('image_url') is-invalid @enderror" value="{{ old('image_url') }}"
                placeholder="restaurant image_url">

            @error('image_url')
                <small class="text-danger">Please, fill the field correctly</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror"
                placeholder="Restaurant description">{{ old('description', $restaurant->description) }}</textarea>
            @error('description')
                <small class="text-danger">Please, fill the field correctly</small>
            @enderror

        </div>

        <a class="btn btn-outline-light" href="{{ route('admin.restaurants.index') }}" role="button">Back</a>
        <button type="submit" class="btn btn-primary">Edit restaurant</button>
        <button type="reset" class="btn btn-danger">Reset fields</button>
    </form>
@endsection
