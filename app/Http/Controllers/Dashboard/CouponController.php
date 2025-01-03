<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CouponRequest;
use App\Services\Dashboard\CouponService;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public $couponService;
    public function __construct(CouponService $couponService)
    {
        $this->couponService = $couponService;
    }
    public function index()
    {
        return view('dashboard.coupons.index');
    }

    public function getAllCouponsForDatatable()
    {
        return $this->couponService->getAllCouponsForDatatable();
    }
    public function create()
    {
        return view('dashboard.coupons.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CouponRequest $request)
    {
        $data = $request->only(['code', 'discount_percentage', 'start_date', 'end_date', 'limit', 'status']);
        $coupon = $this->couponService->storeCoupon($data);
        if (!$coupon) {
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

    /**
     * Update the specified resource in storage.
     */
    public function update(CouponRequest $request, string $id)
    {
        
        $data = $request->only(['code', 'discount_percentage', 'start_date', 'end_date', 'limit', 'status']);
        $coupon = $this->couponService->updateCoupon($data, $id);
        if (!$coupon) {
            return response()->json(['status' => 'error', 'message' => __('dashboard.error_message')], 500);
        }
        return response()->json(['status' => 'success', 'message' => __('dashboard.updated_successfully')], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $coupon = $this->couponService->destroyCoupon($id);
        if (!$coupon) {
            return response()->json(['status' => 'error', 'message' => __('dashboard.error_message')], 500);
        }
        return response()->json(['status' => 'success', 'message' => __('dashboard.deleted_successfully')], 200);
    }
    public function changeStatus($id)
    {
        $status = $this->couponService->changeStatus($id);
        if (!$status) {
            return redirect()->back()->with('error', __('dashboard.error_message'));
        }
        if ($status == 1) {
            return redirect()->back()->with('success', __('dashboard.status_active_updated_successfully'));
        } elseif ($status == 2) {
            return redirect()->back()->with('success', __('dashboard.status_not_active_updated_successfully'));
        }
    }
}
