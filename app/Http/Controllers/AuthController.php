<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use App\Http\Requests\SigninRequest;
use App\Http\Requests\RegisterRequest;
use Validator;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Mail\WelcomeEmail;

use App\Mail\RegistrationEmail;

class AuthController extends Controller{

    public function login(Request $request){
        if  ($request->isMethod('post')) {
            $request->validate([
                'email'=>'required',
                'password'=>'required'
             ]);

            if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
                $user = Auth::user();
                if($user && Auth::user()->role == '2'){ 

                    return redirect()->route('cart');   
                }
                else{
                    // abort(401);
                     return redirect()->route('signin')->with('error','User is not founds, Please try with correct credentials!');
                 }
            }
            else{
               // abort(401);
                return redirect()->route('signin')->with('error','User is not found, Please try with correct credentials!');
            }
        }
        else{
            return view('Front-end.Auth.signin');
        }
    }

    public function register(Request $request){

        if ($request->isMethod('post')) {

              
            $data = $request->all();

            
            $this->validate($request,[
                'email'=>'required|unique:users,email',
                'name'=>'required',
                'password'=>'required',
                'phone'=>'required|numeric|min:10',
                
              ]);

              //dd($data);
          
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'phone'=>$request->phone,
                'role'=>2
            ]);

            $emaildata =['name'=> $request->name,'email'=>$request->email,'phone'=>$request->phone];
            
            if($user->id){

                Mail::to('me.alokprasad54@gail.com')->send(new RegistrationEmail($emaildata));
                Mail::to($request->email)->send(new WelcomeEmail($emaildata));  
                return redirect()->route('signin')->with('message','Registered Succesully. Pleas login into your account.');
            }

            }
        else{
            return view('Front-end.Auth.register');
        }  
    }
}
