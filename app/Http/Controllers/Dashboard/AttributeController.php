<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\AttributeRequest;
use App\Services\Dashboard\AttributeService;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    protected $attributeService;
    public function __construct(AttributeService $attributeService)
    {
        $this->attributeService = $attributeService;
    }
    public function index()
    {
        return view('dashboard.attributes.index');
    }
    public function getAllAttributesForDatatable()
    {
        return $this->attributeService->getAllAttributesForDatatable();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AttributeRequest $request)
    {
        $data = $request->only(['name', 'value']);
        $attribute = $this->attributeService->storeAttribute($data);
        if (!$attribute) {
            return response()->json(['status' => 'error', 'message' => __('dashboard.error_message')], 500);
        }
        return response()->json(['status' => 'success', 'message' => __('dashboard.created_successfully')], 201);
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
        //
    }

    public function update(AttributeRequest $request, string $id)
    {
        $data = $request->only(['name', 'value']);
        $attribute = $this->attributeService->updateAttribute($data ,$id);
        if (!$attribute) {
            return response()->json(['status' => 'error', 'message' => __('dashboard.error_message')], 500);
        }
        return response()->json(['status' => 'success', 'message' => __('dashboard.updated_successfully')], 200);
    }

    public function destroy(string $id)
    {
        $attribute = $this->attributeService->destroyAttribute($id);
        if (!$attribute) {
            return response()->json(['status' => 'error', 'message' => __('dashboard.error_message')], 500);
        }
        return response()->json(['status' => 'success', 'message' => __('dashboard.deleted_successfully')], 200);
    }
}
