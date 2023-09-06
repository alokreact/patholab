<?php
namespace App\Service;

use App\Models\Package;
use App\Models\SubTest;


class CartService{

    public static function get_cart_items(){

        $packages =[];
        $tests =[];

        $cart = session()->get('cart', []);
     
      
        // foreach((array)session('cart') as $items){

        //     if ($items['type'] === 'test'){
        //         $tests = SubTest::whereIn('id', collect(session('cart'))->pluck('test_id'))->get()->toArray();  
        //     }
        //     else{
        //         $packages = Package::whereIn('id',collect(session('cart'))->pluck('package_id'))->get()->toArray();
        //         foreach($packages as $key => $row){
        //             $packages[$key]['sub_test_name']="";
        //           }
        //     } 
        // }
        //dd($items);
        
        return $cart;

        //return $items;
    }

    public static function get_checkout_items( $items){
//dd($items);
       $checkout_items=  collect(session('cart'))->map(function (
            $row,
            $index
        ) use ($items) {
            $quantity = (int) $row['quantity'];
            $cost = (float) $items[$index]->price;
            $subtotal = $cost * $quantity;

             return [
                'id' => $row['id'],
                'qty' => $quantity,
                'name' => $items[$index]->name,
                'lab_name' => $items[$index]->lab_name,
                'cost' => $cost,
                'subtotal' => round($subtotal, 2),
            ];
        });

        return $checkout_items;
    }
}

?>