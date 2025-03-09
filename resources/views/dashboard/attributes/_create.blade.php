 <div class="modal fade text-left" id="attributeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35"
     aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h3 class="modal-title" id="myModalLabel35"> {{ __('dashboard.create_attribute') }}</h3>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <form action="" method="POST" id="create_attribute" class="form">
                 @csrf
                 <div class="modal-body">
                    {{-- validations errors --}}
                    <div class="alert alert-danger" id="error_div" style="display: none;">
                        <ul id="error_list"></ul>
                    </div> 
                     <fieldset class="form-group floating-label-form-group">
                         <label for="name_en">{{ __('dashboard.attribute_name_en') }}</label>
                         <input type="text" name="name[en]" class="form-control" id="name_en" value="{{ old('name.en') }}"
                             placeholder="{{ __('dashboard.attribute_name_en') }}">
                     </fieldset>
                     <fieldset class="form-group floating-label-form-group">
                         <label for="name_ar">{{ __('dashboard.attribute_name_ar') }}</label>
                         <input type="text" name="name[ar]" class="form-control" id="name_ar"
                             placeholder="{{ __('dashboard.attribute_name_ar') }}" value="{{ old('name.ar') }}">
                     </fieldset>
                     <hr class="mt-2 mb-2">
                     <div class="row attribute_value_row">
                        <fieldset class="form-group floating-label-form-group col-md-5">
                            <label for="value_en">{{ __('dashboard.attribute_value_en') }}</label>
                            <input type="text" name="value[1][en]" class="form-control" id="value_en"
                                placeholder="{{ __('dashboard.attribute_value_en') }}" value="{{ old('value.en') }}">
                        </fieldset>
                        <fieldset class="form-group floating-label-form-group col-md-5 ">
                            <label for="value_ar">{{ __('dashboard.attribute_value_ar') }}</label>
                            <input type="text" name="value[1][ar]" class="form-control" id="value_ar"
                                placeholder="{{ __('dashboard.attribute_value_ar') }}" value="{{ old('value.ar') }}">
                        </fieldset>
                         <div class="col-md-2 m-auto">
                             <button disabled type="button" class="btn btn-outline-danger btn-sm remove_attribute_value">
                                 <i class="ft-x"></i> 
                             </button>
                         </div>
                    </div>
                    <div class="col-md-2">
                        <button type="button" id="add_more" class="btn btn-outline-primary btn-sm add_attribute_value">
                               <i class="ft-plus"></i> 
                         </button>
                    </div>
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
