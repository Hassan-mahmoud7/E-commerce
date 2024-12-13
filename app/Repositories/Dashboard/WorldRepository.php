<?php

namespace App\Repositories\Dashboard;

use App\Models\City;
use App\Models\Country;
use App\Models\Governorate;

class WorldRepository
{
    # country
    public function getCountries()
    {
        $countries = Country::select('id','name','phone_code','flag_code','status')->get();
        return $countries;
    }
    public function getCountry($id)
    {
        $country = Country::find($id);
        return $country;
    }   
    # Governorate
    public function getGovernoratesByCountry($country)
    {
        $governorates = $country->governorates;
        return $governorates;
    }
    public function getGovernorates()
    {
        $Governorates = Governorate::select('id','name','status','country_id')->get();
        return $Governorates;
    }
    public function getGovernorate($id)
    {
        $Governorate = Governorate::find($id);
        return $Governorate;
    }
    
    # City
    public function getCitiesByGovernorate($governorate)
    {
        $cities = $governorate->cities;
        return $cities;
    }
    public function getCities()
    {
        $Cities = City::select('id','name','status','governorate_id')->get();
        return $Cities;
    }
    public function getCity($id)
    {
        $City = City::find($id);
        return $City;
    }
    # change status
    public function changeStatus($model)
    {
        $model = $model->status == 1 ? $model->update(['status' => 0]) : $model->update(['status' => 1]);
        return $model;
    }
    public function changeShippingPrice($governorate , $price) 
    {
        return $governorate->shippingPrice->update([
            'price' => $price, 
        ]);
    }
     
}
