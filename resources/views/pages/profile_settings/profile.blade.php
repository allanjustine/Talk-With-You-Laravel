@extends('layout.base')

@section('title')
    Profile settings
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
    <h3 class="mt-4 text-center">Profile settings</h3>
    <hr>
    <div class="container d-flex justify-content-center">
        <div class="card mt-3 col-md-6 col-sm-6">
            <div class="header mt-4">
                <h6 class="text-center text-muted">User details</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('profile_settings.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="col-12 row">
                        <div class="form-group col-md-6 col-sm-6">
                            <label for="name">{{ __('Full Name') }}</label>
                            <input id="name" type="text"
                                class="form-control pr-4 @error('name') is-invalid @enderror" name="name"
                                value="{{ $user->name }}" required autocomplete="name" autofocus>
                            <span class="float-right disabled"
                                @error('name')
                                    hidden
                                @enderror
                                style="margin-top: -30px; margin-right: 10px; color: gray;"><i
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
                                value="{{ $user->address }}" required autocomplete="address" autofocus>
                            <span class="float-right disabled"
                                @error('address')
                                    hidden
                                @enderror
                                style="margin-top: -30px; margin-right: 10px; color: gray;"><i
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
                                value="{{ $user->age }}" required autocomplete="age" autofocus>
                            <span class="float-right disabled"
                                @error('age')
                                    hidden
                                @enderror
                                style="margin-top: -30px; margin-right: 10px; color: gray;"><i
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
                                value="{{ $user->phone }}" required autocomplete="phone" autofocus>
                            <span class="float-right disabled"
                                @error('phone')
                                    hidden
                                @enderror
                                style="margin-top: -30px; margin-right: 10px; color: gray;"><i
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
                            <select class="form-control @error('sex') is-invalid @enderror" name="sex" id="sex"
                                required autocomplete="sex" autofocus>
                                <option disabled>Select Gender</option>
                                <option value="Male" {{ $user->sex === 'Male' ? 'selected' : '' }}>Male
                                </option>
                                <option value="Female" {{ $user->sex === 'Female' ? 'selected' : '' }}>
                                    Female</option>
                                <option value="Other" {{ $user->sex === 'Other' ? 'selected' : '' }}>Other
                                </option>
                            </select>

                            <span class="float-right disabled"
                                @error('sex')
                                    hidden
                                @enderror
                                style="margin-top: -30px; margin-right: 10px; color: gray;"><i
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
                                value="{{ $user->email }}" required autocomplete="email" autofocus>
                            <span class="float-right disabled"
                                @error('email')
                                    hidden
                                @enderror
                                style="margin-top: -30px; margin-right: 10px; color: gray;"><i
                                    class="far fa-envelope"></i></span>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="bio">{{ __('Bio') }}</label>
                        <textarea id="bio" type="text" rows="4" cols="10"
                            class="form-control pr-4 @error('bio') is-invalid @enderror" name="bio" autocomplete="bio" autofocus
                            placeholder="@if ($user->bio === null) You haven't write a bio yet please add max of 255 characters only. @else Bio @endif">{{ $user->bio }}</textarea>
                        <span class="float-right disabled"
                            @error('bio')
                                hidden
                            @enderror
                            style="margin-top: -100px; margin-right: 10px; color: gray;"><i
                                class="far fa-book-user"></i></span>
                        @error('bio')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group d-flex justify-content-center mb-0">
                        <button type="submit" class="btn btn-primary form-control">
                            <i class="far fa-pen-to-square"></i> {{ __('Update') }}
                        </button>
                    </div>

                    <div class="form-group d-flex justify-content-center mt-1">
                        <button type="button" class="btn btn-secondary form-control" onclick="goBack()">
                            <i class="far fa-arrow-left"></i> {{ __('Back') }}
                        </button>
                    </div>

                    <div class="form-group d-flex justify-content-center mt-1">
                        <a href="/change-password/{{ auth()->user()->id }}" class="btn btn-info form-control">
                            <i class="far fa-key"></i> {{ __('Change password') }}
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


<style>
    #bio {
        resize: none;
    }
</style>
