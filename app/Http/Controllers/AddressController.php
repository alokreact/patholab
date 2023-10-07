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

        $address->phone = $request->input('phone');
        $address->state = $request->input('state');
        $address->city = $request->input('city');
        $address->zip = $request->input('zip');
        $address->save();
        return response()->json(['message'=>'Address Saved Succesfully'], Response::HTTP_CREATED);
    }

    public function edit($id){
        $address = Address::find($id);
        //dd($address);

        return view('Front-end.Profile.components.address_edit', compact('address'));   
    }

    public function update(Request $request){


    }

    public function create(){
        return view('Front-end.Profile.components.address_form'); 
    }
}
