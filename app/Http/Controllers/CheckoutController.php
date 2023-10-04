<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Str;
use Auth;
use App\Models\Order;
use App\Models\Cart;
use App\Models\OrderItem;
use App\Models\Patient;
use App\Service\CartService;
use App\Service\OrderService;

use Mail;
use App\Mail\OrderEmail;
use Illuminate\Support\Collection;
use App\Service\PdfService;

use Razorpay\Api\Api;

use Symfony\Component\HttpFoundation\Response;

class CheckoutController extends Controller
{
    //private $razorpayId = "DLDiT3zaLoZI9ZsN27Yd7dJ0";
    // private  $razorpayKey = "rzp_test_BqPPqd2H5aA49G";

    private $razorpayId = "rHIkpFOzmESeLw2IpNbhyI99";
    private $razorpayKey = "rzp_live_Sov1SDDvaLh47j";

    public function addPatient(Request $request){
        
        $data = $request->all();
       //dd($request->all());
        $patient = new Patient();
        $patient->name = $request->input('name');
        $patient->age = $request->input('age');
        $patient->gender = $request->input('gender');
        $patient->user_id = Auth::user()->id;
        $patient->save();
        $new_patient = $patient->toArray();
        //dd($new_patient);

        $res_patient = ['id'=>$new_patient['id'],'name'=> $new_patient['name'], 'age'=> $new_patient['age'],
                         'gender'=>$new_patient['gender'] == '1'?'Male':'female'];
 
        return response()->json(['status'=>'success','patient'=>$res_patient]);
        //return view('layouts.frontend.user-details');
    }

    public function  index(){
        $user = Auth::user();
        if($user && Auth::user()->role == '2'){   
            return view('Front-end.Checkout.index');
        }
        else{
            return view('Front-end.Auth.signin')->with('error','Credntial are incorrect, Please try again after sometime!');       
        }
    }

    public function confirmation(){
        $user_id = Auth::user()->id;        
        return view('Front-end.Checkout.confirmation');

    }

    public function success(){
        $user_id = Auth::user()->id;        
        return view('Front-end.checkout.confirmation');
    }

    public function checkout(){
       try{
            $cartItems =  \Cart::content();              
            $patients = Patient::where('user_id','=',Auth::user()->id)->get();
            return view('Front-end.Checkout.newcheckout',\compact('cartItems','patients'));
        }

        catch (Exception $e){
            \DB::rollback();
            return  response()->json(['data'=>[],'message'=>'Some Error, Please try again!'],400);
        }
    }

     

    public function save_order(Request $request){

        $data = $request->all();
        dd($request->all());
        if($data['pay_option'] === '2'){

            $recieptId = mt_rand(10000, 99999);
            $items =  CartService::get_cart_items();
            $itemsCollection = new Collection($items);
            $total = $itemsCollection->sum('price');
            $data['total'] = $total;
            $order_id = OrderService::save_order($data);
            
            $response = OrderService::save_order_items(
                    isset($data['patient'])? $data['patient']: $data['new_patient'], $order_id,$items);
            
            if(count($response) >0){

                $data['items'] = $items;
                $data['date'] = now();
                $data['order_id'] = $recieptId;
                
                
                    $pdfService = new PdfService();
                    //dd($data['email']);
                    $pdfContent = $pdfService->generatePdfFromView('emails.order', $data);
                    //Send email with PDF attachment
                    $pdfFileName = 'order.pdf';
                    $email = $data['email'];
                    Mail::send([], [], function ($message) use ($pdfContent, $pdfFileName,$email) {
                        $message->to($email)
                            ->subject('Order Confirmation')
                            ->attachData($pdfContent, $pdfFileName, ['mime' => 'application/pdf']);
                    });
                    $request->session()->forget('cart');
                    //Mail::to($data['email'])->send(new OrderEmail($items));
                    return redirect()->route('confirmation');
                
                
            }
        }

        else{    
            $recieptId = mt_rand(10000, 99999);
            $items =  CartService::get_cart_items();
            $itemsCollection = new Collection($items);
            $total = $itemsCollection->sum('price');
            $data['total'] = $total;
            //dd($this->razorpayId);
            $api = new Api($this->razorpayKey, $this->razorpayId);
           // dd($api);
            $order = [
                'receipt'         => 'order_'.$recieptId,
                'amount'          => $total * 100, // 39900 rupees in paise
                'currency'        => 'INR'
            ];

            $razorpayOrder = $api->order->create($order);
            //dd($razorpayOrder);
            $data['razorpayId'] = $razorpayOrder['id'];
            
            $response = OrderService::save_order($data);
            $data['items'] = $items;
            $data['date'] = now();
            $data['order_id'] = $recieptId;
      
            if($response !== null) { 
                $response = [
                    'orderId' => $razorpayOrder['id'],
                    'razorpayId' => $this->razorpayId,
                    'user_name' => $data['name'],
                    'currency' => 'INR',
                    'user_email' => $data['email'],
                    'user_phone' => $data['phone'],
                    'user_address' => $data['address'],
                    'description' => 'New Test',
                    'pay_option' => 1,
                    'recieptId' => $recieptId,
                    'user_id' => Auth::user()->id,
                    'order_date'=>$data['slot_day'],
                    'collection_time'=>$data['slot_time'],
                    'total'=> $total                
                ];

            return view('Front-end.Cart.payment-page', compact('response'));
            //return view('Front-end.Checkout.rzp_checkout', compact('response'));
        }
    }
        //return response()->json( ['status'=>'success','msg'=>'Order Created Succesfully'],200,);
    }

    public function razorpay(){        
        return view('Front-end.Checkout.razorpay');
    }

    public function handleCallback(Request $request){
        
        $api = new Api($this->razorpayKey, $this->razorpayId);
        
        $razorpay_order_id = $request->input('razorpay_order_id');
        $razorpay_payment_id = $request->input('razorpay_payment_id');
        $razorpay_signature = $request->input('razorpay_signature');

        // Verify the payment
        $attributes = array(
            'razorpay_order_id' => $razorpay_order_id,
            'razorpay_payment_id' => $razorpay_payment_id,
            'razorpay_signature' => $razorpay_signature,
        );
        //dd($attributes);
        try{

            //$api->payment->fetch($razorpay_payment_id)->capture(array('amount' => 1000)); // Replace 1000 with your actual amount

            $res= $api->utility->verifyPaymentSignature($attributes);
            
            $order = Order::where('razorpayId',$razorpay_order_id)->get();

            foreach ($order as $record) {
                $record->update([
                    'status' => 1,
                    'payment_id' =>$razorpay_payment_id    
                ]);
            }
        
                //dd($res);
                //     $pdfService = new PdfService();
                //     //dd($data['email']);
                //     $pdfContent = $pdfService->generatePdfFromView('emails.order', $data);
                //     //Send email with PDF attachment
                //     $pdfFileName = 'order.pdf';
            
                //     $email = $data['email'];
                //     Mail::send([], [], function ($message) use ($pdfContent, $pdfFileName,$email) {
                //         $message->to($email)
                //             ->subject('Order Confirmation')
                //             ->attachData($pdfContent, $pdfFileName, ['mime' => 'application/pdf']);
                //     });

                $request->session()->forget('cart');
            // Payment is successful, you can update your database here or perform any other actions.
        } catch (\Exception $e) {
            
            // Payment failed, handle the failure here.
            //return view('payment.failed');
            dd($e->getMessage());
        }

        return redirect()->route('confirmation'); 
}
 





}
