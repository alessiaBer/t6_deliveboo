@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" id="validation" action="{{ route('register') }}" enctype="multipart/form-data"
                            class="needs-validation">
                            @csrf

                            <div class="mb-4 row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="text" class="form-control" name="email" value="">
                                    <div class="invalid-feedback fw-bold"></div>
                                </div>

                            </div>

                            <div class="mb-4 row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password"
                                        autocomplete="new-password">


                                    <div class="invalid-feedback fw-bold">

                                    </div>
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" autocomplete="new-password">
                                    <div class="invalid-feedback fw-bold"></div>
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Activity Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name"
                                        value="{{ old('name') }}" autocomplete="name" autofocus>
                                    <div class="invalid-feedback fw-bold"></div>
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="address"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                                <div class="col-md-6">
                                    <input id="address" type="text" class="form-control" name="address"
                                        value="{{ old('address') }}" autocomplete="address" autofocus>
                                    <div class="invalid-feedback fw-bold"></div>
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="p_iva"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Partita Iva') }}</label>

                                <div class="col-md-6">
                                    <input id="p_iva" type="text" class="form-control" name="p_iva"
                                        value="{{ old('p_iva') }}"="" autocomplete="p_iva" autofocus>

                                    <div class="invalid-feedback fw-bold"></div>

                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="phone"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                                <div class="col-md-6">

                                    <input id="phone" type="text" class="form-control" name="phone"
                                        value="{{ old('phone') }}"="" autocomplete="phone" autofocus>

                                    <div class="invalid-feedback">
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="image_url"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Image Url') }}</label>

                                <div class="col-md-6">
                                    <input id="image_url" type="file" class="form-control" name="image_url"
                                        value="{{ old('image_url') }}" autocomplete="image_url" autofocus>
                                    <div class="invalid-feedback fw-bold"></div>
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="description"
                                    class="col-md-4 col-form-label text-md-right">{{ __('description') }}</label>

                                <div class="col-md-6">
                                    <textarea id="description" type="text" class="form-control" name="description" autocomplete="description"
                                        autofocus>{{ old('description') }}</textarea>
                                    <div class="invalid-feedback fw-bold"></div>
                                </div>
                            </div>

                            <div class="container">
                                <div class='form-group'>
                                    <label class='form-label'>Select types:</label>
                                    @foreach ($types as $type)
                                        <div class="form-check">
                                            <label class='form-check-label'>
                                                <input name='types[]' type='checkbox' value='{{ $type->id }}'
                                                    class='form-check-input custom-checked'
                                                    {{ in_array($type->id, old('types', [])) ? 'checked' : '' }}>
                                                {{ $type->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                    <div class="invalid-feedback fw-bold"></div>
                                </div>
                            </div>

                            <div class="mb-4 row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary" id="submit">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const form = document.getElementById('validation');
        const emailInput = document.getElementById('email');
        const passwordInput = document.getElementById('password');
        const confirmPasswordInput = document.getElementById('password-confirm');
        const nameInput = document.getElementById('name');
        const addressInput = document.getElementById('address');
        const pIvaInput = document.getElementById('p_iva');
        const phoneInput = document.getElementById('phone');
        const imageInput = document.getElementById('image_url');
        const descriptionInput = document.getElementById('description');

        const inputs = [emailInput, passwordInput, confirmPasswordInput, nameInput, addressInput, pIvaInput, phoneInput,
            imageInput, descriptionInput
        ];

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
            if (input === emailInput) {
                return isValidEmail(input.value);
            } else if (input === passwordInput) {
                return isValidPassword(input.value);
            } else if (input === confirmPasswordInput) {
                return isValidConfirmPassword(confirmPasswordInput.value);
            } else if (input === nameInput) {
                return isValidName(nameInput.value);
            } else if (input === addressInput) {
                return isValidAddress(addressInput.value);
            } else if (input === pIvaInput) {
                return isValidPIva(pIvaInput.value);
            } else if (input === phoneInput) {
                return isValidPhone(phoneInput.value);
            } else if (input === imageInput) {
                return isValidImage(imageInput.value);
            } else if (input === descriptionInput) {
                return isValidDescription(descriptionInput.value);
            } else if (input === checkInput) {
                return isValidCheck(checkInput);
            }

            return true;
        }

        function getErrorMessage(input) {
            if (input === emailInput) {
                return `Invalid email address`;
            } else if (input === passwordInput) {
                return 'Invalid password';
            } else if (input === confirmPasswordInput) {
                return 'Passwords do not match';
            } else if (input === nameInput) {
                return 'Name must have at least 3 letters';
            } else if (input === addressInput) {
                return 'Address must have at least 6 letters';
            } else if (input === pIvaInput) {
                return 'P. Iva must have 11 digits';
            } else if (input === phoneInput) {
                return 'Invalid phone number';
            } else if (input === imageInput) {
                return 'Invalid image format';
            } else if (input === descriptionInput) {
                return 'Description must have at least 6 letters';
            } else if (input === checkInput) {
                return 'Must be at least 1 checked';
            }
            return '';
        }

        function isValidEmail(email) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailRegex.test(email);
        }

        function isValidPassword(password) {
            const space = ' ';
            if (password.includes(space)) {
                return false;
            }
            return password.length > 9;
        }

        function isValidConfirmPassword(confirmPassword) {
            return confirmPassword === passwordInput.value;
        }

        function isValidName(nameInput) {
            return nameInput.trim().length >= 3;
        }

        function isValidAddress(addressInput) {
            return addressInput.trim().length >= 6;
        }

        function isValidPIva(pIvaInput) {
            const pIvaRegex = /^[Z0-9\D]{11}$/
            return pIvaRegex.test(pIvaInput);
        }

        function isValidPhone(phoneInput) {
            const phoneRegex = /^[\+-Z0-9\D]{8,16}$/
            return phoneRegex.test(phoneInput);
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

        // const checkInput = document.getElementsByClassName('custom-checked');

        // function isValidCheck(checkInput) {
        //     let checkedCount = 0
        //     for (var i = 0; i < checkInput.length; i++) {
        //         if (checkInput[i].checked) {
        //             checkedCount++;
        //         }
        //     }
        //     if (checkedCount === 0) {
        //         event.preventDefault();
        //         //messaggio errore che vuoi porcoddio;
        //     }
        // }
    </script>
@endsection
