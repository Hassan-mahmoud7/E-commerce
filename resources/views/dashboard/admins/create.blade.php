@extends('layouts.dashboard.app')
@section('title', 'Create')
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">{{ __('dashboard.dashboard') }}</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a
                                        href="{{ route('dashboard.welcome') }}">{{ __('dashboard.welcome') }}</a>
                                </li>
                                <li class="breadcrumb-item"><a
                                        href="{{ route('dashboard.roles.index') }}">{{ __('dashboard.role') }}</a>
                                </li>
                                <li class="breadcrumb-item active"><a href="#">{{ __('dashboard.create_role') }}</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="content-header-right col-md-6 col-12">
                    <div class="dropdown float-md-right">
                        <button class="btn btn-danger dropdown-toggle round btn-glow px-2" id="dropdownBreadcrumbButton"
                            type="button" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">Actions</button>
                        <div class="dropdown-menu" aria-labelledby="dropdownBreadcrumbButton"><a class="dropdown-item"
                                href="#"><i class="la la-calendar-check-o"></i> Calender</a>
                            <a class="dropdown-item" href="#"><i class="la la-cart-plus"></i> Cart</a>
                            <a class="dropdown-item" href="#"><i class="la la-life-ring"></i> Support</a>
                            <div class="dropdown-divider"></div><a class="dropdown-item" href="#"><i
                                    class="la la-cog"></i> Settings</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <section id="basic-form-layouts">
                    <div class="row match-height mt-3">
                        <div class="card col-md-11 m-auto mt-3">
                            <div class="card-header">
                                <h4 class="card-title" id="basic-layout-colored-form-control">
                                    {{ __('dashboard.create_role') }}
                                </h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        <li><a data-action="close"><i class="ft-x"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    @include('dashboard.includes.validations-errors')
                                    <form action="{{ route('dashboard.roles.store') }}" method="POST" class="form">
                                        @csrf
                                        <div class="form-body">

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="userinput1">{{ __('dashboard.role_name_en') }}</label>
                                                        <input type="text" name="role[en]" id="userinput1"
                                                            class="form-control @error('role.en') is-invalid  @enderror"
                                                            placeholder="{{ __('dashboard.role_name_en') }}">
                                                        @error('role.en')
                                                            <strong class="invalid-feedback"> {{ $message }}</strong>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="userinput2">{{ __('dashboard.role_name_ar') }}</label>
                                                        <input type="text" name="role[ar]" id="userinput2"
                                                            class="form-control @error('role.ar') is-invalid  @enderror"
                                                            placeholder="{{ __('dashboard.role_name_ar') }}">
                                                        @error('role.ar')
                                                            <strong class="invalid-feedback"> {{ $message }}</strong>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">

                                                @if (config('app.locale') == 'ar')
                                                    @error('permission')
                                                        <strong class="invalid-feedback d-block m-1">
                                                            {{ $message }}</strong>
                                                    @enderror
                                                    @foreach (config('permissions_ar') as $permission => $value)
                                                        <div class="col-md-2">
                                                            <fieldset>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" name="permission[]"
                                                                        class="custom-control-input"
                                                                        value="{{ $permission }}"
                                                                        id="customCheck-{{ $loop->iteration }}">
                                                                    <label class="custom-control-label"
                                                                        for="customCheck-{{ $loop->iteration }}">{{ $value }}</label>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    @endforeach
                                                @else
                                                    @error('permission')
                                                        <strong class="invalid-feedback d-block m-1">
                                                            {{ $message }}</strong>
                                                    @enderror
                                                    @foreach (config('permissions_en') as $permission => $value)
                                                        <div class="col-md-2">
                                                            <fieldset>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" name="permission[]"
                                                                        class="custom-control-input"
                                                                        value="{{ $permission }}"
                                                                        id="customCheck-{{ $loop->iteration }}">
                                                                    <label class="custom-control-label"
                                                                        for="customCheck-{{ $loop->iteration }}">{{ $value }}</label>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-actions right">
                                            <a href="{{ route('dashboard.roles.index') }}" type="button" class="btn btn-warning mr-1">
                                                <i class="ft-x"></i> {{ __('dashboard.cancel') }}
                                            </a>
                                            <button type="submit" class="btn btn-primary"><i
                                                    class="la la-check-square-o"></i> {{ __('dashboard.save') }}
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

@endsection
