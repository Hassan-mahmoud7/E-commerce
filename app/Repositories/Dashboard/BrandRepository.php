<?php

namespace App\Repositories\Dashboard;

use App\Models\Brand;

class BrandRepository
{
    public function getBrands() 
    {
        $brands = Brand::withCount(['products'])->latest()->get();
        return $brands;       
    }
    public function getBrandById($id)
    {
        $brand = Brand::find($id);
        return $brand;
    }
    public function storeBrand($data)
    {
        $brand = Brand::create($data);
        return $brand;
    }
    public function updateBrand($brand, $data)
    {
        $brand->update($data);
        return $brand;
    }
    public function deleteBrand($brand)
    {
        return $brand->delete();
    }
    public function changeStatus($brand)
    {
        $brand = $brand->status == 1 ? $brand->update(['status' => 0]) : $brand->update(['status' => 1]);
        return $brand;
    }
}
