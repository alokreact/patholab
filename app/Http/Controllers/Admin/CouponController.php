<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;

class CouponController extends Controller
{
    public function index(){   
        $coupons = Coupon::all();
        return view('Admin.Coupons.index',\compact('coupons'));
    }

    public function store(Request $request){
        //dd($request->all());

        $code = \Str::random(6);
        $coupon = new Coupon;
        $coupon->code = $code;
        $coupon->name = $request->input('name');
        $coupon->type = $request->input('type');
        $coupon->expires_at = $request->input('expire_at');
        $coupon->amount = $request->input('percentage');
        $coupon->save();
        return redirect()->route('coupon.index')->with('messsage','Coupon Created Successfully');
    }
    public function create(){
        return view('Admin.Coupons.create');
    }
}
