{{-- @extends('layout.base')

@section('title')
    Register
@endsection

@section('content') --}}
{{-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7 col-sm-7 mt-5">
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-center">{{ __('Register') }}</h2>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="col-12 row">
                                <div class="d-flex justify-content-center align-items-center">
                                    <img id="previewImg" src="https://static.thenounproject.com/png/3237155-200.png"
                                        style="width: 150px; height: 150px; border: 3px solid black;"
                                        class="img-fluid rounded-circle">
                                </div>
                                <div class="form-group col-md-12 col-sm-12">
                                    <label for="profile_image">{{ __('Select your profile image') }}</label>
                                    <input id="profile_image" type="file"
                                        class="form-control pr-4 @error('profile_image') is-invalid @enderror"
                                        name="profile_image" value="{{ old('profile_image') }}" accept="image/*"
                                        autocomplete="profile_image" autofocus onchange="previewImage(event)">
                                    <span class="float-right disabled"
                                        @error('profile_image')
                                            hidden
                                        @enderror
                                        style="margin-top: -27px; margin-right: 10px; color: gray;"><i
                                            class="far fa-image"></i></span>
                                    @error('profile_image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 row">
                                <div class="form-group col-md-6 col-sm-6">
                                    <label for="name">{{ __('Full Name') }}</label>
                                    <input id="name" type="text"
                                        class="form-control pr-4 @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    <span class="float-right disabled"
                                        @error('name')
                                            hidden
                                        @enderror
                                        style="margin-top: -27px; margin-right: 10px; color: gray;"><i
                                            class="far fa-user"></i></span>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6 col-sm-6">
                                    <label for="address">{{ __('Address') }}</label>
                                    <input id="address" type="text"
                                        class="form-control pr-4 @error('address') is-invalid @enderror" name="address"
                                        value="{{ old('address') }}" required autocomplete="address" autofocus>
                                    <span class="float-right disabled"
                                        @error('address')
                                            hidden
                                        @enderror
                                        style="margin-top: -27px; margin-right: 10px; color: gray;"><i
                                            class="far fa-map-marker-alt"></i></span>
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 row">
                                <div class="form-group col-md-6 col-sm-6">
                                    <label for="age">{{ __('Age') }}</label>
                                    <input id="age" type="text"
                                        class="form-control pr-4 @error('age') is-invalid @enderror" name="age"
                                        value="{{ old('age') }}" required autocomplete="age" autofocus>
                                    <span class="float-right disabled"
                                        @error('age')
                                            hidden
                                        @enderror
                                        style="margin-top: -27px; margin-right: 10px; color: gray;"><i
                                            class="far fa-user-clock"></i></span>
                                    @error('age')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6 col-sm-6">
                                    <label for="phone">{{ __('Phone') }}</label>
                                    <input id="phone" type="text"
                                        class="form-control pr-4 @error('phone') is-invalid @enderror" name="phone"
                                        value="{{ old('phone') }}" required autocomplete="phone" autofocus>
                                    <span class="float-right disabled"
                                        @error('phone')
                                            hidden
                                        @enderror
                                        style="margin-top: -27px; margin-right: 10px; color: gray;"><i
                                            class="far fa-phone"></i></span>
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }} Valid phone example (09xxxxxxxxx)</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row col-12">
                                <div class="form-group col-md-6 col-sm-6">
                                    <label for="sex">{{ __('Sex') }}</label>
                                    <select class="form-control @error('sex') is-invalid @enderror" name="sex"
                                        id="sex" name="sex" required autocomplete="sex" autofocus>
                                        <option selected hidden value="">Select Gender</option>
                                        <option disabled>Select Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="other">Other</option>
                                    </select>
                                    <span class="float-right disabled"
                                        @error('sex')
                                            hidden
                                        @enderror
                                        style="margin-top: -27px; margin-right: 10px; color: gray;"><i
                                            class="far fa-venus-mars"></i></span>
                                    @error('sex')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6 col-sm-6">
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
                            </div>

                            <div class="row col-12">
                                <div class="form-group col-md-6 col-sm-6">
                                    <label for="password">{{ __('Password') }}</label>
                                    <input id="password" type="password"
                                        class="form-control pr-4 @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">
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

                                <div class="form-group col-md-6 col-sm-6">
                                    <label for="password_confirmation">{{ __('Confirm Password') }}</label>
                                    <input id="password_confirmation" type="password"
                                        class="form-control pr-4 @error('password_confirmation') is-invalid @enderror"
                                        name="password_confirmation" required autocomplete="password_confirmation">
                                    <span class="float-right disabled"
                                        @error('password_confirmation')
                                            hidden
                                        @enderror
                                        style="margin-top: -27px; margin-right: 10px; color: gray;"><i
                                            class="far fa-key"></i></span>
                                    @error('password_confirmation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="showPassword"
                                            id="showPassword" onclick="togglePasswordVisibility()">
                                        <label class="form-check-label" for="showPassword">
                                            {{ __('Show Passwords') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-0">
                                <button type="submit" class="btn btn-primary form-control">
                                    {{ __('Register') }}
                                </button>
                                <button type="button" class="btn btn-secondary mt-1 form-control" onclick="goBack()">
                                    <i class="far fa-arrow-left"></i> {{ __('Back') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
<!-- create modal -->
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- head -->
            <div class="modal-header">
                <div>
                    <h2 class="modal-title" id="exampleModalLabel">Sign Up</h2>
                    <span class="text-muted fs-7">It's quick and easy.</span>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- body -->
            <div class="modal-body ml-4">
                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="col-12 row">
                        <div class="d-flex justify-content-center align-items-center">
                            <img id="previewImg" src="https://static.thenounproject.com/png/3237155-200.png"
                                style="width: 150px; height: 150px; border: 3px solid black;"
                                class="img-fluid rounded-circle">
                        </div>
                        <div class="form-group col-md-12 col-sm-12">
                            <label for="profile_image">{{ __('Select your profile image') }}</label>
                            <input id="profile_image" type="file"
                                class="form-control pr-4 @error('profile_image') is-invalid @enderror"
                                name="profile_image" value="{{ old('profile_image') }}" accept="image/*"
                                autocomplete="profile_image" autofocus onchange="previewImage(event)">
                            <span class="float-right disabled"
                                @error('profile_image')
                                        hidden
                                    @enderror
                                style="margin-top: -27px; margin-right: 10px; color: gray;"><i
                                    class="far fa-image"></i></span>
                            @error('profile_image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 row">
                        <div class="form-group col-md-6 col-sm-6">
                            <label for="name">{{ __('Full Name') }}</label>
                            <input id="name" type="text"
                                class="form-control pr-4 @error('name') is-invalid @enderror" name="name"
                                value="{{ old('name') }}" required autocomplete="name" autofocus>
                            <span class="float-right disabled"
                                @error('name')
                                        hidden
                                    @enderror
                                style="margin-top: -27px; margin-right: 10px; color: gray;"><i
                                    class="far fa-user"></i></span>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-6 col-sm-6">
                            <label for="address">{{ __('Address') }}</label>
                            <input id="address" type="text"
                                class="form-control pr-4 @error('address') is-invalid @enderror" name="address"
                                value="{{ old('address') }}" required autocomplete="address" autofocus>
                            <span class="float-right disabled"
                                @error('address')
                                        hidden
                                    @enderror
                                style="margin-top: -27px; margin-right: 10px; color: gray;"><i
                                    class="far fa-map-marker-alt"></i></span>
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 row">
                        <div class="form-group col-md-6 col-sm-6">
                            <label for="age">{{ __('Age') }}</label>
                            <input id="age" type="text"
                                class="form-control pr-4 @error('age') is-invalid @enderror" name="age"
                                value="{{ old('age') }}" required autocomplete="age" autofocus>
                            <span class="float-right disabled"
                                @error('age')
                                        hidden
                                    @enderror
                                style="margin-top: -27px; margin-right: 10px; color: gray;"><i
                                    class="far fa-user-clock"></i></span>
                            @error('age')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-6 col-sm-6">
                            <label for="phone">{{ __('Phone') }}</label>
                            <input id="phone" type="text"
                                class="form-control pr-4 @error('phone') is-invalid @enderror" name="phone"
                                value="{{ old('phone') }}" required autocomplete="phone" autofocus>
                            <span class="float-right disabled"
                                @error('phone')
                                        hidden
                                    @enderror
                                style="margin-top: -27px; margin-right: 10px; color: gray;"><i
                                    class="far fa-phone"></i></span>
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }} Valid phone example (09xxxxxxxxx)</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row col-12">
                        <div class="form-group col-md-6 col-sm-6">
                            <label for="sex">{{ __('Gender') }}</label>
                            <select class="form-control @error('sex') is-invalid @enderror" name="sex"
                                id="sex" name="sex" required autocomplete="sex" autofocus>
                                <option selected hidden value="">Select Gender</option>
                                <option disabled>Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="other">Other</option>
                            </select>
                            <span class="float-right disabled"
                                @error('sex')
                                        hidden
                                    @enderror
                                style="margin-top: -27px; margin-right: 10px; color: gray;"><i
                                    class="far fa-venus-mars"></i></span>
                            @error('sex')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-6 col-sm-6">
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
                    </div>

                    <div class="row col-12">
                        <div class="form-group col-md-6 col-sm-6">
                            <label for="password">{{ __('Password') }}</label>
                            <input id="password" type="password"
                                class="form-control pr-4 @error('password') is-invalid @enderror" name="password"
                                required autocomplete="current-password">
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

                        <div class="form-group col-md-6 col-sm-6">
                            <label for="password_confirmation">{{ __('Confirm Password') }}</label>
                            <input id="password_confirmation" type="password"
                                class="form-control pr-4 @error('password_confirmation') is-invalid @enderror"
                                name="password_confirmation" required autocomplete="password_confirmation">
                            <span class="float-right disabled"
                                @error('password_confirmation')
                                        hidden
                                    @enderror
                                style="margin-top: -27px; margin-right: 10px; color: gray;"><i
                                    class="far fa-key"></i></span>
                            @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        {{-- <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="showPassword"
                                    id="showPassword" onclick="togglePasswordVisibility()">
                                <label class="form-check-label" for="showPassword">
                                    {{ __('Show Passwords') }}
                                </label>
                            </div>
                        </div> --}}
                    </div>

                    {{-- <div class="form-group mb-0">
                        <button type="submit" class="btn btn-primary form-control">
                            {{ __('Register') }}
                        </button>
                        <button type="button" class="btn btn-secondary mt-1 form-control" onclick="goBack()">
                            <i class="far fa-arrow-left"></i> {{ __('Back') }}
                        </button>
                    </div> --}}
                    <!-- DOB -->
                    {{-- <div class="row my-3">
                        <span class="text-muted fs-7">Date of birth <i class="fas fa-question-circle"
                                data-bs-toggle="popover" type="button"
                                data-bs-content="And here's some amazing content. It's very engaging. Right?"></i></span>
                        <div class="col">
                            <select class="form-select">
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="col">
                            <select class="form-select">
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="col">
                            <select class="form-select">
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                    </div> --}}
                    <!-- gender -->
                    {{-- <div class="row my-3">
                        <span class="text-muted fs-7">Gender <i class="fas fa-question-circle" data-bs-toggle="popover"
                                type="button"
                                data-bs-content="And here's some amazing content. It's very engaging. Right?"></i></span>
                        <div class="col">
                            <div class="border rounded p-2">
                                <label class="form-check-label" for="flexRadioDefault1">Male </label>
                                <input class="form-check-input ml-1" type="radio" name="flexRadioDefault"
                                    id="flexRadioDefault1" />
                            </div>
                        </div>
                        <div class="col">
                            <div class="border rounded p-2">
                                <label class="form-check-label" for="flexRadioDefault1">Female </label>
                                <input class="form-check-input ml-1" type="radio" name="flexRadioDefault"
                                    id="flexRadioDefault2" />
                            </div>
                        </div>
                        <div class="col">
                            <div class="border rounded p-2">
                                <label class="form-check-label" for="flexRadioDefault1">Custom </label>
                                <input class="form-check-input ml-1" type="radio" name="flexRadioDefault"
                                    id="flexRadioDefault3" />
                            </div>
                        </div>
                    </div> --}}
                    <!-- gender select -->
                    {{-- <div class="d-none" id="genderSelect">
                        <select class="form-select">
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                        <div class="my-3">
                            <span class="text-muted fs-7">Your pronoun is visible to everyone.</span>
                            <input type="text" class="form-control" placeholder="Gender (optional)" />
                        </div>
                    </div> --}}
                    <!-- disclaimer -->
                    <div>
                        <span class="text-muted fs-7">By clicking Sign Up, you agree to our Terms, Data
                            Policy....</span>
                    </div>
                    <!-- btn -->
                    <div class="text-center mt-3">
                        <button type="submit" class="btn btn-success btn-lg">{{ __('Sign Up') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- modal end -->
{{-- @endsection --}}

<script>
    // function togglePasswordVisibility() {
    //     const passwordInput = document.getElementById("password");
    //     const passwordInput2 = document.getElementById("password_confirmation");
    //     if (passwordInput.type === "password" & passwordInput2.type === "password") {
    //         passwordInput.type = "text";
    //         passwordInput2.type = "text";
    //     } else {
    //         passwordInput.type = "password";
    //         passwordInput2.type = "password";
    //     }
    // };

    function previewImage() {
        const previewImg = document.getElementById('previewImg');
        previewImg.src = URL.createObjectURL(event.target.files[0]);
    };

    if (window.location.pathname === "/login") {
        const radioBtn1 = document.querySelector("#flexRadioDefault1");
        const radioBtn2 = document.querySelector("#flexRadioDefault2");
        const radioBtn3 = document.querySelector("#flexRadioDefault3");
        const genderSelect = document.querySelector("#genderSelect");

        radioBtn1.addEventListener("change", () => {
            genderSelect.classList.add("d-none");
        });
        radioBtn2.addEventListener("change", () => {
            genderSelect.classList.add("d-none");
        });
        radioBtn3.addEventListener("change", () => {
            genderSelect.classList.remove("d-none");
        });
    };

    var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
    var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
        return new bootstrap.Popover(popoverTriggerEl);
    });
</script>
