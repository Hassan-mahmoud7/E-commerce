<div>
    <fieldset class="form-group floating-label-form-group">
        <label for="country_id">{{ __('dashboard.country') }}</label>
        <select name="country_id" wire:model.live="countryId" class="form-control" id="country_id">
            <option value="">{{ __('dashboard.select') }} {{ __('dashboard.country') }}</option>
            @foreach ($countries as $country)
                <option value="{{ $country->id }}">{{ $country->name }}</option>
            @endforeach
        </select>
        @error('country_id')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </fieldset>

    <fieldset class="form-group floating-label-form-group">
        <label for="area_id">{{ __('dashboard.governorate') }}</label>
        <select name="governorate_id" wire:model.live="governorateId" class="form-control" id="area_id">
            <option value="">{{ __('dashboard.select') }} {{ __('dashboard.governorate') }}</option>
            @foreach ($governorates as $governorate)
                <option value="{{ $governorate->id }}">{{ $governorate->name }}</option>
            @endforeach
        </select>
        @error('governorate_id')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </fieldset>

    <fieldset class="form-group floating-label-form-group">
        <label for="city_id">{{ __('dashboard.city') }}</label>
        <select name="city_id" wire:model="cityId" class="form-control" id="city_id">
            <option value="">{{ __('dashboard.select') }} {{ __('dashboard.city') }}</option>
            @foreach ($cities as $city)
                <option value="{{ $city->id }}">{{ $city->name }}</option>
            @endforeach
        </select>
        @error('city_id')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </fieldset>

</div>
