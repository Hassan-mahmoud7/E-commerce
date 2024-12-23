<?php

namespace App\Services\Dashboard;

use App\Repositories\Dashboard\WorldRepository;

class WorldService
{
    protected $worldRepository;
    public function __construct(WorldRepository $worldRepository)
    {
        $this->worldRepository = $worldRepository;
    }
    # country
    public function getAllCountries()
    {
        return  $this->worldRepository->getCountries();
    }
    public function getCountry($id)
    {
        $country =  $this->worldRepository->getCountry($id);
        self::abort($country);
        return $country;
    }
    public function changeStatusCountry($id)
    {
        $country = $this->getCountry($id);
        return self::changeStatusService($country);
    }
   
    # Governorate
    public function getAllGovernorates($id)
    {
        if (isset($id)) {
           $country = self::getCountry($id);
            return $this->worldRepository->getGovernoratesByCountry($country);
        }
        return  $this->worldRepository->getGovernorates();
    }
    public function getGovernorate($id)
    {
        $governorate =  $this->worldRepository->getGovernorate($id);
        self::abort($governorate);
        return $governorate;
    }
    public function changeStatusGovernorate($id)
    {
        $governorate = $this->getGovernorate($id);
        return self::changeStatusService($governorate);
    }

    # City
    public function getAllCities($id)
    {
        if (isset($id)) {
            $governorate = self::getGovernorate($id);
            return $this->worldRepository->getCitiesByGovernorate($governorate);
        }  
        return  $this->worldRepository->getCities();
    }
    public function getCity($id)
    {
        $city =  $this->worldRepository->getCity($id);
         self::abort($city);
        return $city;
    }
    public function changeStatusCity($id)
    {
        $city = $this->getCity($id);
        return self::changeStatusService($city);
    }
    # abort method
    public static function abort($row) 
    {
        if (!$row) {
            return abort(404);
        }
        return true;
    } 
    # change status method for countries, governorates and cities
    protected function changeStatusService($model)  
    {
        if ($model->status == 0) {
            $this->worldRepository->changeStatus($model, 1);
            return 1;
        } elseif ($model->status == 1) {
            $this->worldRepository->changeStatus($model, 0);
            return 0;
        } 
    }
    public function changeShippingPrice($request) 
    {
        $governorate = $this->getGovernorate($request->gover_id);
        $governorate = $this->worldRepository->changeShippingPrice($governorate , $request->price);
        if (!$governorate) {
            return false;
        }
        return true;
    }


}
