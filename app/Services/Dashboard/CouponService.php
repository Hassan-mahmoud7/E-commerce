<?php

namespace App\Services\Dashboard;

use Illuminate\Support\Facades\Cache;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Dashboard\CouponRepository;

class CouponService
{
    protected $couponRepository;
    public function __construct(CouponRepository $couponRepository)
    {
        $this->couponRepository = $couponRepository;
    }
    public function getCoupons()
    {
        $coupons = $this->couponRepository->getCoupons();
        return $coupons;
    }
    public function getAllcouponsForDatatable()
    {
        $coupons = $this->couponRepository->getCoupons();

        return DataTables::of($coupons)
            ->addIndexColumn()
            ->addColumn('status', function ($coupon) {
                return $coupon->getStatusTranslated();
            })
            ->addColumn('discount_percentage', function ($coupon) {
                return $coupon->discount_percentage . '%';
            })
            ->addColumn('action', function ($coupon) {
                return view('dashboard.coupons.datatable.actions', compact('coupon'));
            })
            ->rawColumns(['action'])
            ->make(true);
    }
    public function getCouponById($id)
    {
        $coupon = $this->couponRepository->getCouponById($id);
        return $coupon ??  abort(404);
    }
    public function storeCoupon($data)
    {
        $coupon = $this->couponRepository->storeCoupon($data);
        $this->couponsCache();
        return !$coupon ? false : $coupon;
    }
    public function updateCoupon($data, $id)
    {
        $coupon = $this->getCouponById($id);
        $coupon = $this->couponRepository->updateCoupon($coupon, $data);
        return !$coupon ? false : $coupon;
    }
    public function destroyCoupon($id)
    {
        $coupon = $this->getCouponById($id);
        $coupon = $this->couponRepository->destroyCoupon($coupon);
        $this->couponsCache();
        return !$coupon ? false : $coupon;
    }
    public function changeStatus($id)
    {
        $coupon = $this->getCouponById($id);
        if ($coupon->status == 0) {
            $this->couponRepository->changeStatus($coupon, 1);
            return 1;
        } elseif ($coupon->status == 1) {
            $this->couponRepository->changeStatus($coupon, 0);
            return 2;
        }
    }
    public function couponsCache()
    {
        Cache::forget('coupons_count');
    }
}
