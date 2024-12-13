<div class="col-lg-4 col-md-6 col-sm-12">
    <div class="form-group">
        <div class="modal fade text-left" id="change_price_{{ $governorate->id }}" tabindex="-1" role="dialog"
            aria-labelledby="myModalLabel1" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title text-primary" id="myModalLabel1">
                            {{  __('dashboard.shipping_price') }}</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="alert alert-danger" style="display: none;" id="errors_{{ $governorate->id }}"></div>
                    <form  method="POST" class="update_shipping_price" gover-id="{{ $governorate->id }}">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <label for="change_price">{{ __('dashboard.enter_shipping_price') . ' ' . $governorate->name  }}</label>
                            <input class="form-control" type="number" name="price" id="change_price" placeholder="{{ __('dashboard.enter_shipping_price') }}" value="{{ $governorate->shippingPrice->price }}">
                            @error('price')
                            <strong class="invalid-feedback"> {{ $message }}</strong>
                            @enderror
                            <input type="hidden" name="gover_id"   value="{{ $governorate->id }}">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn grey btn-outline-secondary"
                                data-dismiss="modal">{{ __('dashboard.cancel') }}</button>
                            <button type="submit" class="btn btn-outline-success">{{ __('dashboard.price_change') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
