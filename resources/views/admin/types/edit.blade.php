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
        <h2 class="text-center text-dark text-uppercase">you are currently editing the item #{{ $type->id }}</h2>
        <h2 class="text-center text-dark text-uppercase">{{ $type->name }}</h2>
        <form action="{{ route('admin.types.update', $type) }}" method="post" class="text-light bg-dark rounded p-5">
            @csrf
            @method('PUT')


            <div class="mb-3">
                <label for="name" class="form-label text-uppercase">name</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                    placeholder="only name there" aria-describedby="nameHelper" value="{{ old('name', $type->name) }}">
                <small id="nameHelper" class="text-muted text-uppercase">insert the name</small>
                @error('name')
                    <div class="alert alert-danger p-3 m-3" role="alert">
                        <strong>error: </strong>{{ $message }}
                    </div>
                @enderror
            </div>


            <div class="text-center">
                <button type="submit" class="btn btn-warning text-uppercase mx-3"
                    href="{{ route('admin.types.index') }}">Save</button>
                <button type="reset" class="btn btn-danger text-uppercase mx-3">Reset</button>
                <a class="btn btn-secondary text-uppercase mx-3" href="{{ route('admin.types.index') }}">Back</a>
            </div>
        </form>
    </div>
@endsection
