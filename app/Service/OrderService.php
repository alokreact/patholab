<?php
namespace App\Service;
use App\Models\Order;
use App\Models\Cart;
use App\Models\OrderItem;
use App\Models\Patient;
use App\Service\CartService;
use Auth;

class  OrderService{

    public static function save_order($data){

        //dd($data);
        $recieptId = mt_rand(10000, 99999);
        $items =  CartService::get_cart_items();
        $order = new Order;
        $order->user_id=Auth::user()->id;
        $order->status= 2;
        $order->pay_option= $data['pay_option'];
        $order->recieptId = $recieptId;
        $order->currency = 'INR';
        $order->user_name = $data['name'];
        $order->user_email = $data['email'];
        $order->user_phone = $data['phone'];
        $order->user_address = $data['address'];
        $order->description = 'New Test Booking';
        $order->order_date= $data['slot_day'];
        $order->collection_time=$data['slot_time'];
        $order->total= $data['total'];
        $order->razorpayId = $order->pay_option === '1'?$data['razorpayId']:'';
        $order->save();


        if($order->id){ 
            //dd($items);
            foreach($items as $item) { 
                $item_id = explode(',',$item['id']);
                $single_price = $item['type'] === 'package'? '':explode(',',$item['singleprice']);
                //dd($item_id);

                foreach($item_id as $key=>$product_id){
                    $order_item = new OrderItem;
                    $order_item->user_id=Auth::user()->id;
                    $order_item->product_id= trim($product_id);
                    $order_item->order_id= $order->id;
                    $order_item->price= $item['type'] === 'package'?$item['price']:$single_price[$key];
                    $order_item->qty= $item['quantity'];
                    $order_item->lab_id= $item['lab_name'];
                    $order_item->type= $item['type'];
                    $order_item->patient_id= implode(',' , $data['patient']);
                    $order_item->save();
                    }
                }        
        }

        return $order->id;


    }
    
}

