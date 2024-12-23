<div class="modal fade text-left" id="bootstrap" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="myModalLabel35"> {{ __('dashboard.create_brand') }}</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('dashboard.brands.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    @include('dashboard.includes.validations-errors')
                    <fieldset class="form-group floating-label-form-group">
                        <label for="name_en">{{ __('dashboard.brand_name_en') }}</label>
                        <input type="text" name="name[en]" class="form-control" id="name_en" placeholder="{{ __('dashboard.brand_name_en_text') }}">
                    </fieldset>
                    <fieldset class="form-group floating-label-form-group">
                        <label for="name_ar">{{ __('dashboard.brand_name_ar') }}</label>
                        <input type="text" name="name[ar]" class="form-control" id="name_ar" placeholder="{{ __('dashboard.brand_name_ar_text') }}">
                    </fieldset>
                   
                    <fieldset class="form-group floating-label-form-group">
                        <label for="singleImage">{{ __('dashboard.brand_logo') }}</label>
                        <input type="file" name="logo" class="form-control" id="singleImage" placeholder="Password">
                    </fieldset>
                    <br>
                    <fieldset class="form-group floating-label-form-group">
                            <label>{{ __('dashboard.brand_status') }}</label>
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
                    </fieldset>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-outline-secondary btn-lg" data-dismiss="modal">{{ __('dashboard.cancel') }}</button>
                    <button type="submit" class="btn btn-outline-primary btn-lg">{{ __('dashboard.save') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
