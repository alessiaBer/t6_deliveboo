@extends('layouts.admin')

@section('content')
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger" role="alert">
                <strong>{{ $error }}</strong>
            </div>
        @endforeach
    @endif

    <form action="{{ route('admin.types.store') }}" method="post">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name') }}" placeholder="plate name">

            @error('name')
                <small class="text-danger">Please, fill the field correctly</small>
            @enderror
        </div>
        
        <a class="btn btn-outline-light" href="{{ route('admin.types.index') }}" role="button">Back</a>
        <button type="submit" class="btn btn-primary">Insert types</button>
        <button type="reset" class="btn btn-danger">Reset fields</button>
    </form>
@endsection
