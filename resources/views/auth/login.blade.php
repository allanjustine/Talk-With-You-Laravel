@extends('layout.base')

@section('title')
    Login
@endsection

@section('content')
    <div class="container pt-5 d-flex flex-column flex-lg-row justify-content-evenly">
        <!-- heading -->
        <div class="mt-0 pt-0 mt-lg-5 pt-lg-5 d-lg-block d-none">
            <h1 class="text-primary fw-bold">Talk With You</h1>
            <p class="w-75 mx-auto fs-4 mx-lg-0">Talk With You helps you connect and share with the people in your life.</p>
        </div>

        <div class="text-center mt-0 pt-0 mt-lg-5 pt-lg-5 d-sm-block d-lg-none">
            <h1 class="text-primary fw-bold">Talk With You</h3>
            <p class="w-75 mx-auto fs-4 mx-lg-0">Talk With You helps you connect and share with the people in your life.</p>
        </div>

        <!-- form card -->
        <div style="max-width: 28rem; width: 100%">
            <!-- login form -->
            <!-- first was form tag -->
            <div class="bg-white shadow rounded p-3 input-group-lg">
                @if (session('message'))
                    <div class="alert alert-success alert-dismissible fade show mt-2 py-3 text-center" role="alert">
                        {{ session('message') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show mt-2 py-3 text-center" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <form method="POST" action="{{ route('login') }}" class="mt-3">
                    @csrf
                    <div class="form-group">
                        <input id="email" type="email" class="form-control py-4 @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email"
                            placeholder="Email address" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input id="password" type="password"
                            class="form-control py-4 @error('password') is-invalid @enderror" name="password" required
                            autocomplete="current-password" placeholder="Password">
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
                    <div class="form-group text-center mt-3">
                        <a href="#">{{ __('Forgot password?') }}</a>
                    </div>
                    <hr>
                    <div class="form-group text-center mt-4">
                        <a class="btn btn-success" href="#" data-bs-toggle="modal"
                            data-bs-target="#createModal">{{ __('Create a new account') }}</a>
                    </div>
                </form>
            </div>
            <!-- tag -->
            <div class="my-5 pb-5 text-center">
                <p class="fw-bold"><a href="#" class="text-decoration-none text-dark">Createa a Page</a> <span
                        class="fw-normal">for a celebrity, band or business.</span></p>
            </div>
        </div>
    </div>
    @include('auth.register')
    <!-- Footer -->
    <footer class="bg-white p-4 text-muted">
        <div class="container">
            <!-- language -->
            <div class="d-flex flex-wrap">
                <p class="mx-2 fs-7 mb-0">English (US)</p>
                <p class="mx-2 fs-7 mb-0">Tiếng Việt</p>
                <p class="mx-2 fs-7 mb-0">中文(台灣)</p>
                <p class="mx-2 fs-7 mb-0">한국어</p>
                <p class="mx-2 fs-7 mb-0">日本語</p>
            </div>
            <hr />
            <!-- actions -->
            <div class="d-flex flex-wrap">
                <p class="mx-2 fs-7 mb-0">Sign Up</p>
                <p class="mx-2 fs-7 mb-0">Login</p>
                <p class="mx-2 fs-7 mb-0">Messenger</p>
                <p class="mx-2 fs-7 mb-0">Facebook Lite</p>
                <p class="mx-2 fs-7 mb-0">Watch</p>
            </div>
            <!-- copy -->
            <div class="mt-4 mx-2">
                <p class="fs-7">Talk With You &copy; 2023</p>
            </div>
        </div>
    </footer>
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
