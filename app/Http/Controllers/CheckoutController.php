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
     private $razorpayId = "DLDiT3zaLoZI9ZsN27Yd7dJ0";
    private  $razorpayKey = "rzp_test_BqPPqd2H5aA49G";

    // private $razorpayId = "rzp_live_Sov1SDDvaLh47j";
    // private $razorpayKey = "rHIkpFOzmESeLw2IpNbhyI99";

    public function addPatient(Request $request)
    {
        $data = $request->all();
       //dd($request->all());

        $patient = new Patient();
        $patient->name = $request->input('name');
        $patient->age = $request->input('age');
        $patient->gender = $request->input('gender');
        $patient->user_id = Auth::user()->id;
        $patient->save();
        
 
        return response()->json(['status'=>'success','message' => 'Data saved successfully']);
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
            \DB::beginTransaction();
            $cart = session()->get('cart',[]);
            $items =  CartService::get_cart_items();
           
            //dd($checkout_items);
            foreach($items as $id => $details){

                $cart = new Cart;
                //$cart->product_id = $details['id'];
                $cart->user_id=Auth::user()->id;
                $cart->session_id=session()->getId();
                //$cart->product_name = $details['name'];
                $cart->amount = $details['price'];
                $cart->qty = 1;
                $cart->type = 'package';          
                $cart->save();       
            }
            \DB::commit();
            //return view('Front-end.Checkout.pay_option',compact('items'));
            $items =  CartService::get_cart_items();              
            $itemsCollection = new Collection($items);
            $total = $itemsCollection->sum('price');
            $patients = Patient::where('user_id','=',Auth::user()->id)->get();

            return view('Front-end.Checkout.newcheckout',\compact('total','items','patients'));
        }
        catch (Exception $e){
            \DB::rollback();
            return  response()->json(['data'=>[],'message'=>'Some Error, Please try again!'],400);
        }
    }
    public function save_pay_option(Request $request){
           // dd($request->get('pay_option'));
            if($request->get('pay_option') === "2"){
                $items =  CartService::get_cart_items();
                $itemsCollection = new Collection($items);
                $total = $itemsCollection->sum('price');
                $patients = Patient::where('user_id','=',Auth::user()->id)->get();
                //dd($patients);
                //return view('Front-end.Checkout.index');
                return view('Front-end.Checkout.newcheckout',\compact('total','items','patients'));

            }

            else{
                return view('Front-end.Checkout.razorpay');
            }
    }

    public function save_order(Request $request){

        $data = $request->all();
        //dd($request->all());
        if($data['pay_option'] === '2'){
            //dd($data);
            $recieptId = mt_rand(10000, 99999);
            $items =  CartService::get_cart_items();
            $itemsCollection = new Collection($items);
            $total = $itemsCollection->sum('price');
            $data['total'] = $total;
            $response = OrderService::save_order($data);
        
            $data['items'] = $items;
            $data['date'] = now();
            $data['order_id'] = $recieptId;
            
            if($response !== null) { 
              
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
            //dd($api);
            $order = [
                'receipt'         => 'order_'.$recieptId,
                'amount'          => $total * 1000, // 39900 rupees in paise
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

            return view('Front-end.cart.payment-page', compact('response'));
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
        try{

            //$api->payment->fetch($razorpay_payment_id)->capture(array('amount' => 1000)); // Replace 1000 with your actual amount

            $res= $api->utility->verifyPaymentSignature($attributes);
            
            $order = Order::find($razorpay_order_id);
            $order->status = 1;
            $order->save();
        
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
