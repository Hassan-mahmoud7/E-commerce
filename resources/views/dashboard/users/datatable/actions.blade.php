<div class="form-group">
    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
        {{-- edit --}}
        <button class="edit_user btn btn-outline-info" 
        {{-- user_id="{{ $user->id }}"
        user_code="{{ $user->code }}"
        user_discount="{{ $user->discount_percentage }}"
        user_limit="{{ $user->limit }}"
        user_start_date="{{ $user->start_date }}"
        user_end_date="{{ $user->end_date }}"
        user_status="{{ $user->status }}" --}}
        ><i class="ft-edit-3"> {{ __('dashboard.edit') }}</i> </button>

        {{-- status --}}
        <a class="btn {{ $user->status == 0 ? 'btn-outline-success' : 'btn-outline-black' }} change_status" id="status_{{ $user->id }}" user-id="{{ $user->id }}"
            href="">
            <i id="icon_{{ $user->id }}" class="{{ $user->status == 0 ? 'la la-toggle-on' : 'la la-toggle-off' }}"></i>
            {{ $user->status == 0 ? __('dashboard.active') : __('dashboard.not_active') }}</a>
        {{-- DELETE --}}
      
            <button class="btn btn-outline-danger delete_confirm_btn" data-toggle="modal"
                data-target="#Delete-{{ $user->id }}" user_id="{{ $user->id }}">
                <i class="ft-trash-2"></i> {{ __('dashboard.delete') }}</button>
        
    </div>
</div>
