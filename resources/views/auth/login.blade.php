@extends('layout.base')

@section('title')
    Login
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 col-sm-8 mt-5">
                @if (session('message'))
                    <div class="alert alert-success alert-dismissible fade show mt-3 py-3 text-center" role="alert">
                        {{ session('message') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show mt-3 py-3 text-center" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-center">{{ __('Login') }}</h2>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <label for="email">{{ __('Email') }}</label>
                                <input id="email" type="email"
                                    class="form-control pr-4 @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus>
                                <span class="float-right disabled"
                                    @error('email')
                                        hidden
                                    @enderror
                                    style="margin-top: -27px; margin-right: 10px; color: gray;"><i
                                        class="far fa-envelope"></i></span>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password">{{ __('Password') }}</label>
                                <input id="password" type="password"
                                    class="form-control pr-4 @error('password') is-invalid @enderror" name="password" required
                                    autocomplete="current-password">
                                <span class="float-right disabled"
                                    @error('password')
                                        hidden
                                    @enderror
                                    style="margin-top: -27px; margin-right: 10px; color: gray;"><i
                                        class="far fa-key"></i></span>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="showPassword" id="showPassword"
                                        onclick="togglePasswordVisibility()">
                                    <label class="form-check-label" for="showPassword">
                                        {{ __('Show Password') }}
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>

                            <div class="form-group mb-0">
                                <button type="submit" class="btn btn-primary form-control">
                                    {{ __('Login') }}
                                </button>
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                            <hr>
                            <div class="form-group text-center mt-4">
                                <a class="btn btn-success" href="/register">{{ __('Create a new account') }}</a>
                            </div>
                        </form>
                        <div class="form-group text-center">
                            <a href="#">{{ __('Forgot password?') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<script>
    function togglePasswordVisibility() {
        const passwordInput = document.getElementById("password");
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
        } else {
            passwordInput.type = "password";
        }
    }
</script>
