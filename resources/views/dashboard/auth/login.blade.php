@extends('layouts.dashboard.auth')
@section('title','Login')

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="flexbox-container">
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <div class="col-md-4 col-10 box-shadow-2 p-0">
                            <div class="card border-grey border-lighten-3 m-0">
                                <div class="card-header border-0">
                                    <div class="card-title text-center">
                                        <img src="{{ asset('assets/dashboard') }}/images/logo/logo-dark.png"
                                            alt="branding logo">
                                    </div>
                                    <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                                        <span>{{ __('auth.login') }}</span>
                                    </h6>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form-horizontal" action="{{ route('dashboard.login.post') }}" method="POST" novalidate>
                                            @csrf
                                            <fieldset class="form-group position-relative has-icon-left">
                                                <input name="email" type="text" class="form-control input-lg  @error('email') is-invalid @enderror" id="user-name"
                                                    placeholder="{{ __('auth.email') }}" tabindex="1" 
                                                    data-validation-required-message="{{ __('auth.email') }}" value="{{ old('email') }}">
                                                    @error('email')
                                                    <strong class=" text-danger">{{ $message }}</strong>
                                                @enderror
                                                    <div class="form-control-position">
                                                        <i class="ft-user"></i>
                                                    </div>
                                                <div class="help-block font-small-3"></div>
                                            </fieldset>
                                            <fieldset class="form-group position-relative has-icon-left ">
                                                <input type="password" name="password" class="form-control input-lg @error('password') is-invalid @enderror " id="password"
                                                    placeholder="{{ __('auth.password_name') }}" tabindex="2" 
                                                    data-validation-required-message="{{ __('auth.password_name') }}">
                                                    @error('password')
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                @enderror
                                                <div class="form-control-position">
                                                    <i class="la la-key"></i>
                                                </div>
                                                <div class="help-block font-small-3"></div>
                                            </fieldset>
                                            <fieldset class="form-group position-relative has-icon-left">
                                                <div class="d-flex justify-content-center">
                                                    {!! NoCaptcha::display() !!}
                                                </div>
                                                @if ($errors->has('g-recaptcha-response'))
                                                    <span class="help-block text-danger d-flex justify-content-center">
                                                        <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                                    </span>
                                                @endif
                                                
                                            </fieldset>
                                            <div class="form-group row">
                                                <div class="col-md-6 col-12 text-center text-md-left">
                                                    <fieldset>
                                                        <input name="remember" type="checkbox" id="remember-me" class="chk-remember">
                                                        <label for="remember-me"> {{ __('auth.remember_me') }}</label>
                                                    </fieldset>
                                                </div>
                                                <div class="col-md-6 col-12 text-center text-md-right"><a
                                                        href="{{ route('dashboard.show.send.email') }}" class="card-link">{{ __('auth.forgot_password') }}</a>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-danger btn-block btn-lg"><i
                                                    class="ft-unlock"></i> {{ __('auth.login') }}</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="card-footer border-0">
                                    <p class="card-subtitle line-on-side text-muted text-center font-small-3 mx-2 my-1">
                                    </p>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
