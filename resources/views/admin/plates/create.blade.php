@extends('layouts.admin')

@section('content')
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger" role="alert">
                <strong>{{ $error }}</strong>
            </div>
        @endforeach
    @endif

    <form action="{{ route('admin.plates.store') }}" method="post" id="validation" enctype="multipart/form-data"
        class="needs-validation">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name') }}" placeholder="plate name">
            <div class="invalid-feedback fw-bold"></div>
            {{-- @error('name')
                <small class="text-danger">Please, fill the field correctly</small>
            @enderror --}}
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="text" name="description" id="description"
                class="form-control @error('description') is-invalid @enderror" value="{{ old('description') }}"
                placeholder="plate description">
            <div class="invalid-feedback fw-bold"></div>
            {{-- 
            @error('description')
                <small class="text-danger">Please, fill the field correctly</small>
            @enderror --}}

        </div>

        <div class="mb-3">
            <label for="image_url" class="form-label">Image Url</label>
            <input type="file" name="image_url" id="image_url"
                class="form-control @error('image_url') is-invalid @enderror" value="{{ old('image_url') }}"
                placeholder="plate image_url">
            <div class="invalid-feedback fw-bold"></div>

        </div>

        <div class="mb-3">
            <label for="price" class="form-label">price</label>
            <input type="number" name="price" id="price" class="form-control @error('price') is-invalid @enderror"
                value="{{ old('price') }}" placeholder="plate price">
            <div class="invalid-feedback fw-bold"></div>

        </div>

        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="1" id="is_available" name="is_available">
            <label class="form-check-label text-white" for="is_available">
                Is Available?
            </label>

        </div>

        <a class="btn btn-outline-light" href="{{ route('admin.plates.index') }}" role="button">Back</a>
        <button type="submit" class="btn btn-primary">Insert plate</button>
        <button type="reset" class="btn btn-danger">Reset fields</button>
    </form>

    <script>
        const form = document.getElementById('validation');
        const nameInput = document.getElementById('name');
        const imageInput = document.getElementById('image_url');
        const descriptionInput = document.getElementById('description');
        const priceInput = document.getElementById('price');

        const inputs = [nameInput, imageInput, descriptionInput, priceInput];

        form.addEventListener('submit', function(event) {
            let isValidForm = true;

            inputs.forEach(input => {
                if (!isValidInput(input)) {
                    event.preventDefault();
                    isValidForm = false;
                } else {
                    input.nextElementSibling.textContent = '';
                }
            });
        });

        inputs.forEach(input => {
            input.addEventListener('input', function() {
                if (isValidInput(input)) {
                    input.classList.remove('is-invalid');
                    input.classList.add('is-valid');
                    input.nextElementSibling.textContent = '';
                } else {
                    input.classList.add('is-invalid');
                    input.classList.remove('is-valid');
                    input.nextElementSibling.textContent = getErrorMessage(input);
                }
            });
        });

        function isValidInput(input) {
            if (input === nameInput) {
                return isValidName(nameInput.value);
            } else if (input === imageInput) {
                return isValidImage(imageInput.value);
            } else if (input === descriptionInput) {
                return isValidDescription(descriptionInput.value);
            } else if (input === priceInput) {
                return isValidPrice(priceInput.value);
            }

            return true;
        }

        function getErrorMessage(input) {
            if (input === nameInput) {
                return 'Name must have at least 3 letters';
            } else if (input === imageInput) {
                return 'Invalid image format';
            } else if (input === descriptionInput) {
                return 'Description must have at least 6 letters';
            } else if (input === priceInput) {
                return 'Price must have at least 2 digits';
            }
            return '';
        }

        function isValidName(nameInput) {
            return nameInput.trim().length >= 3;
        }

        function isValidAddress(addressInput) {
            return addressInput.trim().length >= 6;
        }


        function isValidImage(imageInput) {
            const formats = ['.png', '.jpeg', '.jpg', '.gif', '.svg'];

            for (let i = 0; i < formats.length; i++) {
                const format = formats[i];
                //console.log(format);
                if (imageInput.includes(format)) {
                    return true;
                }
            }
            return false
        }

        function isValidDescription(descriptionInput) {
            return descriptionInput.trim().length >= 6;
        }

        function isValidPrice(priceInput) {
            const priceRegex = /^[0-9]+\.[0-9]{2}$/;
            return priceRegex.test(priceInput);
        }
    </script>
@endsection
