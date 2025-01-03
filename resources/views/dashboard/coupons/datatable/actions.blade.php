<div class="form-group">
    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
        {{-- edit --}}
        <button class="edit_coupon btn btn-outline-info" 
        coupon_id="{{ $coupon->id }}"
        coupon_code="{{ $coupon->code }}"
        coupon_discount="{{ $coupon->discount_percentage }}"
        coupon_limit="{{ $coupon->limit }}"
        coupon_start_date="{{ $coupon->start_date }}"
        coupon_end_date="{{ $coupon->end_date }}"
        coupon_status="{{ $coupon->status }}"
        ><i class="ft-edit-3"> {{ __('dashboard.edit') }}</i> </button>

        {{-- status --}}
        <a class="btn {{ $coupon->status == 0 ? 'btn-outline-success' : 'btn-outline-black' }}"
            href="{{ route('dashboard.coupons.status', $coupon->id) }}">
            <i class="{{ $coupon->status == 0 ? 'la la-toggle-on' : 'la la-toggle-off' }}"></i>
            {{ $coupon->status == 0 ? __('dashboard.active') : __('dashboard.not_active') }}</a>
        {{-- DELETE --}}
      
            <button class="btn btn-outline-danger delete_confirm_btn" data-toggle="modal"
                data-target="#Delete-{{ $coupon->id }}" coupon_id="{{ $coupon->id }}">
                <i class="ft-trash-2"></i> {{ __('dashboard.delete') }}</button>
        
    </div>
</div>
