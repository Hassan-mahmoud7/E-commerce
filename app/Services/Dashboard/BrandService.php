<?php

namespace App\Services\Dashboard;

use App\Utils\ImageManger;
use Illuminate\Support\Facades\Cache;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Dashboard\BrandRepository;

class BrandService
{
    protected $brandRepository, $imageManger;
    public function __construct(BrandRepository $brandRepository, ImageManger $imageManger)
    {
        $this->brandRepository = $brandRepository;
        $this->imageManger = $imageManger;
    }
    public function getBrands()
    {
        return $this->brandRepository->getBrands();
    }
    public function getAllBrandsForDatatable()
    {
        $brands = $this->brandRepository->getBrands();

        return DataTables::of($brands)
            ->addIndexColumn()
            ->addColumn('name', function ($brand) {
                return $brand->name;
            })
            ->addColumn('logo', function ($brand) {
                return view('dashboard.brands.datatable.logo', compact('brand'));
            })
            ->addColumn('products_count', function ($brand) {
                return $brand->products_count == 0 ? __('dashboard.not_found') : $brand->products_count;
            })
            ->addColumn('status', function ($brand) {
                return $brand->getStatusTranslated();
            })
            ->addColumn('action', function ($brand) {
                return view('dashboard.brands.datatable.actions', compact('brand'));
            })
            ->rawColumns(['logo', 'action'])
            ->make(true);
    }
    public function getBrandById($id)
    {
        $brand = $this->brandRepository->getBrandById($id);
        if (!$brand) {
            abort('404');
        }
        return $brand;
    }
    public function storeBrand($data)
    {
        if (isset($data['logo']) && $data['logo'] != NUll) {
            $file_name = $this->imageManger->uploadSingleImage('/', $data['logo'], 'brands');
            $data['logo'] = $file_name;
        }
        $brand = $this->brandRepository->storeBrand($data);
        if (!$brand) {
            return false;
        }
        $this->brandsCache();
        return $brand;
    }
    public function updateBrand($id, $data)
    {
        $brand = $this->getBrandById($id);
        if (isset($data['logo']) && $data['logo'] != NUll) {
            $this->imageManger->deleteImageFromLocal($brand->logo);
            $file_name = $this->imageManger->uploadSingleImage('/', $data['logo'], 'brands');
            $data['logo'] = $file_name;
        }
        $brand = $this->brandRepository->updateBrand($brand, $data);
        return $brand;
    }
    public function deleteBrand($id)
    {
        $brand = $this->getBrandById($id);

        if ($brand->logo != NULL) {
            $this->imageManger->deleteImageFromLocal($brand->logo);
        }

        $brand = $this->brandRepository->deleteBrand($brand);
        $this->brandsCache();
        return $brand;
    }
    public function changeStatus($id)
    {
        $brand = $this->getBrandById($id);
        if ($brand->status == 0) {
            $this->brandRepository->changeStatus($brand, 1);
            return 1;
        } elseif ($brand->status == 1) {
            $this->brandRepository->changeStatus($brand, 0);
            return 2;
        }
    }
    public function brandsCache()
    {
        Cache::forget('brands_count');
    }
}
