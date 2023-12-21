<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Gate;
use App\Models\SubTest;

class CartController_new extends Controller
{
  

public function deleteSessionData(Request $request){
    $request->session()->forget('cart');
    $request->session()->forget('selectedProducts');   
    $request->session()->forget('coupon_sesssion');   
  
    echo "Data has been removed from session.";
}

}
