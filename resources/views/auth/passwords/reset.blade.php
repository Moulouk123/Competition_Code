@extends('layouts.app')
@extends('admin.styles')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <!-- Première colonne pour les informations -->
            <div class="col-md-6">
                <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                    <h1>Welcome to our website !</h1>
                    <p>Here, we believe that building a strong professional network begins with your participation. We are delighted to offer a modern and user-friendly service to ensure you have the best experience.</p>
                    <div class="brand-logo" style="max-width: 100%;">
                        <img src="{{ asset('assets/images/welcome.jpg') }}" alt="logo" style="max-width: 100%; height: auto;">
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                    <h4><b>Reset Password</b></h4>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="row mb-3">
                            <label for="email" class="col-md-6 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input style="width: 350px;" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-6 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input style="width: 350px;" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-6 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input style="width: 350px;" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button style="margin-left: 70px;" type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    <div style="position: fixed; bottom: 0;
    left: 0;
    width: 100%;
    background-color: #f2f2f2;
    padding: 10px; box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.1);  ">
        <p><b>&copy; Copy Rights ENET Com Junior Entreprise</b></p>
    </div>
@endsection
