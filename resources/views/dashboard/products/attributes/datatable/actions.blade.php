<div class="form-group">
    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
        {{-- edit --}}
        <button class="edit_attribute btn btn-outline-info" 
        data-id="{{ $attribute->id }}"
        data-name-en="{{ $attribute->getTranslation('name' , 'en') }}"
        data-name-ar="{{ $attribute->getTranslation('name' , 'ar') }}"
        data-values="{{ $attribute->attributeValues->map(fn($value) =>['id' => $value->id,
                'value_en' => $value->getTranslation('value','en'),
                'value_ar' => $value->getTranslation('value','ar'),
            ])->toJson() }}"

        ><i class="ft-edit-3"> {{ __('dashboard.edit') }}</i> </button>

        {{-- DELETE --}}
      
            <button class="btn btn-outline-danger delete_confirm_btn" data-toggle="modal"
                data-target="#Delete-{{ $attribute->id }}" attribute_id="{{ $attribute->id }}">
                <i class="ft-trash-2"></i> {{ __('dashboard.delete') }}</button>
        
    </div>
</div>
