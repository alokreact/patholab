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

    public function addProduct(Request $request){
        
        $productId = $request->input('productId');
        $productId_arr = explode(',',$productId);
        $single_price = $request->input('singleprice');
        $product = SubTest::find($productId_arr);
        $labName = $request->input('labId');
      
        $price = $request->input('price');
        $cart = session()->get('cart',[]);
        $cart = \Session::forget('cart');

            //Item doesn't exist in the cart, add it as a new item
            $cart[] = [
                'id' => $productId,
                'lab_name' => $labName,
                'price' => $price,
                'quantity' => 1,
                'name'=>$product->pluck('sub_test_name')->toArray(), 
                'type'=>'test',
                'singleprice'=>$single_price

            ];
        //Add the cart item to the 'cart' session
        \Session::put('cart', $cart);
         $items =  CartService::get_cart_items();
        
         $user = Auth::user();
            
         $cart = ['count'=>count($items)];
        
         return response()->json(['cart' =>$cart, 'message' =>'Succesfully Added'], Response::HTTP_OK);
    }

    public function addPackage(Request $request){
       
        $productId = $request->input('productId');
        $product = Package::findOrFail($productId);
        $labName = $request->input('labId');
        $price = $request->input('price');
        
        \Cart::add(['id' => $productId, 'name' => $product->getLab->lab_name, 
                    'qty' => 1, 
                    'price' => $product->price,
                    'weight' =>2, 
                    'options' => ['product_id' => $productId,'type'=>'package']
                  ]);


        return response()->json(['status' => 200, 'message' =>'Succesfully Added'], Response::HTTP_OK);
    }

    public function cart(){

        $user = Auth::user();        
        if($user && Auth::user()->role == '2') {
            $carts =[];
            $carts = \Cart::content();
            $product_names =[];
            if( \Cart::count() > 0){

                $type = CartService::getType($carts);
                //dd($type);
                if($type[0] === 'package'){
                    $product_id=$carts->pluck('options')[0]['product_id'];
                    $products = Package::find($product_id);
                   //dd($products);
                    return view('Front-end.PackageCart.index',compact('carts','products'));
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

    public function remove_product(Request $request)
    {
       // if ($request->id) {
            $cart = session()->get('cart');
         
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product successfully removed!');
        
            //$rowId = 'da39a3ee5e6b4b0d3255bfef95601890afd80709';

            //Cart::remove($rowId);
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

       
        \Cart::add(['id' => $labId, 'name' => $lab->lab_name, 
        'qty' => 1, 'price' => $price, 'weight' =>2, 
        'options' => ['product_id' => $productId_arr,'single_price'=>explode(',',$single_price),'type'=>'test']]);

        $cart = \Cart::count();
        return response()->json(['cart'=>$cart,'message' =>'Succesfully Added'], Response::HTTP_OK);
    }


}
