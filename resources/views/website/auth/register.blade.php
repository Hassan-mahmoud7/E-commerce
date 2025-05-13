@extends('layouts.website.app')
@section('title', __('website.register'))
@section('content')
    <section class="login account footer-padding">
        <div class="container">
            <div class="login-section account-section">
                <form action="{{ route('website.register') }}" method="post" class="review-form">
                    @csrf
                    <h5 class="comment-title">Create Account</h5>
                    <div class=" account-inner-form">
                        <div class="review-form-name">
                            <label for="fname" class="form-label">{{ __('website.name') }}*</label>
                            <input type="text" id="fname" name="name"
                                class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"
                                 placeholder="{{ __('website.name') }}">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        {{-- <div class="review-form-name">
                                <label for="lname" class="form-label">Last Name*</label>
                                <input type="text" id="lname" class="form-control" placeholder="Last Name">
                            </div> --}}
                    </div>
                    <div class=" account-inner-form">
                        <div class="review-form-name">
                            <label for="email" class="form-label">{{ __('auth.email_address') }}*</label>
                            <input type="email" id="email" name="email"
                                class="form-control @error('email') is-invalid @enderror"
                                placeholder="{{ __('auth.email') }}" value="{{ old('email') }}" 
                                autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="review-form-name">
                            <label for="phone" class="form-label">{{ __('website.phone') }}*</label>
                            <input type="tel" name="phone" id="phone"
                                class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}"
                                 placeholder="{{ __('website.phone') }}">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="review-form-name mb-3">
                        @livewire('general.address-drop-down-debpendent')
                    </div>

                    {{-- <div class="review-form-name mb-3">
                        <label for="country" class="form-label">{{ __('website.country') }}</label>
                        <select id="country" name="country" class="form-select @error('country') is-invalid @enderror">
                            <option>{{ __('website.select_country') }}</option>
                            <option>Bangladesh</option>
                            <option>United States</option>
                            <option selected>United Kingdom</option>
                        </select>
                        @error('country')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="review-form-name mb-3">
                        <label for="governorate" class="form-label">{{ __('website.governorate') }}</label>
                        <select id="governorate" name="governorate" class="form-select @error('governorate') is-invalid @enderror">
                            <option>{{ __('website.select_governorate') }}</option>
                            <option>Bangladesh</option>
                            <option>United States</option>
                            <option selected>United Kingdom</option>
                        </select>
                        @error('governorate')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="review-form-name mb-3">
                        <label for="city" class="form-label">{{ __('website.city') }}</label>
                        <select id="city" name="city" class="form-select @error('city') is-invalid @enderror">
                            <option>{{ __('website.select_city') }}</option>
                            <option>Bangladesh</option>
                            <option>United States</option>
                            <option selected>United Kingdom</option>
                        </select>
                        @error('city')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div> --}}
                    <div class="review-form-name mb-3">
                        <label for="password" class="form-label">{{ __('auth.password_title') }}</label>
                        <div class="input-group ">
                            <input type="password" id="password" name="password"
                                class="form-control @error('password') is-invalid @enderror"
                                placeholder="{{ __('auth.password_name') }}" 
                                />
                            <span class="input-group-text" id="togglePassword" style="cursor: pointer;">
                                <i class="fas fa-eye"></i>
                            </span>
                         @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    </div>
                    <div class="review-form-name mb-3">
                        <label for="password_confirmation" class="form-label">{{ __('auth.confirm_password') }}</label>
                        <div class="input-group">
                            <input type="password" id="password_confirmation" name="password_confirmation"
                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                placeholder="{{ __('auth.password_name') }}" 
                                 />
                            <span class="input-group-text" id="togglePasswordConfirmation" style="cursor: pointer;">
                                <i class="fas fa-eye"></i>
                            </span>
                         @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    </div>

                    <div class="login-btn text-center">
                        <button type="submit" class="shop-btn">{{ __('website.create_an_account') }}</button>
                        <span class="shop-account">{{ __('website.already_have_an_account') }}<a href="{{ route('website.login') }}">{{ __('auth.login') }}</a></span>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
@push('js')
    <script>
        document.getElementById('togglePassword').addEventListener('click', function() {
            const passwordField = document.getElementById('password');
            const icon = this.querySelector('i');
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                passwordField.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });
        document.getElementById('togglePasswordConfirmation').addEventListener('click', function() {
            const passwordField = document.getElementById('password_confirmation');
            const icon = this.querySelector('i');
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                passwordField.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });
    </script>
@endpush