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
                    @if (session('status'))
                        <div class="alert alert-success">
=======
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
>>>>>>> bb2e14deeb4d633551f707afda5306b9477d33d2
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
<<<<<<< HEAD
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
=======
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
>>>>>>> bb2e14deeb4d633551f707afda5306b9477d33d2

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

<<<<<<< HEAD
                                @if ($errors->has('email'))   
                                    <span class="invalid-feedback">
=======
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
>>>>>>> bb2e14deeb4d633551f707afda5306b9477d33d2
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
<<<<<<< HEAD
                                    Send Password Reset Link
=======
                                    {{ __('Send Password Reset Link') }}
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
