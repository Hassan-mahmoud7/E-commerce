@extends('layouts.dashboard.app')
@section('title', __('dashboard.edit_page'))
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
                                        href="{{ route('dashboard.pages.index') }}">{{ __('dashboard.pages') }}</a>
                                </li>
                                <li class="breadcrumb-item active"><a href="#">{{ __('dashboard.edit_page') }}</a>
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
                                    {{ __('dashboard.edit_page') }}
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
                                    <form action="{{ route('dashboard.pages.update' , $page->id) }}" method="POST" class="form" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-body">

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="title_en">{{ __('dashboard.page_title_en') }}</label>
                                                        <input type="text" name="title[en]" id="title_en"
                                                            class="form-control @error('title.en') is-invalid  @enderror"
                                                            placeholder="{{ __('dashboard.page_title_en') }}" value="{{ $page->getTranslation('title', 'en') }}">
                                                        @error('title.en')
                                                            <strong class="invalid-feedback"> {{ $message }}</strong>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="title_ar">{{ __('dashboard.page_title_ar') }}</label>
                                                        <input type="text" name="title[ar]" id="title_ar"
                                                            class="form-control @error('title.ar') is-invalid  @enderror"
                                                            placeholder="{{ __('dashboard.page_title_ar') }}" value="{{ $page->getTranslation('title', 'ar') }}">
                                                        @error('title.ar')
                                                            <strong class="invalid-feedback"> {{ $message }}</strong>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="summernote">{{ __('dashboard.page_content_en') }}</label>
                                                        <textarea name="content[en]" id="summernote" class="form-control" 
                                                        >{!! $page->getTranslation('content', 'en') !!}</textarea>
                                                        @error('content.en')
                                                            <strong class="invalid-feedback"> {{ $message }}</strong>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="summernote2">{{ __('dashboard.page_content_ar') }}</label>
                                                        <textarea name="content[ar]" id="summernote2" class="form-control" 
                                                            >{!! $page->getTranslation('content', 'ar') !!}</textarea>
                                                        
                                                        @error('content.ar')
                                                            <strong class="invalid-feedback"> {{ $message }}</strong>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="image">{{ __('dashboard.page_image') }}</label>
                                                        <input type="file" name="image" id="image"
                                                            class="form-control @error('image') is-invalid  @enderror">
                                                        </div>
                                                        @error('image')
                                                            <strong class="invalid-feedback"> {{ $message }}</strong>
                                                        @enderror
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group position-relative">
                                                        <label for="selectColor1">{{ __('dashboard.page_status') }}</label>
                                                        <select name="status" id="selectColor1" class="form-control border-warning @error('status') is-invalid  @enderror">
                                                            <option @selected($page->status == 1) value="1">{{ __('dashboard.active') }}</option>
                                                            <option @selected($page->status == 0) value="0">{{ __('dashboard.not_active') }}</option>
                                                        </select>
                                                        @error('status')
                                                            <strong class="invalid-feedback"> {{ $message }}</strong>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-actions right">
                                            <a href="{{ route('dashboard.pages.index') }}" type="button" class="btn btn-warning mr-1">
                                                <i class="ft-x"></i> {{ __('dashboard.cancel') }}
                                            </a>
                                            <button type="submit" class="btn btn-primary"><i
                                                    class="la la-check-square-o"></i> {{ __('dashboard.update') }}
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
@push('css')
    {{-- summernote --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.9.1/summernote-bs4.min.css" integrity="sha512-rDHV59PgRefDUbMm2lSjvf0ZhXZy3wgROFyao0JxZPGho3oOuWejq/ELx0FOZJpgaE5QovVtRN65Y3rrb7JhdQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush
@push('js')
 {{-- summernote --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.9.1/summernote-bs4.min.js" integrity="sha512-/DlF8zrT3XyUWEK7bmU1v7Q0kMXctQfqNwyzCNBB/mdUFxz87bq3X4TqadyuQBJW39g29t1tLNbHYLpXLs1zVA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
{{-- file input  --}}
    <script>
        var lang = "{{ app()->getLocale() }}";
        $(function() {
            $('#image').fileinput({
                theme: 'fa5',
                language:lang,
                allowedFileTypes: ['image'],
                maxFileCount: 1,
                showUpload: false,
                initialPreviewAsData: true,
                initialPreview: [
                            "{{ asset('assets/img/uploads/pages/'.$page->image) }}",
                ],
                initialPreviewConfig: [
                    {
                    caption: "{{ asset('assets/img/uploads/pages/'.$page->image) }}", 
                    width: '120px', 
                    url: "{{ route('dashboard.pages.delete.image', $page->id) }}", // server delete action 
                    key: 100, 
                    extra: {
                            _token: "{{ csrf_token() }}" 
                        }
                    }
                ],
            });
        });
    </script>
     {{-- summernote --}}
    <script>
        // $(document).ready(function() {
            $('#summernote').summernote({
                height: 400,
                tabsize: 2,
                placeholder: 'write page content in english',
                toolbar: [
                    ['style', ['bold', 'style', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['insert', ['link', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']],
                    ['table', ['table']],
                    ['height', ['height']]
                ]
            });
            $('#summernote2').summernote({
                height: 400,
                tabsize: 2,
                placeholder: 'اكتب محتوى الصفحة باللغة العربية',
                toolbar: [
                    ['style', ['bold', 'style', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['insert', ['link', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']],
                    ['table', ['table']],
                    ['height', ['height']]
                ]
            });
        // });
        </script>
@endpush