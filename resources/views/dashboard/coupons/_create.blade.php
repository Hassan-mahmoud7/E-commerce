 <div class="modal fade text-left" id="bootstrap" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35"
     aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h3 class="modal-title" id="myModalLabel35"> {{ __('dashboard.create_coupon') }}</h3>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <form action="" method="POST" id="create_coupon" class="form">
                 @csrf
                 <div class="modal-body">
                    {{-- validations errors --}}
                    <div class="alert alert-danger" id="error_div" style="display: none;">
                        <ul id="error_list"></ul>
                    </div> 
                     <fieldset class="form-group floating-label-form-group">
                         <label for="code">{{ __('dashboard.coupon_code') }}</label>
                         <input type="text" name="code" class="form-control" id="code" value="{{ old('code') }}"
                             placeholder="{{ __('dashboard.coupon_code') }}">
                     </fieldset>
                     <fieldset class="form-group floating-label-form-group">
                         <label for="discount_percentage">{{ __('dashboard.coupon_discount_percentage') }}</label>
                         <input type="number" name="discount_percentage" class="form-control" id="discount_percentage"
                             placeholder="{{ __('dashboard.coupon_discount_percentage') }}" value="{{ old('discount_percentage') }}">
                     </fieldset>
                     <fieldset class="form-group floating-label-form-group">
                         <label for="limit">{{ __('dashboard.coupon_limit') }}</label>
                         <input type="number" name="limit" class="form-control" id="limit"
                             placeholder="{{ __('dashboard.coupon_limit') }}" value="{{ old('limit') }}">
                     </fieldset>
                     <fieldset class="form-group floating-label-form-group">
                         <label for="start_date">{{ __('dashboard.coupon_start_date') }}</label>
                         <input type="date" name="start_date" class="form-control" id="start_date"
                             placeholder="{{ __('dashboard.coupon_start_date') }}" value="{{ old('start_date') }}">
                     </fieldset>
                     <fieldset class="form-group floating-label-form-group">
                         <label for="end_date">{{ __('dashboard.coupon_end_date') }}</label>
                         <input type="date" name="end_date" class="form-control" id="end_date"
                             placeholder="{{ __('dashboard.coupon_end_date') }}" value="{{ old('end_date') }}">
                     </fieldset>
                     <fieldset class="form-group floating-label-form-group">
                         <label>{{ __('dashboard.coupon_status') }}</label>
                         <div class="input-group">
                             <div class="d-inline-block custom-control custom-radio mr-1">
                                 <input type="radio" name="status" checked class="custom-control-input"
                                     id="yes" value="1">
                                 <label class="custom-control-label" for="yes">{{ __('dashboard.active') }}</label>
                             </div>
                             <div class="d-inline-block custom-control custom-radio">
                                 <input type="radio" name="status" class="custom-control-input" id="no"
                                     value="0">
                                 <label class="custom-control-label"
                                     for="no">{{ __('dashboard.not_active') }}</label>
                             </div>
                         </div>
                     </fieldset>
                 </div>
                 <div class="modal-footer">
                     <button type="reset" class="btn btn-outline-secondary btn-lg"
                         data-dismiss="modal">{{ __('dashboard.cancel') }}</button>
                     <button type="submit" class="btn btn-outline-primary btn-lg">{{ __('dashboard.save') }}</button>
                 </div>
             </form>
         </div>
     </div>
 </div>
