@extends('layouts.dashboard.app')
@section('title', __('dashboard.create_category'))
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
                                        href="{{ route('dashboard.categories.index') }}">{{ __('dashboard.categories') }}</a>
                                </li>
                                <li class="breadcrumb-item active"><a href="#">{{ __('dashboard.create_category') }}</a>
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
                                    {{ __('dashboard.create_category') }}
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
                                    <form action="{{ route('dashboard.categories.store') }}" method="POST" class="form">
                                        @csrf
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="userinput1">{{ __('dashboard.category_name_ar') }}</label>
                                                        <input type="text" name="name[ar]" id="userinput1"
                                                            class="form-control @error('name.ar') is-invalid  @enderror"
                                                            placeholder="{{ __('dashboard.category_name_ar') }}" value="{{ old('name.ar') }}">
                                                        @error('name.ar')
                                                            <strong class="invalid-feedback"> {{ $message }}</strong>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="userinput52">{{ __('dashboard.category_name_en') }}</label>
                                                        <input type="text" name="name[en]" id="userinput25"
                                                            class="form-control @error('name.en') is-invalid  @enderror"
                                                            placeholder="{{ __('dashboard.category_name_en') }}" value="{{ old('name.en') }}">
                                                        @error('name.en')
                                                            <strong class="invalid-feedback"> {{ $message }}</strong>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="userinput52">{{ __('dashboard.category_parent') }}</label>
                                                        <select name="parent" class="form-control  @error('parent') is-invalid  @enderror" id="userinput52">
                                                            <option value="" >{{ __('dashboard.category_parent') }}</option>
                                                            @foreach($categories as $cat)
                                                            <option value="{{$cat->id}}" >{{ $cat->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        
                                                        @error('parent')
                                                            <strong class="invalid-feedback"> {{ $message }}</strong>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group col-12 mb-2">
                                                    <label>{{ __('dashboard.category_status') }}</label>
                                                    <div class="input-group">
                                                      <div class="d-inline-block custom-control custom-radio mr-1">
                                                        <input type="radio" name="status" checked class="custom-control-input" id="yes1" value="1" >
                                                        <label class="custom-control-label" for="yes1">{{ __('dashboard.active') }}</label>
                                                      </div>
                                                      <div class="d-inline-block custom-control custom-radio">
                                                        <input type="radio" name="status" class="custom-control-input" id="no0" value="0">
                                                        <label class="custom-control-label" for="no0">{{ __('dashboard.not_active') }}</label>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                                @error('status')
                                                <strong class="invalid-feedback"> {{ $message }}</strong>
                                                @enderror
                                         
                                        <div class="form-actions right">
                                            <a href="{{ route('dashboard.categories.index') }}" type="button" class="btn btn-warning mr-1">
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
