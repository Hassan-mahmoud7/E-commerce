<?php

namespace App\Repositories\Dashboard;

use App\Models\Coupon;

class CouponRepository
{
    public function getCoupons()
    {
        $coupons = Coupon::latest()->get();
        return $coupons;
    }
    public function getCouponById($id)
    {
        $coupon = Coupon::find($id);
        return $coupon;
    }
    public function storeCoupon($data)
    {
        $coupon = Coupon::create($data);
        return $coupon;
    }
    public function updateCoupon($coupon, $data)
    {
        $coupon->update($data);
        return $coupon;
    }
    public function destroyCoupon($coupon)
    {
        return $coupon->delete();
    }
    public function changeStatus($coupon)
    {
        $coupon = $coupon->status == 1 ? $coupon->update(['status' => 0]) : $coupon->update(['status' => 1]);
        return $coupon;
    }
}
