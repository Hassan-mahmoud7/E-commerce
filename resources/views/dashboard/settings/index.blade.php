@extends('layouts.dashboard.app')
@section('title', __('dashboard.setting'))
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
                                        href="#">{{ __('dashboard.settings') }}</a>
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
                                    <i class="ft ft-settings"></i> {{ __('dashboard.settings') }} 
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
                                    <form action="{{ route('dashboard.settings.update', $setting->id) }}"
                                         method="POST" class="form setting_form" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-body">
                                            <h4 class="form-section">
                                                <i class="la la-eye"></i> {{ __('dashboard.setting') }} {{ __('dashboard.basic_settings') }}
                                            </h4>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="site_name_ar">{{ __('dashboard.site_name_ar') }}</label>
                                                        <input readonly type="text" name="site_name[ar]" id="site_name_ar"
                                                            class="form-control @error('site_name.ar') is-invalid  @enderror"
                                                            placeholder="{{ __('dashboard.site_name_ar') }}" value="{{ old('site_name.ar') ?? $setting->getTranslation('site_name','ar') }}">
                                                        @error('site_name.ar')
                                                            <strong class="invalid-feedback"> {{ $message }}</strong>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="site_name_en">{{ __('dashboard.site_name_en') }}</label>
                                                        <input readonly type="text" name="site_name[en]" id="site_name_en"
                                                            class="form-control @error('site_name.en') is-invalid  @enderror"
                                                            placeholder="{{ __('dashboard.site_name_en') }}" value="{{ old('site_name.en') ?? $setting->getTranslation('site_name','en') }}">
                                                        @error('site_name.en')
                                                            <strong class="invalid-feedback"> {{ $message }}</strong>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="address_ar">{{ __('dashboard.address_ar') }}</label>
                                                        <input readonly type="text" name="address[ar]" id="address_ar"
                                                            class="form-control @error('address.ar') is-invalid  @enderror"
                                                            placeholder="{{ __('dashboard.address_ar') }}" value="{{ old('address.ar') ?? $setting->getTranslation('address','ar') }}">
                                                        @error('address.ar')
                                                            <strong class="invalid-feedback"> {{ $message }}</strong>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="address_en">{{ __('dashboard.address_en') }}</label>
                                                        <input readonly type="text" name="address[en]" id="address_en"
                                                            class="form-control @error('address.en') is-invalid  @enderror"
                                                            placeholder="{{ __('dashboard.address_en') }}" value="{{ old('address.en') ?? $setting->getTranslation('address','en') }}">
                                                        @error('address.en')
                                                            <strong class="invalid-feedback"> {{ $message }}</strong>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="small_desc_ar">{{ __('dashboard.small_desc_ar') }}</label>
                                                        <input readonly type="text" name="small_desc[ar]" id="small_desc_ar"
                                                            class="form-control @error('small_desc.ar') is-invalid  @enderror"
                                                            placeholder="{{ __('dashboard.small_desc_ar') }}" value="{{ old('small_desc.ar') ?? $setting->getTranslation('small_desc','ar') }}">
                                                        @error('small_desc.ar')
                                                            <strong class="invalid-feedback"> {{ $message }}</strong>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="small_desc_en">{{ __('dashboard.small_desc_en') }}</label>
                                                        <input readonly type="text" name="small_desc[en]" id="small_desc_en"
                                                            class="form-control @error('small_desc.en') is-invalid  @enderror"
                                                            placeholder="{{ __('dashboard.small_desc_en') }}" value="{{ old('small_desc.en') ?? $setting->getTranslation('small_desc','en') }}">
                                                        @error('small_desc.en')
                                                            <strong class="invalid-feedback"> {{ $message }}</strong>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="meta_desc_ar">{{ __('dashboard.meta_desc_ar') }}</label>
                                                        <input readonly type="text" name="meta_desc[ar]" id="meta_desc_ar"
                                                            class="form-control @error('meta_desc.ar') is-invalid  @enderror"
                                                            placeholder="{{ __('dashboard.meta_desc_ar') }}" value="{{ old('meta_desc.ar') ?? $setting->getTranslation('meta_desc','ar') }}">
                                                        @error('meta_desc.ar')
                                                            <strong class="invalid-feedback"> {{ $message }}</strong>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="meta_desc_en">{{ __('dashboard.meta_desc_en') }}</label>
                                                        <input readonly type="text" name="meta_desc[en]" id="meta_desc_en"
                                                            class="form-control @error('meta_desc.en') is-invalid  @enderror"
                                                            placeholder="{{ __('dashboard.meta_desc_en') }}" value="{{ old('meta_desc.en') ?? $setting->getTranslation('meta_desc','en') }}">
                                                        @error('meta_desc.en')
                                                            <strong class="invalid-feedback"> {{ $message }}</strong>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <h4 class="form-section">
                                                <i class="la la-eye"></i>{{ __('dashboard.setting') }} {{ __('dashboard.contact_setting') }}
                                            </h4>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="email">{{ __('dashboard.setting_email') }}</label>
                                                        <input readonly type="email" name="email" id="email"
                                                            class="form-control @error('email') is-invalid  @enderror"
                                                            placeholder="{{ __('dashboard.setting_email') }}" value="{{ old('email') ?? $setting->email }}">
                                                        @error('email')
                                                            <strong class="invalid-feedback"> {{ $message }}</strong>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="email_support">{{ __('dashboard.email_support') }}</label>
                                                        <input readonly type="email" name="email_support" id="email_support"
                                                            class="form-control @error('email_support') is-invalid  @enderror"
                                                            placeholder="{{ __('dashboard.email_support') }}" value="{{ old('email_support') ?? $setting->email_support }}">
                                                        @error('email_support')
                                                            <strong class="invalid-feedback"> {{ $message }}</strong>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="phone">{{ __('dashboard.site_phone') }}</label>
                                                        <input readonly type="tel" name="phone" id="phone"
                                                            class="form-control @error('phone') is-invalid  @enderror"
                                                            placeholder="{{ __('dashboard.site_phone') }}" value="{{ old('phone') ?? $setting->phone }}">
                                                        @error('phone')
                                                            <strong class="invalid-feedback"> {{ $message }}</strong>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="site_copyright">{{ __('dashboard.site_copyright') }}</label>
                                                        <input readonly type="text" name="site_copyright" id="site_copyright"
                                                            class="form-control @error('site_copyright') is-invalid  @enderror"
                                                            placeholder="{{ __('dashboard.site_copyright') }}" value="{{ old('site_copyright') ?? $setting->site_copyright }}">
                                                        @error('site_copyright')
                                                            <strong class="invalid-feedback"> {{ $message }}</strong>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <h4 class="form-section">
                                                <i class="la la-eye"></i>{{ __('dashboard.setting') }} {{ __('dashboard.social_setting') }}
                                            </h4>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="facebook">{{ __('dashboard.facebook') }}</label>
                                                        <input readonly type="text" name="facebook" id="facebook"
                                                            class="form-control @error('facebook') is-invalid  @enderror"
                                                            placeholder="{{ __('dashboard.facebook') }}" value="{{ old('facebook') ?? $setting->facebook }}">
                                                        @error('facebook')
                                                            <strong class="invalid-feedback"> {{ $message }}</strong>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="twitter">{{ __('dashboard.twitter') }}</label>
                                                        <input readonly type="text" name="twitter" id="twitter"
                                                            class="form-control @error('twitter') is-invalid  @enderror"
                                                            placeholder="{{ __('dashboard.twitter') }}" value="{{ old('twitter') ?? $setting->twitter }}">
                                                        @error('twitter')
                                                            <strong class="invalid-feedback"> {{ $message }}</strong>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="instagram">{{ __('dashboard.instagram') }}</label>
                                                        <input readonly type="text" name="instagram" id="instagram"
                                                            class="form-control @error('instagram') is-invalid  @enderror"
                                                            placeholder="{{ __('dashboard.instagram') }}" value="{{ old('instagram') ?? $setting->instagram }}">
                                                        @error('instagram')
                                                            <strong class="invalid-feedback"> {{ $message }}</strong>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="youtube">{{ __('dashboard.youtube') }}</label>
                                                        <input readonly type="text" name="youtube" id="youtube"
                                                            class="form-control @error('youtube') is-invalid  @enderror"
                                                            placeholder="{{ __('dashboard.youtube') }}" value="{{ old('youtube') ?? $setting->youtube }}">
                                                        @error('youtube')
                                                            <strong class="invalid-feedback"> {{ $message }}</strong>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <h4 class="form-section">
                                                <i class="la la-eye"></i>{{ __('dashboard.setting') }} {{ __('dashboard.media_setting') }}
                                            </h4>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="logo">{{ __('dashboard.logo') }}</label>
                                                        <input type="file" name="logo" id="logo"
                                                            class="form-control @error('logo') is-invalid  @enderror"
                                                             value="{{ $setting->logo }}">
                                                        @error('logo')
                                                            <strong class="invalid-feedback"> {{ $message }}</strong>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="favicon">{{ __('dashboard.favicon') }}</label>
                                                        <input type="file" name="favicon" id="favicon"
                                                            class="form-control @error('favicon') is-invalid  @enderror">
                                                        @error('favicon')
                                                            <strong class="invalid-feedback"> {{ $message }}</strong>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="promotion_video_url">{{ __('dashboard.promotion_video_url') }}</label>
                                                        <input readonly type="text" name="promotion_video_url" id="promotion_video_url"
                                                            class="form-control @error('promotion_video_url') is-invalid  @enderror"
                                                            placeholder="{{ __('dashboard.promotion_video_url') }}" value="{{ old('promotion_video_url') ?? $setting->promotion_video_url }}">
                                                        @error('promotion_video_url')
                                                            <strong class="invalid-feedback"> {{ $message }}</strong>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                         
                                        <div class="form-actions right">
                                            <button type="button" hidden id="cancel_btn"type="button" class="btn btn-warning mr-1">
                                                <i class="ft-x"></i> {{ __('dashboard.cancel') }}
                                            </button>
                                            <button hidden id="save_btn" type="submit" class="btn btn-primary"><i
                                                    class="la la-check-square-o"></i> {{ __('dashboard.save') }}
                                            </button>
                                            <button id="edit_btn" type="button" class="btn btn-info"><i
                                                    class="ft ft-edit"></i> {{ __('dashboard.edit') }}
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
@push('js')
    {{-- file input  --}}
    <script>
        var lang = "{{ app()->getLocale() }}";
        $(function() {
            $('#logo').fileinput({
                theme: 'fa5',
                language:lang,
                allowedFileTypes: ['image'],
                maxFileCount: 1,
                showUpload: false,
                initialPreviewAsData: true,
                initialPreview: [
                            "{{ asset($setting->logo) }}",
                ],
            });
        });
    </script>
    <script>
        var lang = "{{ app()->getLocale() }}";
        $(function() {
            $('#favicon').fileinput({
                theme: 'fa5',
                language:lang,
                allowedFileTypes: ['image'],
                maxFileCount: 1,
                showUpload: false,
                initialPreviewAsData: true,
                initialPreview: [
                            "{{ asset($setting->favicon) }}",
                ],
            });
        });
    </script>
    <script>
        $(document).on('click' , '#edit_btn',function() {
            $('#edit_btn').attr('hidden',true);
            $('#cancel_btn').removeAttr('hidden');
            $('#save_btn').removeAttr('hidden');
            $('.setting_form input').removeAttr('readonly');
        });
        //when click on cancel btn
        $(document).on('click' , '#cancel_btn',function() {
            $('#edit_btn').removeAttr('hidden');
            $('#cancel_btn').attr('hidden', true);
            $('#save_btn').attr('hidden', true);
            $('.setting_form input').attr('readonly', true);
        });
    </script>
@endpush