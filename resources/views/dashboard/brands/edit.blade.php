@extends('layouts.dashboard.app')
@section('title', __('dashboard.edit_brand'))
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
                                        href="{{ route('dashboard.brands.index') }}">{{ __('dashboard.brands') }}</a>
                                </li>
                                <li class="breadcrumb-item active"><a href="#">{{ __('dashboard.edit_brand') }}</a>
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
                                    {{ __('dashboard.edit_brand') }}
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
                                    <form action="{{ route('dashboard.brands.update', $brand->id) }}" method="POST"
                                        class="form" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="id" value="{{ $brand->id }}">
                                        <div class="modal-body">
                                            @include('dashboard.includes.validations-errors')
                                            <fieldset class="form-group floating-label-form-group">
                                                <label for="name_en">{{ __('dashboard.brand_name_en') }}</label>
                                                <input type="text" name="name[en]" class="form-control" id="name_en"
                                                    placeholder="{{ __('dashboard.brand_name_en_text') }}"
                                                    value="{{ $brand->getTranslation('name', 'en') }}">
                                            </fieldset>
                                            <fieldset class="form-group floating-label-form-group">
                                                <label for="name_ar">{{ __('dashboard.brand_name_ar') }}</label>
                                                <input type="text" name="name[ar]" class="form-control" id="name_ar"
                                                    value="{{ $brand->getTranslation('name', 'ar') }}"
                                                    placeholder="{{ __('dashboard.brand_name_ar_text') }}">
                                            </fieldset>

                                            <fieldset class="form-group floating-label-form-group">
                                                <label for="singleImage">{{ __('dashboard.brand_logo') }}</label>
                                                <input type="file" name="logo" class="form-control" id="singleImage"
                                                    placeholder="Password" >
                                            </fieldset>
                                            <br>
                                            <fieldset class="form-group floating-label-form-group">
                                                <label>{{ __('dashboard.brand_status') }}</label>
                                                <div class="input-group">
                                                    <div class="d-inline-block custom-control custom-radio mr-1">
                                                        <input type="radio" name="status" class="custom-control-input"
                                                            @checked($brand->status == 1) id="yes1" value="1">
                                                        <label class="custom-control-label"
                                                            for="yes1">{{ __('dashboard.active') }}</label>
                                                    </div>
                                                    <div class="d-inline-block custom-control custom-radio">
                                                        <input type="radio" name="status" class="custom-control-input"
                                                            id="no0" @checked($brand->status == 0) value="0">
                                                        <label class="custom-control-label"
                                                            for="no0">{{ __('dashboard.not_active') }}</label>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="reset" class="btn btn-outline-secondary btn-lg"
                                                data-dismiss="modal">{{ __('dashboard.cancel') }}</button>
                                            <button type="submit"
                                                class="btn btn-outline-primary btn-lg">{{ __('dashboard.save') }}</button>
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
@push('js')
    {{-- file input  --}}
    <script>
        var lang = "{{ app()->getLocale() }}";
        $(function() {
            $('#singleImage').fileinput({
                theme: 'fa5',
                language:lang,
                allowedFileTypes: ['image'],
                maxFileCount: 1,
                showUpload: false,
                initialPreviewAsData: true,
                initialPreview: [
                            "{{ asset($brand->logo) }}",
                ],
            });
        });
    </script>
@endpush
