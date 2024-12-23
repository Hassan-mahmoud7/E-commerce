@extends('layouts.dashboard.auth')
@section('title', __('auth.confirm'))
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
                                    <span>{{ __('auth.check_code') }}</span>
                                </h6>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <form action="{{ route('dashboard.check.code') }}" method="POST"
                                        class="form-horizontal" action="login-simple.html" >
                                        @csrf
                                        <fieldset hidden class="form-group position-relative has-icon-left">
                                            <input type="hidden" name="email" class="form-control form-control-lg input-lg"
                                                id="user-email" placeholder="{{ __('auth.email') }}" value="{{ $email }}" > 
                                        </fieldset>
                                        <fieldset  class="form-group position-relative has-icon-left">
                                            <input type="text" name="token" class="form-control form-control-lg input-lg"
                                                id="user-token" placeholder="{{ __('auth.Enter_your_code') }}" >
                                            <div class="form-control-position">
                                               
                                            </div>
                                            @error('token')
                                            <strong class=" text-danger">{{ $message }}</strong>
                                        @enderror
                                        </fieldset>
                                        <button class="btn btn-outline-info btn-lg btn-block"> {{ __('auth.confirm') }}</button>
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