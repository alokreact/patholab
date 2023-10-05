<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;
use Symfony\Component\HttpFoundation\Response;

class AddressController extends Controller
{
    public function store(Request $request){
            
        $data = $request->all();

        $address = new Address;
        $address->user_id = \Auth::user()->id;
        $address->name = $request->input('name');
        $address->email = $request->input('email');
        $address->address1 = $request->input('address1');
        $address->state = $request->input('state');
        $address->city = $request->input('city');
        $address->zip = $request->input('zip');
        $address->save();

        return response()->json(['message'=>'Address saved Succesfully'], Response::HTTP_CREATED);


    }
}
