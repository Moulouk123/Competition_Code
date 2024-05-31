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
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input style="width: 400px;" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button style="width: 400px;" type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
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
