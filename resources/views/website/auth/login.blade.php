@extends('layouts.website.app')
@section('title', __('website.login'))
@section('content')
    <section class="login footer-padding">
        <div class="container">
            <div class="login-section">
                <div class="review-form">
                    <h5 class="comment-title">{{ __('auth.login') }}</h5>
                    <form action="{{ route('website.login') }}" method="post" class="review-inner-form">
                        @csrf
                        {{-- <div class="review-inner-form"> --}}
                            <div class="review-form-name">
                                <label for="email" class="form-label">{{ __('auth.email_address') }}**</label>
                                <input type="email" name="email" id="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    placeholder="{{ __('auth.email') }}" value="{{ old('email') }}" required
                                      />
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="review-form-name">
                                <label for="password" class="form-label">{{ __('auth.password_title') }}</label>
                                <div class="input-group">
                                    <input type="password" id="password" name="password"
                                        class="form-control @error('password') is-invalid @enderror"
                                        placeholder="{{ __('auth.password_name') }}" required
                                         />
                                    <span class="input-group-text" id="togglePassword" style="cursor: pointer;">
                                        <i class="fas fa-eye"></i>
                                    </span>
                                </div> @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="review-form-name checkbox">
                                <div class="checkbox-item">
                                    <input type="checkbox" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }} />
                                    <span class="address"> {{ __('auth.remember_me') }}</span>
                                </div>
                                <div class="forget-pass">
                                    
                                        <a class="fs-4" href="{{ route('website.show.send.email') }}" style="color: #ae1c9a;">
                                            {{ __('auth.forgot_password') }}
                                        </a>
                                </div>
                            </div>
                        {{-- </div> --}}
                        <div class="login-btn text-center">
                            <button type="submit" class="shop-btn"> {{ __('auth.login') }}</button>
                            <span class="shop-account">{{ __('website.donot_have_an_account') }}<a
                                    href="{{ route('website.register') }}">{{ __('website.sign_up') }}</a></span>
                        </div>
                    </form>
                </div>
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
    </script>
@endpush
