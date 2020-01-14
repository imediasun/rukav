<<<<<<< HEAD
@extends('layouts.app_admin')
=======
@extends('layouts.app')
>>>>>>> bb2e14deeb4d633551f707afda5306b9477d33d2

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
<<<<<<< HEAD
                <div class="card-header">Reset Password</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.request') }}">
=======
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
>>>>>>> bb2e14deeb4d633551f707afda5306b9477d33d2
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group row">
<<<<<<< HEAD
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email or old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
=======
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
>>>>>>> bb2e14deeb4d633551f707afda5306b9477d33d2
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
<<<<<<< HEAD
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
=======
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
>>>>>>> bb2e14deeb4d633551f707afda5306b9477d33d2

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
<<<<<<< HEAD
                                    <span class="invalid-feedback">
=======
                                    <span class="invalid-feedback" role="alert">
>>>>>>> bb2e14deeb4d633551f707afda5306b9477d33d2
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
<<<<<<< HEAD
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" name="password_confirmation" required>

                                @if ($errors->has('password_confirmation'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
=======
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
>>>>>>> bb2e14deeb4d633551f707afda5306b9477d33d2
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
<<<<<<< HEAD
                                    Reset Password
=======
                                    {{ __('Reset Password') }}
>>>>>>> bb2e14deeb4d633551f707afda5306b9477d33d2
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
