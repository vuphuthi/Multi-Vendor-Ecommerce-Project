<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;
use Carbon\Carbon;
class CouponController extends Controller
{
    public function AllCoupon(){
        $coupons = Coupon::latest()->get();
        return view('backend.coupon.coupon_all',compact('coupons'));
    }

    public function AddCoupon(){
        return view('backend.coupon.coupon_add');
    }

    public function StoreCoupon(Request $request){

        Coupon::insert([
            'coupon_name' => $request->coupon_name,
            'coupon_discount' => $request->coupon_discount,
            'coupon_validity' => $request->coupon_validity, 
            'created_at' => Carbon::now(), 
        ]);
    
       $notification = array(
            'message' => 'Thêm thành công',
            'alert-type' => 'success'
        );
    
        return redirect()->route('all.coupon')->with($notification); 
    
    }
}