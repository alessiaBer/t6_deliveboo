@extends('layouts.app')

@section('content')
    <div class="container p-5">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="list-unstyled">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <h2 class="text-center text-dark text-uppercase">you are currently editing the item #{{ $plate->id }}</h2>
        <h2 class="text-center text-dark text-uppercase">{{ $plate->name }}</h2>
        <form action="{{ route('admin.plates.update', $plate) }}" method="post" class="text-light bg-dark rounded p-5" enctype="multipart/form-data">
            @csrf
            @method('PUT')


            <div class="mb-3">
                <label for="name" class="form-label text-uppercase">name</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                    placeholder="only name there" aria-describedby="nameHelper" value="{{ old('name', $plate->name) }}">
                <small id="nameHelper" class="text-muted text-uppercase">insert the name</small>
                @error('name')
                    <div class="alert alert-danger p-3 m-3" role="alert">
                        <strong>error: </strong>{{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label text-uppercase">Description</label>
                <input type="text" name="description" id="description"
                    class="form-control @error('description') is-invalid @enderror" placeholder="only description there"
                    aria-describedby="nameHelper" value="{{ old('description', $plate->description) }}">
                <small id="nameHelper" class="text-muted text-uppercase">insert the description</small>
                @error('name')
                    <div class="alert alert-danger p-3 m-3" role="alert">
                        <strong>error: </strong>{{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="price" class="form-label text-uppercase">Price</label>
                <input type="text" name="price" id="price"
                    class="form-control @error('price') is-invalid @enderror" placeholder="only price there"
                    aria-describedby="nameHelper" value="{{ old('price', $plate->price) }}">
                <small id="nameHelper" class="text-muted text-uppercase">insert the price</small>
                @error('name')
                    <div class="alert alert-danger p-3 m-3" role="alert">
                        <strong>error: </strong>{{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="{{old('is_available', $plate->is_available)}}" {{$plate->is_available ? 'checked' : ''}} id="is_available" name="is_available">
                <label class="form-check-label text-white" for="is_available">
                    Is Available?
                </label>
                @error('is_available')
                    <small class="text-danger">Please, fill the field correctly</small>
                @enderror
            </div>

            <div class="d-flex">
                <img width="100" src="{{ asset('storage/' . $plate->image_url)}}" alt="{{$plate->image_url}}">
            </div>

            <div class="mb-3">
                <label for="image_url" class="form-label">Image</label>
                <input type="file" name="image_url" id="image_url"
                    class="form-control @error('image_url') is-invalid @enderror" value="{{ old('image_url') }}"
                    placeholder="plate image_url">
    
                @error('image_url')
                    <small class="text-danger">Please, fill the field correctly</small>
                @enderror
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-warning text-uppercase mx-3"
                    href="{{ route('admin.plates.index') }}">Save</button>
                <button type="reset" class="btn btn-danger text-uppercase mx-3">Reset</button>
                <a class="btn btn-secondary text-uppercase mx-3" href="{{ route('admin.plates.index') }}">back</a>
            </div>
        </form>
    </div>
@endsection
