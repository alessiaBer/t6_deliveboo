@extends('layouts.admin')

@section('content')
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger" role="alert">
                <strong>{{ $error }}</strong>
            </div>
        @endforeach
    @endif

    <form action="{{ route('admin.plates.store') }}" method="post">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name') }}" placeholder="plate name">

            @error('name')
                <small class="text-danger">Please, fill the field correctly</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="text" name="description" id="description"
                class="form-control @error('description') is-invalid @enderror" value="{{ old('description') }}"
                placeholder="plate description">

            @error('description')
                <small class="text-danger">Please, fill the field correctly</small>
            @enderror

        </div>

        <div class="mb-3">
            <label for="image_url" class="form-label">Image Url</label>
            <input type="text" name="image_url" id="image_url"
                class="form-control @error('image_url') is-invalid @enderror" value="{{ old('image_url') }}"
                placeholder="plate image_url">

            @error('image_url')
                <small class="text-danger">Please, fill the field correctly</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">price</label>
            <input type="text" name="price" id="price" class="form-control @error('price') is-invalid @enderror"
                value="{{ old('price') }}" placeholder="plate price">

            @error('price')
                <small class="text-danger">Please, fill the field correctly</small>
            @enderror
        </div>

        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="1" id="is_available"
                name="is_available">
            <label class="form-check-label text-white" for="is_available">
                Is Available?
            </label>
            @error('is_available')
                <small class="text-danger">Please, fill the field correctly</small>
            @enderror
        </div>

        <a class="btn btn-outline-light" href="{{ route('admin.plates.index') }}" role="button">Back</a>
        <button type="submit" class="btn btn-primary">Insert plate</button>
        <button type="reset" class="btn btn-danger">Reset fields</button>
    </form>
@endsection
