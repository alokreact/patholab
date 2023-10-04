<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\Models\OrderItem;
Use App\Models\SubTest;
use Mail;
use App\Service\PdfService;
use App\Models\Report;

use App\Mail\OrderEmail;
use App\Models\Order;

class ProfileController extends Controller{

    public $carts;

    public function __construct(){

        $this->carts= [];

    }
    public function index(){
         $user = Auth::User();    
         if($user){
            $carts =[];

            $order_items = Order::where('user_id',$user->id)->get();
            //$reports =Report::where('user_id',$user->id)->get();
            //dd($order_items);
            return view('Front-end.Profile.booking',compact('order_items','carts'));
         }
         else{
             abort('404');
         }
    }

    public function check(){

        return view('Front-end.Checkout.newcheckout');
    }

    public function emailTemplate(){

        $data= [
            'date'=>now(),
            'order_id'=>'123456',
            'name'=>'John Doe',
            'email'=>'john@gmail.com',
            'phone'=>'9976543132',
            'tests' =>[
                'test_name'=> 'AAROGYAM XL',
                'price'=>'1200',
                'qty'=>'1',
            ],
        ];
        // $tests =[
        //         'test_name'=> 'AAROGYAM XL',
        //         'price'=>'1200',
        //         'qty'=>'1',
        // ];

        Mail::to('me.alokprasad54@gmail.com')->send(new OrderEmail($data));

        return view('Email.ordermail', compact('data'));
    }

    public function send_email(){

        $data= [
            'date'=>now(),
            'order_id'=>'123456',
            'name'=>'John Doe',
            'email'=>'john@gmail.com',
            'phone'=>'9976543132',
            'tests' =>[
                'test_name'=> 'AAROGYAM XL',
                'price'=>'1200',
                'qty'=>'1',
            ],
        ];

        $pdfService = new PdfService();
        $pdfContent = $pdfService->generatePdfFromView('emails.order', $data);
    
        //Send email with PDF attachment
        $pdfFileName = 'order.pdf';

        Mail::send([], [], function ($message) use ($pdfContent, $pdfFileName) {
            $message->to('me.alokprasad54@gmail.com')
                ->subject('Order Confirmation')
                ->attachData($pdfContent, $pdfFileName, ['mime' => 'application/pdf']);
        });

        return "Email sent with PDF attachment!";
    }
    public function product(){
        return view('Front-end.Profile.booking');
    }

    public function prescription(){
        $carts =[];
        return view('Front-end.Profile.tpl.prescription',compact('carts'));
    }

    public function address(){
        return view('Front-end.Profile.tpl.address');
    }

    public function patient(){
        return view('Front-end.Profile.tpl.patient');
    }
    public function coupon(){
        return view('Front-end.Profile.tpl.coupon');
    }

}
