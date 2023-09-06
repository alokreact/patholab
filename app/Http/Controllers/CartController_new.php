<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Gate;
use App\Models\SubTest;

class CartController_new extends Controller
{
    public function cart(){

        if(request('dataType') === 'package'){
            $existing = collect(session('cart'))->first(function ($row, $key) {
                return $row['package_id'] == request('productId');
            });
        }
        else{
            $existing = collect(session('cart'))->first(function ($row, $key) {
                return $row['test_id'] == request('productId');
            });
        }


        if(!$existing){
            //echo "hi";die;           
          if(request('dataType') === 'package'){

            session()->push('cart', [
                'package_id' => request('productId'),
                'qty' => 1,
                'type'=>request('dataType'),
                'test_id'=>0
            ]);
          }
          else{
            session()->push('cart', [
                'test_id' => request('productId'),
                'qty' => 1,
                'type'=>request('dataType'),
                'package_id'=>0
            ]);
          }
                     
            return response()->json(['status'=>200,'data'=>'successful'], Response::HTTP_OK);
        }

        return response()->json(['status'=>200,'data'=>'Already this test is added with different Lab'], Response::HTTP_OK);
   
    }

    public function index(){        
        if(!Gate::allows('isUser')){
            return redirect()->route('signin')->with('error','Please login to Continue!');
        }
        echo "<pre>";
        print_r(session('cart'));die;
        \DB::enableQueryLog();

        $cart_items =[];
        $cart_test_items =[];

       foreach((array)session('cart') as $items){
            if($items['type'] === 'test'){

                $tests = SubTest::with('getLab')->whereIn('id', collect(session('cart'))->pluck('test_id'))->get();
                //dd($tests);
                 $filter_items= array_filter((array)(session('cart')),function ($var) {
                        return ($var['type'] === 'test');
                     });
                     //dd($filter_items);

                $cart_test_items = collect(array_values($filter_items))->map(function ($row, $index) use ($tests) {
                    
                    return [
                        'id' => $row['test_id'],
                        'qty' => $row['qty'],
                        'name' => $tests[$index]->sub_test_name,
                        'lab_name' => $tests[$index]->getLab[$index]->lab_name,
                        "price" => $tests[$index]->getLab[$index]->pivot->price,
                    ];
                })->toArray();
            }
            else{
                $packages = Package::with('getLab')->whereIn('id', collect(session('cart'))->pluck('package_id'))->get();
                $filterBy = 'package';
                $filter_package_items= array_filter((array)(session('cart')),function ($var) use ($filterBy) {
                    return ($var['type'] === $filterBy);

                });
              
                 //dd(array_values($filter_package_items));

//                dd($packages);
                $cart_items = collect(array_values($filter_package_items))->map(function ($row, $index) use ($packages) {
                    // echo "<pre>";
                    // print_r($row);
                    // echo $index;
   
                    return [
                        'id' => $row['package_id'],
                        'qty' => $row['qty'],
                        'name' => $packages[$index]->package_name,
                        'lab_name' => $packages[$index]->getLab->lab_name,
                        "price" => $packages[$index]->price,
                    ];
                })->toArray();
            }
        }   
        //dd(\DB::getQueryLog());
        //dd($cart_test_items);
        //dd($cart_items);
    return view('Front-end.Cart.cart', compact('cart_items','cart_test_items'));
}

public function deleteSessionData(Request $request){
    $request->session()->forget('cart');
    $request->session()->forget('selectedProducts');   
    echo "Data has been removed from session.";
}

}
