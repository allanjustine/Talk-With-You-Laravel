@extends('layout.base')

@section('title')
    Password settings
@endsection

@section('content')
    <div class="container">
        @if (session('message'))
            <div class="alert alert-success alert-dismissible fade show mt-3 py-3 text-center" role="alert">
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>
    <h3 class="mt-4 text-center">Password settings</h3>
    <hr>
    <div class="container d-flex justify-content-center">
        <div class="card mt-3 col-md-6 col-sm-6">
            <div class="header mt-4">
                <h6 class="text-center text-muted">Change password</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('change_password.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="current_password">{{ __('Current password') }}</label>
                        <input id="current_password" type="password"
                            class="form-control pr-4 @error('current_password') is-invalid @enderror"
                            name="current_password" required autocomplete="current-current_password">
                        <span class="float-right disabled"
                            @error('current_password')
                                hidden
                            @enderror
                            style="margin-top: -27px; margin-right: 10px; color: gray;"><i class="far fa-key"></i></span>
                        @error('current_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password">{{ __('New password') }}</label>
                        <input id="password" type="password"
                            class="form-control pr-4 @error('password') is-invalid @enderror" name="password" required
                            autocomplete="current-password">
                        <span class="float-right disabled"
                            @error('password')
                                hidden
                            @enderror
                            style="margin-top: -27px; margin-right: 10px; color: gray;"><i class="far fa-key"></i></span>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">{{ __('Confirm Password') }}</label>
                        <input id="password_confirmation" type="password"
                            class="form-control pr-4 @error('password_confirmation') is-invalid @enderror"
                            name="password_confirmation" required autocomplete="password_confirmation">
                        <span class="float-right disabled"
                            @error('password_confirmation')
                                hidden
                            @enderror
                            style="margin-top: -27px; margin-right: 10px; color: gray;"><i class="far fa-key"></i></span>
                        @error('password_confirmation')
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
                                {{ __('Show Passwords') }}
                            </label>
                        </div>
                    </div>

                    <div class="form-group d-flex justify-content-center mb-0">
                        <button type="submit" class="btn btn-primary form-control">
                            <i class="far fa-pen-to-square"></i> {{ __('Update') }}
                        </button>
                    </div>

                    <div class="form-group d-flex justify-content-center mb-0 mt-1">
                        <button type="button" class="btn btn-secondary form-control" onclick="goBack()">
                            <i class="far fa-arrow-left"></i> {{ __('Back') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


<script>
    function togglePasswordVisibility() {
        const passwordInput = document.getElementById(["password"]);
        const passwordInput2 = document.getElementById("password_confirmation");
        const passwordInput3 = document.getElementById("current_password");
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            passwordInput2.type = "text";
            passwordInput3.type = "text";
        } else {
            passwordInput.type = "password";
            passwordInput2.type = "password";
            passwordInput3.type = "password";
        }
    }
</script>
