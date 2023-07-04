@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" id="validation" action="{{ route('register') }}" enctype="multipart/form-data"
                            class="needs-validation was-validated">
                            @csrf

                            <div class="mb-4 row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email"
                                        value="" required>
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password"
                                        autocomplete="new-password" required>

                                    <div class="invalid-feedback">

                                    </div>
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Activity Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="address"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                                <div class="col-md-6">
                                    <input id="address" type="text" class="form-control" name="address"
                                        value="{{ old('address') }}" required autocomplete="address" autofocus>
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="p_iva"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Partita Iva') }}</label>

                                <div class="col-md-6">
                                    <input id="p_iva" type="text" class="form-control" name="p_iva"
                                        value="{{ old('p_iva') }}" required="" autocomplete="p_iva" pattern="[0-9]{11}"
                                        autofocus>

                                    <div class="invalid-feedback">
                                        <strong>Please provide an 11 digits p.iva</strong>
                                    </div>

                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="phone"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                                <div class="col-md-6">

                                    <input id="phone" type="text" class="form-control" name="phone"
                                        value="{{ old('phone') }}" required="" autocomplete="phone"
                                        pattern="[0-9]{10-12}" autofocus>

                                    <div class="invalid-feedback">
                                        <strong>Please provide a number between 10/12 digits</strong>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="image_url"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Image Url') }}</label>

                                <div class="col-md-6">
                                    <input id="image_url" type="file" class="form-control" name="image_url"
                                        value="{{ old('image_url') }}" required autocomplete="image_url" autofocus>
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="description"
                                    class="col-md-4 col-form-label text-md-right">{{ __('description') }}</label>

                                <div class="col-md-6">
                                    <textarea id="description" type="text" class="form-control" name="description" required
                                        autocomplete="description" autofocus>{{ old('description') }}</textarea>
                                </div>
                            </div>

                            <div class='form-group'>
                                <label class='form-label'>Select types:</label>
                                @foreach ($types as $type)
                                    <div class="form-check">
                                        <label class='form-check-label'>
                                            <input name='types[]' type='checkbox' value='{{ $type->id }}'
                                                class='form-check-input'
                                                {{ in_array($type->id, old('types', [])) ? 'checked' : '' }}>
                                            {{ $type->name }}
                                        </label>
                                    </div>
                                @endforeach
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

        form.addEventListener('click', function(){
            // console.log('ciao');

            const emailInput = document.getElementById("email");
            const pattern = /^[a-z0-9._%+-]+@[a-z0-9.-]+.[a-z]{2,4}$/;

            if (pattern.test(emailInput.value)) {
                console.log('si');
            } else{
                console.log('no');
            }
        })
    </script>
@endsection
