<div class="form-group">
    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
        {{-- edit --}}
        <a href="{{ route('dashboard.products.edit', $item->id) }}" class="edit_product btn btn-outline-info"><i class="ft-edit-3">
                {{ __('dashboard.edit') }}</i> </a>
        {{-- status --}}
        <a class="btn {{ $item->status == 0 ? 'btn-outline-success' : 'btn-outline-black' }} change_status" id="status_{{ $item->id }}" product-id="{{ $item->id }}"
            href="">
            <i id="icon_{{ $item->id }}" class="{{ $item->status == 0 ? 'la la-toggle-on' : 'la la-toggle-off' }}"></i>
            {{ $item->status == 0 ? __('dashboard.active') : __('dashboard.not_active') }}</a>
        {{-- show product --}}
        <a class="btn btn-outline-primary" href="{{ route('dashboard.products.show', $item->id) }}">
            <i class="la la-eye"></i>
            {{ __('dashboard.product_show') }}</a>
        {{-- DELETE --}}
        <button class="btn btn-outline-danger delete_confirm_btn" product_id="{{ $item->id }}">
            <i class="ft-trash-2"></i> {{ __('dashboard.delete') }}</button>

    </div>
</div>
