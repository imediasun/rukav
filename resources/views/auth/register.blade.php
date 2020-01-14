@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
<<<<<<< HEAD
                <div class="card-header">Register</div>
=======
                <div class="card-header">{{ __('Register') }}</div>
>>>>>>> bb2e14deeb4d633551f707afda5306b9477d33d2

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
<<<<<<< HEAD
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
=======
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
>>>>>>> bb2e14deeb4d633551f707afda5306b9477d33d2

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
<<<<<<< HEAD
                                    <span class="invalid-feedback">
=======
                                    <span class="invalid-feedback" role="alert">
>>>>>>> bb2e14deeb4d633551f707afda5306b9477d33d2
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
<<<<<<< HEAD
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
=======
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
>>>>>>> bb2e14deeb4d633551f707afda5306b9477d33d2

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
<<<<<<< HEAD
                                    <span class="invalid-feedback">
=======
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
=======
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
>>>>>>> bb2e14deeb4d633551f707afda5306b9477d33d2

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
<<<<<<< HEAD
                                    Register
=======
                                    {{ __('Register') }}
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
