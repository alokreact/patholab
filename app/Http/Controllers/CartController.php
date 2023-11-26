<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lab;
use App\Models\SubTest;
use App\Models\Cart;
use App\Models\Package;
use App\Service\CartService;
use App\Models\CartItem;
use Auth;
//use Gloudemans\Shoppingcart\Facades\Cart;

use Symfony\Component\HttpFoundation\Response;

class CartController extends Controller{

    function itemExistsInCart($itemId, &$cart){
        foreach($cart as $item) {

            //dd($item['id']);

            if ($item['lab_id'] === $itemId) {
                return true;
            }
        }
        return false;
    }

    function packageExistsInCart($itemId, &$cart)
    {
        foreach ($cart as &$item) {
            if ($item['id'] == $itemId) {
                return true;
            }
        }
        return false;
    }

   

    public function addPackage(Request $request){       
        if(\Cart::count() > 0){

            $carts = \Cart::content();

            $type = CartService::getType($carts);
            //dd($type);

            if(in_array('test',$type->toArray())){
                \Cart::destroy();
            }
        }
        $productId = $request->input('productId');
        $product = Package::findOrFail($productId);
    
        //dd($product);
        \Cart::setGlobalTax(0);
        \Cart::add(['id' => $product->lab_name, 'name' => $product->package_name, 
                    'qty' => 1, 
                    'price' => $product->price,
                    'weight' =>0, 
                    'taxRate'=>0,
                    'options' => ['product_id' => $productId,'type'=>'package']
                  ]);

        $cart = \Cart::count();
        //dd($cart);
        return response()->json(['cart'=>$cart,'message' =>'Succesfully Added'], Response::HTTP_OK);
       //return response()->json(['status' => 200, 'message' =>'Succesfully Added'], Response::HTTP_OK);
    }

    public function cart(){
        $user = Auth::user();        
        if($user && Auth::user()->role == '2'){
            $carts =[];
            $carts = \Cart::content();
            $product_names =[];
            if(\Cart::count() > 0){
                $type = CartService::getType($carts);
                //dd($type);
                if($type[0] === 'package'){
                    $product_id = $carts->pluck('options')->pluck('product_id');
                    $products = Package::find($product_id);    
                    //dd($product_id);
                    return view('Front-end.Packagecart.index',compact('carts','products'));
                }
                $product_id=$carts->pluck('options')[0]['product_id'];
                $products = SubTest::find($product_id);
                $product_names = $products->pluck('sub_test_name');
            }
            return view('Front-end.Cart.index',compact('carts','product_names'));
        } 
        else {
            return redirect()->route('signin');
        }
    }

    public function remove_product(Request $request){
        //dd($request->all());
        $productId = $request->input('id');    
        //dd($productId);
        //Check if the product is already in the cart
        $cartItem = \Cart::search(function ($cartItem, $rowId) use ($productId) {
                return $cartItem->id == $productId;
        })->first();
        //dd($cartItem);
        if($cartItem){
            \Cart::remove($cartItem->rowId);
        }
        session()->flash('success', 'Product successfully removed!');   
    }
    public function update_product(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }

    public function addToCart(Request $request){
        \Cart::destroy();
        $productId = $request->input('productId');
        $productId_arr = explode(',',$productId);
       
        $single_price = $request->input('singleprice');
        $product = SubTest::find($productId_arr);
        $labId = $request->input('labId');
        $price = $request->input('price');
        $lab = Lab::find($labId);

        \Cart::setGlobalTax(0);

        \Cart::add( ['id' => $labId, 
                    'name' => $lab->lab_name, 
                    'qty' => 1, 'price' => $price, 
                    'weight' =>2, 
                    'options' => ['product_id' => $productId_arr,
                                  'single_price'=>explode(',',$single_price),
                                  'type'=>'test']
                    ]
                );

        $cart = \Cart::count();
        return response()->json(['cart'=>$cart,'message' =>'Succesfully Added'], Response::HTTP_OK);
    }

    public function applyCoupon(Request $request){

        
        $cartItems = \Cart::content();
        $type = CartService::getType($cartItems);
        
        if($type[0] === 'package'){
            $totalWithoutDiscount = \Cart::total();
                $cleanedString = str_replace(',', '', $totalWithoutDiscount);
                $discountPercentage = 10;
                //$discountAmount = ($discountPercentage / 100)* intval($cleanedString);
                //dd($discountAmount);

                foreach($cartItems as $item){
                    
                    $discountAmount =  ($discountPercentage / 100)* intval($item->price);
                    $newPrice = intval($item->price) - intval($discountAmount);        
                    
                    \Cart::update($item->rowId, [
                        'price' => $newPrice,
                    ]);
                }
                $cartItems = \Cart::content();
                $finalTotal = \Cart::total();
                return response()->json(['total'=> $finalTotal], 200);
        }
        else{
        
            $totalWithoutDiscount = \Cart::total();
            $cleanedString = str_replace(',', '', $totalWithoutDiscount);
            $discountPercentage = 10;
    
            foreach($cartItems as $item){
                    
                $discountAmount =  ($discountPercentage / 100)* intval($item->price);
                $newPrice = intval($item->price) - intval($discountAmount);        
                
                \Cart::update($item->rowId, [
                    'price' => $newPrice,
                ]);
            }
            $cartItems = \Cart::content();
            $finalTotal = \Cart::total();
            return response()->json(['total'=> $finalTotal], 200);
            //dd($totalWithoutDiscount);

        }
        

        //dd($finalTotal);
       
    }
}
