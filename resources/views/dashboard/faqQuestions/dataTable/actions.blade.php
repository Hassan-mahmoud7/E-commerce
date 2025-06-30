<div class="form-group">
    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
        {{-- DELETE --}}
        <button class="btn btn-outline-danger delete_confirm_btn" faq_question_id="{{ $item->id }}">
            <i class="ft-trash-2"></i> {{ __('dashboard.delete') }}</button>
    </div>
</div>

