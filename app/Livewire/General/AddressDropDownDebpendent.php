<?php

namespace App\Livewire\General;

use Livewire\Component;
use App\Services\Dashboard\WorldService;

class AddressDropDownDebpendent extends Component
{

    public $countryId, $governorateId, $cityId;
    protected WorldService $worldService;
    public function boot(WorldService $worldService)
    {
        $this->worldService = $worldService;
    }
    public function render()
    {
        return view(
            'livewire.general.address-drop-down-debpendent',
            [
                'countries' => $this->worldService->getAllCountries(),
                'governorates' => $this->countryId ? $this->worldService->getAllGovernorates($this->countryId) : [],
                'cities' => $this->governorateId ? $this->worldService->getAllCities($this->governorateId) : []
            ]
        );
    }
}
