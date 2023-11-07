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
use Illuminate\Support\Facades\Http;
use PragmaRX\Google2FA\Google2FA;


use App\Mail\RegistrationEmail;

class AuthController extends Controller{

    public function login(Request $request){
        if($request->isMethod('post')) {
            
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
            $carts =[];
            return view('Front-end.Auth.signin',compact('carts'));
        }
    }

    public function register(Request $request){

        if($request->isMethod('post')) { 
            $data = $request->all();
            $this->validate($request,[
                'email'=>'required|unique:users,email',
                'name'=>'required',
                //'password'=>'required',
                'phone'=>'required|numeric|min:10|unique:users,phone',
                
              ]);          
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                //'password' => Hash::make($request->password),
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

    public function generateOTP(Request $request){
        //Generate a new OTP
       
        $credentials = $request->only('phone'); // User's phone number
        //dd($credentials['phone']);

        $user = User::where('phone',$request->only('phone'))->get();
        //dd($user);  
        if(count($user->toArray())>0){

            $otp = str_pad(random_int(0, 9999), 4, '0', STR_PAD_LEFT);
            $expiresAt = now()->addMinutes(10);
    
            // Save the OTP to the database
            \DB::table('otps')->insert([
                'otp_code' => $otp,
                'expires_at' => $expiresAt,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            // Store the OTP data associated with the user's ID, phone number, or email
            $response = $this->sendOTP($credentials['phone'], $otp);
            //dd($response);
            return response()->json(['status'=>'success','message' => 'OTP sent successfully']);

        }
        else{
            return response()->json(['status'=>'error','message' => 'This Phone no is not register with us.']);

        }

        
    }

    public function verifyOTP(Request $request){
       
        //dd($request->all());
        // Get the OTP entered by the user
        $credentials = $request->input('phone');
        //dd($credentials);

        $userOTP = $request->input('otp');
       // dd(implode('',$userOTP));
        // Retrieve the stored OTP data for the user
        $otpRecord = \DB::table('otps')
            ->where('otp_code', implode('',$userOTP))
            ->where('expires_at', '>', now())
            ->first();

        if($otpRecord) {
             $user = User::where('phone',$request->only('phone'))->first();
             //dd($user['email']);
             // OTP is valid and not expired, perform the desired action

             Auth::login($user);
             \DB::table('otps')->where('id', $otpRecord->id)->delete();
              return response()->json(['status'=>'success','message' => 'OTP verified successfully','redirectTo' => route('home')]);            
        }
        else{
            
            return response()->json(['status'=>'error','message' => 'Invalid OTP']);
         }
    }

    private function sendOTP($phoneNumber, $otp){

        //dd($phoneNumber);

        // Use the third-party API to send the OTP to the user's phone number
        
        $baseUrl = 'smspackage.wiaratechnologies.com/api/mt/SendSMS';
        $queryParameters =  [
            'APIKey' => 'eFdx3x5kT0yNhX1EnTqtCw',
            'senderid' => 'CALABS',
            'channel'=>2,
            'DCS'=>0,
            'flashsms'=>0,
            'number'=>$phoneNumber,
            'text'=>'<#>Use ' .$otp.  ' as verification code on Calllabs. Valid for 10 minutes.',
            'route'=>31
            // Add any other POST data as needed
        ];

        $fullUrl = $baseUrl . '?' . http_build_query($queryParameters);

        $response = Http::post($fullUrl);


        if($response->successful()){
            // Request was successful (status code 2xx)
            $responseData = $response->json(); // Assuming the response is JSON   
            return $responseData;

        }else {
            // Request failed (status code not in 2xx)
            $errorData = $response->json(); // Assuming the error response is JSON
        }
    }
}


