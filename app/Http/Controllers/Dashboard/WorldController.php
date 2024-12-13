<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ShippingPriceRequest;
use App\Services\Dashboard\WorldService;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isNull;

class WorldController extends Controller
{
    protected $worldService;
    public function __construct(WorldService $worldService)
    {
        $this->worldService = $worldService;
    }
    # country
    public function getAllCountries()
    {
        $countries =  $this->worldService->getAllCountries();
        return view('dashboard.world.countries', compact('countries'));
    }
    public function changeStatusCountry($country_id)
    {
        $data = $this->worldService->changeStatusCountry($country_id);
        $country = $this->worldService->getCountry($country_id);
        return $this->statusMessage($country, $data);
    }

    # Governorate
    public function getAllGovernorates($country_id = null)
    {
        $governorates = $this->worldService->getAllGovernorates($country_id);
        return view('dashboard.world.governorates', compact('governorates'));
    }
    public function changeStatusGovernorate($governorate_id)
    {
        $data = $this->worldService->changeStatusGovernorate($governorate_id);
        $governorate = $this->worldService->getGovernorate($governorate_id);
        return $this->statusMessage($governorate, $data);
    }
    public function changeShippingPrice(ShippingPriceRequest $request)
    {
        // return $request;
        $data = $this->worldService->changeShippingPrice($request);
        if (!$data) {
            return response()->json(['status' => false, 'message' =>  __('dashboard.error_message')], 404);
        }
        $gover = $this->worldService->getGovernorate($request->gover_id);
        $gover->load('shippingPrice');
        return response()->json([
            'status' => 'success',
            'message' => __('dashboard.updated_successfully') . ' ' .__('dashboard.shipping_price'), 
            'data' =>  $gover,
            ]
            , 200);
    }

    # City
    public function getAllCities($governorate_id = null)
    {
        $cities =  $this->worldService->getAllCities($governorate_id);
        return view('dashboard.world.cities', compact('cities'));
    }

    public function changeStatusCity($city_id)
    {
        $data = $this->worldService->changeStatusCity($city_id);
        $city = $this->worldService->getCity($city_id);
        return $this->statusMessage($city, $data);
    }

    #status message
    public function statusMessage($table, $data)
    {
        if ($table->status == 1) {
            return response()->json([
                'status' => 'success',
                'message' =>  __('dashboard.status_active_updated_successfully'),
                'data' =>  $table,

            ], 200);
        } elseif ($table->status == 0) {
            return response()->json([
                'status' => 'success_not_active',
                'message' =>  __('dashboard.status_not_active_updated_successfully'),
                'data' =>  $table,

            ], 200);
        }
        if (isNull($data)) {
            return response()->json(['status' => false, 'message' =>  __('dashboard.error_message')], 404);
        }
    }
}
