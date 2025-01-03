<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\BrandRequest;
use App\Services\Dashboard\BrandService;

class BrandController extends Controller
{
    protected $brandService;
    public function __construct(BrandService $brandService)
    {
        $this->brandService = $brandService;
    }
    public function index()
    {
        return view('dashboard.brands.index');
    }
    public function getAllBrandsForDatatable()
    {
        return $this->brandService->getAllBrandsForDatatable();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BrandRequest $request)
    {
        $data = $request->only(['name','status','logo',]);
        $brand = $this->brandService->storeBrand($data);
        if (!$brand) {
            return redirect()->back()->with('error', __('dashboard.error_message'));
        }
        return redirect()->route('dashboard.brands.index')->with('success', __('dashboard.created_successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $brand = $this->brandService->getBrandById($id);
        return view('dashboard.brands.edit',compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BrandRequest $request, string $id)
    {
        $data = $request->only(['name','status','logo',]);
        $brand = $this->brandService->updateBrand($id,$data);
        if (!$brand) {
            return redirect()->back()->with('error', __('dashboard.error_message'));
        }
        return redirect()->route('dashboard.brands.index')->with('success', __('dashboard.updated_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $brand = $this->brandService->deleteBrand($id);
        if (!$brand) {
            return redirect()->back()->with('error', __('dashboard.error_message'));
        }
        return redirect()->back()->with('success', __('dashboard.deleted_successfully'));
    }
    public function changeStatus($id)  
    {
        $status = $this->brandService->changeStatus($id);
        if (!$status) {
            return redirect()->back()->with('error', __('dashboard.error_message'));
        }
        if ($status == 1) {
            return redirect()->back()->with('success', __('dashboard.status_active_updated_successfully'));     
        }elseif($status == 2){
            return redirect()->back()->with('success', __('dashboard.status_not_active_updated_successfully'));
        }
    }
}
