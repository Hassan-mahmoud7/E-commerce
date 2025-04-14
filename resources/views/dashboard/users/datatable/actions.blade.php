<div class="form-group">
    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
        {{-- status --}}
        <a class="btn {{ $user->status == 0 ? 'btn-outline-success' : 'btn-outline-black' }} change_status" 
            id="status_{{ $user->id }}" user-id="{{ $user->id }}" href="">
            <i id="icon_{{ $user->id }}" class="{{ $user->status == 0 ? 'la la-toggle-on' : 'la la-toggle-off' }}"></i>
            {{ $user->status == 0 ? __('dashboard.active') : __('dashboard.not_active') }}</a>
        {{-- DELETE --}}
      
            <button class="btn btn-outline-danger delete_confirm_btn" data-toggle="modal"
                data-target="#Delete-{{ $user->id }}" user_id="{{ $user->id }}">
                <i class="ft-trash-2"></i> {{ __('dashboard.delete') }}</button>
        
    </div>
</div>
