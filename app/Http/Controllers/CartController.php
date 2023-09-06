<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lab;
use App\Models\SubTest;
use App\Models\Cart;
use App\Models\Package;
use Auth;

use Symfony\Component\HttpFoundation\Response;

class CartController extends Controller
{

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
        //dd($request->all());
        $productId = $request->input('productId');
        $productId_arr = explode(',',$productId);
       // dd($productId_arr);
       $single_price = $request->input('singleprice');
        $product = SubTest::find($productId_arr);
        //dd($product->pluck('sub_test_name'));   
        $labName = $request->input('labId');
        $price = $request->input('price');
        $cart = session()->get('cart',[]);
        
        $cart = \Session::forget('cart');
      
            // Item doesn't exist in the cart, add it as a new item
            $cart[] = [
                'id' => $productId,
                'lab_name' => $labName,
                'price' => $price,
                'quantity' => 1,
                'name'=>$product->pluck('sub_test_name')->toArray(), 
                'type'=>'test',
                'singleprice'=>$single_price

            ];

        
        // Add the cart item to the 'cart' session
        \Session::put('cart', $cart);
       
        //dd($cart);
       
        return response()->json(['status' => 200, 'message' =>'Succesfully Added'], Response::HTTP_OK);
    }

    public function addPackage(Request $request){
        $productId = $request->input('productId');
        $product = Package::findOrFail($productId);
        $labName = $request->input('labId');
        $price = $request->input('price');
        $cart = session()->get('cart', []);
       // dd($product->sub_test_name);
       
        if ($this->packageExistsInCart($productId, $cart)) {
            // Item exists in the cart
            return response()->json(['status' => 200, 'message' => 'This package is already added with Lab'], Response::HTTP_OK);
        } else {
            // Item doesn't exist in the cart, add it as a new item
            $cart[] = [
                'id' => $productId,
                'lab_name' => $product->getLab->lab_name,
                'price' => $product->price,
                'quantity' => 1,
                'name'=>$product->package_name,
                'type'=>'package'
            ];
        }
        // Add the cart item to the 'cart' session
        \Session::put('cart', $cart);
        return response()->json(['status' => 200, 'message' =>'Succesfully Added'], Response::HTTP_OK);
    }



    public function cart()
    {
        $user = Auth::user();
        if ($user && Auth::user()->role == '2') {

            return view('Front-end.Cart.index');
        } else {

            return redirect()->route('signin');
        }
    }

    public function remove_product(Request $request)
    {
        //dd($request->id);
        //$cart = session()->get('cart');
        //dd($cart);
 
       // if ($request->id) {
            $cart = session()->get('cart');
         
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product successfully removed!');
        //}
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

    public function add_to_cart(Request $request)
    {
        //dd($request->productId);
        $type = $request->dataType;

        if ($type === 'package') {

            $package = Package::find($request->productId);

            $cart = session()->get('cart', []);
            $cart['package-' . $package->id] = [
                "name" =>  $package->package_name,
                "price" => $package->price,
                "lab_name" => $package->getLab->lab_name,
                "quantity" => 1,
                "type" => 'package',
                "id" => $package->id
            ];
            session()->put('cart', $cart);
            // $cart = new Cart;
            // $cart->product_id = $package->id;
            // $cart->product_name = $package->name;
            // $cart->amount = $package->price;
            // $cart->qty = 1;

            // $cart->save();
            return response()->json(['status' => 200, 'data' => $cart], Response::HTTP_OK);
        } else if ($type = "test") {

            $test = SubTest::with('getLab')->find($request->productId);
            $lab = Lab::find($request->labId);
            //dd($lab->subtest[]);

            $cart = session()->get('cart', []);

            $cart['test-' . $test->id] = [
                "name" =>  $test->sub_test_name,
                "price" => $request->price,
                "lab_name" => $lab->lab_name,
                "quantity" => 1,
                "type" => 'test',
                "id" => $test->id
            ];
            session()->put('cart', $cart);
            return response()->json(['status' => 200, 'data' => $cart], Response::HTTP_OK);
        } else {
            return response()->json(['message' => 'Product Not Found.'], Response::HTTP_NOT_FOUND);
        }
    }
}
