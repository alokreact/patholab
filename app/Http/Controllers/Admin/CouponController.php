<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;
use App\Models\User;

class CouponController extends Controller
{
    public function index(){   
        $coupons = Coupon::with('user')->get();
        return view('Admin.Coupons.index',compact('coupons'));
    }
    public function store(Request $request){
        $code = \Str::random(6);
        $user = User::find($request->post('user_id'));
        $coupon = new Coupon([
            'code' => $code,
            'name' =>$request->input('name'),
            'type'=> $request->input('type'),
            'expires_at' => $request->input('expire_at'),
            'amount' => $request->input('percentage'),
        ]);
        $user->coupon()->save($coupon);
        return redirect()->route('coupon.index')->with('messsage','Coupon Created Successfully');
    }
    public function create(){
        $users = User::all();
        return view('Admin.Coupons.create',compact('users'));
    }
}
