@extends('layouts.app')

@section('content')
    <style>
        .gradient-custom-2 {
            background: url('/images/bg.jpg') no-repeat;
            background-size: auto 120%;

        }

        @media (min-width: 768px) {
            .gradient-form {
                height: 100vh !important;
            }
        }

        @media (min-width: 769px) {
            .gradient-custom-2 {
                border-top-right-radius: .3rem;
                border-bottom-right-radius: .3rem;
            }
        }
    </style>
    @if($errors->any())
    {{ implode('', $errors->all('<div>:message</div>')) }}
@endif
    <section class="h-100 gradient-form mx-auto py-3">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-10">
                    <div class="card rounded-3 text-black">
                        <div class="row g-0">
                            <div class="col-lg-8">
                                <div class="card-body p-md-5 mx-md-4">

                                    <div class="text-center">
                                        <img src="/images/logo.jpg" style="width: 105px;" alt="logo">
                                        <h4 class="mt-1 mb-5 pb-1">Create Account for Barangay Manuyo Dos Online Public
                                            Files Request System</h4>
                                    </div>

                                    <form role="form" action="{{ route('residentRegisterCreate') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf

                                        <div class="row mb-3">
                                            <label for="first_name"
                                                class="col-md-4 col-form-label text-md-end">{{ __('First Name') }}</label>

                                            <div class="col-md-8">
                                                <input id="first_name" type="text"
                                                    class="form-control @error('first_name') is-invalid @enderror"
                                                    name="first_name" value="{{ old('first_name') }}" required
                                                    autocomplete="first_name" autofocus>

                                                @error('first_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="last_name"
                                                class="col-md-4 col-form-label text-md-end">{{ __('Last Name') }}</label>

                                            <div class="col-md-8">
                                                <input id="last_name" type="text"
                                                    class="form-control @error('last_name') is-invalid @enderror"
                                                    name="last_name" value="{{ old('last_name') }}" required
                                                    autocomplete="last_name" autofocus>

                                                @error('last_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="email"
                                                class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                            <div class="col-md-8">
                                                <input id="email" type="email"
                                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                                    value="{{ old('email') }}" required autocomplete="email">

                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="address"
                                                class="col-md-4 col-form-label text-md-end">{{ __('Address') }}</label>

                                            <div class="col-md-8">
                                                <input id="address" type="text"
                                                    class="form-control @error('address') is-invalid @enderror"
                                                    name="address" value="{{ old('address') }}" required
                                                    autocomplete="address">

                                                @error('address')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="birthdate"
                                                class="col-md-4 col-form-label text-md-end">{{ __('Birth date') }}</label>

                                            <div class="col-md-8">
                                                <input id="birthdate" type="date"
                                                    class="form-control @error('birthdate') is-invalid @enderror"
                                                    name="birthdate" value="{{ old('birthdate') }}" required
                                                    autocomplete="birthdate">

                                                @error('birthdate')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="phone_number"
                                                class="col-md-4 col-form-label text-md-end">{{ __('Phone Number') }}</label>

                                            <div class="col-md-8">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">+63</span>
                                                    </div>
                                                    <input id="cellphone_number" type="text"
                                                        class="form-control @error('cellphone_number') is-invalid @enderror"
                                                        name="cellphone_number" value="{{ old('cellphone_number') }}" required
                                                        autocomplete="cellphone_number">
                                                </div>
                                                @error('cellphone_number')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="row mb-2">
                                                <div class="col-md-4"></div>
                                                <div class="col-md-8">
                                                    <div class="rounded overflow-hidden shadow-sm border bg-danger"
                                                        style="width:max-content">
                                                        <img id="profile-preview" width="200px"
                                                            src="/images/profile-default-preview.png" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label for="profile_filename"
                                                    class="col-md-4 col-form-label text-md-end">{{ __('Profile Image') }}</label>

                                                <div class="col-md-8">
                                                    <input id="profile_filename" type="file"
                                                        onchange="document.getElementById('profile-preview').src = window.URL.createObjectURL(this.files[0])"
                                                        class="form-control @error('profile_filename_title') is-invalid @enderror"
                                                        name="profile_filename" value="{{ old('profile_filename') }}"
                                                        required autocomplete="profile_filename">

                                                    @error('profile_filename_title')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3">

                                            <div class="row mb-2">
                                                <div class="col-md-4"></div>
                                                <div class="col-md-8">
                                                    <div class="rounded overflow-hidden bg-danger"
                                                        style="width:max-content">
                                                        <img id="proof_id_filename_preview" width="200px"
                                                            src="/images/proof-id-default-preview.jpg" />
                                                    </div>
                                                </div>
                                            </div>

                                            <label for="proof_id_filename"
                                                class="col-md-4 col-form-label text-md-end">{{ __('ID Image') }}</label>

                                            <div class="col-md-8">
                                                <input id="proof_id_filename" type="file"
                                                    onchange="document.getElementById('proof_id_filename_preview').src = window.URL.createObjectURL(this.files[0])"
                                                    class="form-control @error('proof_id_filename_title') is-invalid @enderror"
                                                    name="proof_id_filename" value="{{ old('proof_id_filename') }}"
                                                    required autocomplete="proof_id_filename_title">
                                                <small>Image of your ID that contains the Address of Barangay Manuyo</small>

                                                @error('proof_id_filename')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="password"
                                                class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                            <div class="col-md-8">
                                                <input id="password" type="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    name="password" required autocomplete="new-password">

                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="password-confirm"
                                                class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                            <div class="col-md-8">
                                                <input id="password-confirm" type="password" class="form-control"
                                                    name="password_confirmation" required autocomplete="new-password">
                                            </div>
                                        </div>

                                        <div class="row mb-0">
                                            <div class="col-md-6 offset-md-4">
                                                <button type="submit" class="btn btn-primary px-5 fw-bold">
                                                    {{ __('Register') }}
                                                </button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                            <div class="col-lg-4 d-flex align-items-center gradient-custom-2">
                                <div class="text-white px-3 py-4 p-md-5 mx-md-4 invisible">
                                    <h4 class="mb-4">We are more than just a company</h4>
                                    <p class="small mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                        eiusmod
                                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                        nostrud
                                        exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        $(document).ready(function() {
            document.getElementById('birthdate').value = "2000-01-01";;

        });
    </script>
@endsection
