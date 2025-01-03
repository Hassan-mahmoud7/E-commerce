<div class="modal fade text-left" id="edit_bootstrap" tabindex="-1" role="dialog" aria-labelledby="myModalLabel352"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h3 class="modal-title" id="myModalLabel352"> {{ __('dashboard.edit_coupon') }}</h3>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="" method="POST" id="update_coupon" class="form">
            @csrf
            @method('PUT')
            <div class="modal-body">
                {{-- validations errors --}}
                <div class="alert alert-danger" id="error_div_edit" style="display: none;">
                    <ul id="error_list_edit"></ul>
                </div> 
                <input hidden name="id" id="coupon_id" value="" >
                <fieldset class="form-group floating-label-form-group">
                    <label for="coupon_code">{{ __('dashboard.coupon_code') }}</label>
                    <input type="text" name="code" class="form-control" id="coupon_code" 
                        placeholder="{{ __('dashboard.coupon_code') }}">
                </fieldset>
                <fieldset class="form-group floating-label-form-group">
                    <label for="coupon_discount">{{ __('dashboard.coupon_discount_percentage') }}</label>
                    <input type="number" name="discount_percentage" class="form-control" id="coupon_discount"
                        placeholder="{{ __('dashboard.coupon_discount_percentage') }}" >
                </fieldset>
                <fieldset class="form-group floating-label-form-group">
                    <label for="coupon_limit">{{ __('dashboard.coupon_limit') }}</label>
                    <input type="number" name="limit" class="form-control" id="coupon_limit"
                        placeholder="{{ __('dashboard.coupon_limit') }}" >
                </fieldset>
                <fieldset class="form-group floating-label-form-group">
                    <label for="coupon_start_date">{{ __('dashboard.coupon_start_date') }}</label>
                    <input type="date" name="start_date" class="form-control" id="coupon_start_date"
                        placeholder="{{ __('dashboard.coupon_start_date') }}" >
                </fieldset>
                <fieldset class="form-group floating-label-form-group">
                    <label for="coupon_end_date">{{ __('dashboard.coupon_end_date') }}</label>
                    <input type="date" name="end_date" class="form-control" id="coupon_end_date"
                        placeholder="{{ __('dashboard.coupon_end_date') }}" >
                </fieldset>
                <fieldset class="form-group floating-label-form-group">
                    <label>{{ __('dashboard.coupon_status') }}</label>
                    <div class="input-group">
                        <div class="d-inline-block custom-control custom-radio mr-1">
                            <input type="radio" name="status" class="custom-control-input"
                                id="coupon_active" value="1">
                            <label class="custom-control-label" for="coupon_active">{{ __('dashboard.active') }}</label>
                        </div>
                        <div class="d-inline-block custom-control custom-radio">
                            <input type="radio" name="status" class="custom-control-input" id="coupon_not_active"
                                value="0">
                            <label class="custom-control-label"
                                for="coupon_not_active">{{ __('dashboard.not_active') }}</label>
                        </div>
                    </div>
                </fieldset>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary btn-lg"
                data-bs-dismiss="modal">{{ __('dashboard.cancel') }}</button>
                <button type="submit" class="btn btn-outline-primary btn-lg">{{ __('dashboard.save') }}</button>
            </div>
        </form>
    </div>
</div>
</div>
