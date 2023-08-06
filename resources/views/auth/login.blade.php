@extends('layouts.main')
@section('content')
    <div class="form-area">
        <div class="form-row">
            <div class="form-panel">
                <div class="logo mb-5">
                    <p class="text-center mt-20">
                        <span class="d-block fw-bold mb-10 fs-6">
                        {{__('Page sécuriser')}}</span>
                    </p>
                </div>
                <form method="POST" class="mb-4" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-4">
                        <div class="form-group has-icon-left">
                            <input id="email" type="email" class="form-control form-control-lg 
                            @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" required autocomplete="email" autofocus 
                                placeholder="{{ __('Email Address') }}">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <div class="form-control-icon">
                                <i class="bi bi-person-fill"></i>
                            </div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <div class="form-group has-icon-left">
                           <input id="password" type="password" class="form-control form-control-lg 
                           @error('password') is-invalid @enderror" name="password"
                            required autocomplete="current-password" placeholder="{{ __('Password') }}">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <div class="form-control-icon">
                                <i class="bi bi-key-fill"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-check mb-4">
                        <input type="checkbox" id="remember" class="form-check-input">
                        <label for="remember">{{__('Remember Me')}}</label>
                    </div>
                    <button type="submit" class="btn btn-lg btn-success w-100">{{__('Se connecter')}}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
