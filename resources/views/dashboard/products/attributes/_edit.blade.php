<div class="modal fade text-left" id="updateAttributeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h3 class="modal-title" id="myModalLabel35"> {{ __('dashboard.edit_attribute') }}</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="" method="POST" id="update_attribute" class="form">
            @csrf
            @method('PUT')
            <div class="modal-body">
                {{-- validations errors --}}
                <div class="alert alert-danger" id="error_div_edit" style="display: none;">
                    <ul id="error_list_edit"></ul>
                </div> 
                <input type="hidden" name="id" value="" id="attribute_Id">
                <fieldset class="form-group floating-label-form-group">
                    <label for="attributeNameEn">{{ __('dashboard.attribute_name_en') }}</label>
                    <input type="text" name="name[en]" class="form-control" id="attributeNameEn" value=""
                        placeholder="{{ __('dashboard.attribute_name_en') }}">
                </fieldset>
                <fieldset class="form-group floating-label-form-group">
                    <label for="attributeNameAr">{{ __('dashboard.attribute_name_ar') }}</label>
                    <input type="text" name="name[ar]" class="form-control" id="attributeNameAr"
                        placeholder="{{ __('dashboard.attribute_name_ar') }}" value="">
                </fieldset>
                <hr class="mt-2 mb-2">
                <div class="row attribute_value_row_edit">
                   
               </div>
               <div class="col-md-2">
                   <button type="button" id="add_more_edit" class="btn btn-outline-primary btn-sm add_attribute_value">
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
