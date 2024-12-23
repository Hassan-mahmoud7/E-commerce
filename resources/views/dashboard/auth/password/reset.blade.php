@extends('layouts.dashboard.auth')
@section('title', __('auth.reset_password'))
@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <section class="flexbox-container">
                <div class="col-12 d-flex align-items-center justify-content-center">
                    <div class="col-md-4 col-10 box-shadow-2 p-0">
                        <div class="card border-grey border-lighten-3 px-2 py-2 m-0">
                            <div class="card-header border-0 pb-0">
                                <div class="card-title text-center">
                                    <img src="{{ asset('assets/dashboard/images/logo/logo-dark.png') }}"
                                        alt="branding logo">
                                </div>
                                <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                                    <span>{{ __('auth.reset_password') }}</span>
                                </h6>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <form action="{{ route('dashboard.add.new.password') }}" method="POST"
                                        class="form-horizontal" action="login-simple.html" novalidate>
                                        @csrf
                                        <input type="hidden" name="email" value="{{ $email }}">
                                        <input type="hidden" name="token" value="{{ $token }}">
                                        <fieldset  class="form-group position-relative has-icon-left">
                                            @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                           
                                            
                                        </fieldset>
                                        <fieldset  class="form-group position-relative has-icon-left">
                                            <input type="password" name="password" class="form-control form-control-lg input-lg"
                                                id="user-password" placeholder="{{ __('auth.add_new_password') }}" required>
                                            <div class="form-control-position">
                                                <i class="la la-key"></i>
                                            </div>
                                            @error('password')
                                            <strong class=" text-danger">{{ $message }}</strong>
                                        @enderror
                                        </fieldset>
                                        <fieldset  class="form-group position-relative has-icon-left">
                                            <input type="password" name="password_confirmation" class="form-control form-control-lg input-lg"
                                                id="password_confirmation" placeholder="{{ __('auth.add_new_password_confirmation') }}" required>
                                            <div class="form-control-position">
                                                <i class="la la-key"></i>
                                            </div>
                                            @error('password_confirmation')
                                            <strong class=" text-danger">{{ $message }}</strong>
                                        @enderror
                                        </fieldset>
                                        <button class="btn btn-outline-warning btn-lg btn-block"></i> {{ __('auth.confirm') }}</button>
                                    </form>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection