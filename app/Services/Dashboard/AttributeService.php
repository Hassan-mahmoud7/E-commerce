<?php

namespace App\Services\Dashboard;

use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Dashboard\AttributeRepository;
use App\Repositories\Dashboard\AttributeValueRepository;
use Illuminate\Support\Facades\Log;

class AttributeService
{
    protected $attributeRepositroy , $attributeValueRepository;
    public function __construct(AttributeRepository $attributeRepository,AttributeValueRepository $attributeValueRepository)
    {
        $this->attributeRepositroy = $attributeRepository;
        $this->attributeValueRepository = $attributeValueRepository;
    }
    public function getAllAttributesForDatatable()
    {
        $attributes = $this->attributeRepositroy->getAttributes();
        // dd($attributes);
        return DataTables::of($attributes)
            ->addIndexColumn()
            ->addColumn('name', function ($item) {
                return $item->name;
            })
            ->addColumn('attributeValue', function ($item) {
                return view('dashboard.products.attributes.datatable.attributes-value' ,compact('item'));
            })
            ->addColumn('action', function ($attribute) {
                return view('dashboard.products.attributes.datatable.actions', compact('attribute'));
            })
            ->rawColumns(['action'])
            ->make(true);
    }
    public function getAttributeById($id)
    {
        $attribute = $this->attributeRepositroy->getAttributeById($id);
        return $attribute ?? abort(404);
    }
    public function storeAttribute($data)
    {
        try {
            DB::beginTransaction();
            $attribute = $this->attributeRepositroy->storeAttribute($data['name']);
            foreach ($data['value'] as $value) {
                $this->attributeValueRepository->store($value ,$attribute);
            }
            DB::commit();
            return true;   
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
            Log::error("error attribute products" ,$e->getMessage());
        }
    }
    public function updateAttribute($data, $id)
    {
        try {
            $attribute_obj = $this->getAttributeById($id);
            DB::beginTransaction();
            $this->attributeRepositroy->updateAttribute($data['name'],$attribute_obj);
            $this->attributeValueRepository->deleteAttributeValues($attribute_obj);
            foreach ($data['value'] as $value) {
                $this->attributeValueRepository->store($value ,$attribute_obj);
            }
            DB::commit();
            return true;   
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
            Log::error("error attribute products" ,$e->getMessage());
        }
    }
    public function destroyAttribute($id)
    {
        $attribute = $this->getAttributeById($id);
        $attribute = $this->attributeRepositroy->deleteAttribute($attribute);
        return $attribute?? false;
    }
}
