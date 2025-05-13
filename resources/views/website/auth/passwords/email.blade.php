
@extends('layouts.website.app')
@section('title', __('auth.forgot_password'))
@section('content')
    <section class="login footer-padding">
        <div class="container">
            <div class="login-section">
                <div class="review-form">
                    <h5 class="comment-title">{{ __('auth.forgot_password') }}</h5>
                    <form action="{{ route('website.send.code') }}" method="post" class="review-inner-form">
                        @csrf
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
                        <div class="login-btn text-center">
                            <button type="submit" class="shop-btn"> {{ __('auth.send') }}</button>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

