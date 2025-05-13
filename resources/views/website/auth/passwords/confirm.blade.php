
@extends('layouts.website.app')
@section('title', __('auth.confirm'))
@section('content')
    <section class="login footer-padding">
        <div class="container">
            <div class="login-section">
                <div class="review-form">
                    <h5 class="comment-title">{{ __('auth.confirm') }}</h5>
                    <form action="{{ route('website.check.code') }}" method="post" class="review-inner-form">
                        @csrf
                            <div class="review-form-name">
                                
                                <input type="hidden" name="email" class="form-control form-control-lg input-lg"
                                id="user-email" placeholder="{{ __('auth.email') }}" value="{{ $email }}" > 
                                <label for="token" class="form-label">{{ __('auth.Enter_your_code') }}</label>
                                <input type="text" name="token" id="token"
                                    class="form-control @error('token') is-invalid @enderror"
                                    placeholder="{{ __('auth.Enter_your_code') }}" value="{{ old('token') }}" required
                                    />
                                @error('token')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        <div class="login-btn text-center">
                            <button type="submit" class="shop-btn"> {{ __('auth.confirm') }}</button>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

