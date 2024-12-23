@extends('layouts.dashboard.app')
@section('title', __('dashboard.create_admin'))
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
                                        href="{{ route('dashboard.admins.index') }}">{{ __('dashboard.admins') }}</a>
                                </li>
                                <li class="breadcrumb-item active"><a href="#">{{ __('dashboard.create_admin') }}</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                @include('dashboard.includes.button-header')
            </div>
            <div class="content-body">
                <section id="basic-form-layouts">
                    <div class="row match-height mt-3">
                        <div class="card col-md-11 m-auto mt-3">
                            <div class="card-header">
                                <h4 class="card-title" id="basic-layout-colored-form-control">
                                    {{ __('dashboard.create_admin') }}
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
                                    {{-- @include('dashboard.includes.validations-errors') --}}
                                    <form action="{{ route('dashboard.admins.store') }}" method="POST" class="form">
                                        @csrf
                                        <div class="form-body">

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="userinput1">{{ __('dashboard.admin_name_en') }}</label>
                                                        <input type="text" name="name" id="userinput1"
                                                            class="form-control @error('name') is-invalid  @enderror"
                                                            placeholder="{{ __('dashboard.admin_name_en') }}">
                                                        @error('name')
                                                            <strong class="invalid-feedback"> {{ $message }}</strong>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="userinput52">{{ __('dashboard.email') }}</label>
                                                        <input type="text" name="email" id="userinput25"
                                                            class="form-control @error('email') is-invalid  @enderror"
                                                            placeholder="{{ __('dashboard.admin_name') }}">
                                                        @error('email')
                                                            <strong class="invalid-feedback"> {{ $message }}</strong>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group position-relative">
                                                        <label for="selectColor1">{{ __('dashboard.admin_status') }}</label>
                                                        <select name="status" id="selectColor1" class="form-control border-warning @error('status') is-invalid  @enderror">
                                                            <option value="1">{{ __('dashboard.active') }}</option>
                                                            <option value="0">{{ __('dashboard.not_active') }}</option>
                                                        </select>
                                                        @error('status')
                                                            <strong class="invalid-feedback"> {{ $message }}</strong>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group position-relative">
                                                        <label for="selectColor2">{{ __('dashboard.role') }}</label>
                                                        <select name="role_id" id="selectColor2" class="form-control border-warning @error('role_id') is-invalid  @enderror">
                                                            @foreach ($roles as $role)
                                                            <option value="{{ $role->id }}">{{ $role->role }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('role_id')
                                                            <strong class="invalid-feedback"> {{ $message }}</strong>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="userinput32">{{ __('dashboard.admin_password') }}</label>
                                                        <input type="password" name="password" id="userinput32"
                                                            class="form-control @error('password') is-invalid  @enderror"
                                                            placeholder="{{ __('dashboard.admin_name') }}">
                                                        @error('password')
                                                            <strong class="invalid-feedback"> {{ $message }}</strong>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="userinput42">{{ __('dashboard.admin_confirm_password') }}</label>
                                                        <input type="password" name="password_confirmation" id="userinput42"
                                                            class="form-control @error('password_confirmation') is-invalid  @enderror"
                                                            placeholder="{{ __('dashboard.admin_name') }}">
                                                        @error('password_confirmation')
                                                            <strong class="invalid-feedback"> {{ $message }}</strong>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-actions right">
                                            <a href="{{ route('dashboard.admins.index') }}" type="button" class="btn btn-warning mr-1">
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
