<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Lab;

use App\Models\Organ;
use App\Models\SubTest;
use App\Models\Package;
use App\Models\Category;
use App\Models\GroupTest;
use App\Models\Slider;
use App\Service\CartService;
use PhpParser\Node\Stmt\GroupUse;
use Session;
use App\Models\Cart;

use Symfony\Component\HttpFoundation\Response;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $labs = Lab::orderBy('created_at', 'desc')->get();
        $organs = Organ::take(12)->get();    
        $banners = Slider::all();
        $subtest = GroupTest::with('subtest')->find(8);

        $packages = Package::with('grouptest.subtest')->withCount("grouptest")->get();
        
        foreach ($packages as $package) {
            foreach ($package->grouptest as $grouptest) {
                $subtest = GroupTest::withCount('subtest')->find($grouptest->pivot->parent_test_id);
            }
        }
        $cartCount = 1;

        \View::share('cartCount', $cartCount);
        $categories = Category::with('package')->inRandomOrder()->take(6)->get();
        return view('Front-end.Home', compact('labs', 'organs', 'packages', 'categories','banners','cartCount'));
    }


    public function getlistofajaxSubtest(Request $request){
        if ($request->input('query')!== null) {
            //echo "hi";die;
            $subtests = SubTest::where('sub_test_name', 'like', '%' . $request->input('query') . '%')->status()->get();
        } 
        else{
            $subtests =  $subtests = Subtest::where('status', 1)->get();
        }
        return  response()->json($subtests, 200);
    }

    public function searchsubtest(Request $request){  

        if($request->input('subtest') !== null) {    
            
            \Cart::destroy();
            
            $submittedValue = $request->input('subtest');
            $previousValues = Session::get('selectedProducts', []);
    
            if(!empty($submittedValue)) {
                if(!in_array($submittedValue, $previousValues)) {
                    $previousValues[] = $submittedValue;
                }
            }
            $labs = collect();
            $labs = SubTest::with('getLab')->find($previousValues);

            //dd($labs);
            $combinedResults = [];            
            foreach ($labs as $test) {
                foreach ($test->getLab as $lab) {

                    $labName = $lab->lab_name;
                    $labId = $lab->id;
                    $price = $lab->pivot->price; // You might need to adjust this based on your data structure
            
                    if (!array_key_exists($labName, $combinedResults)) {
                        $combinedResults[$labName] = [
                            'id'=>$test->id,
                            'lab_name' => $labName,
                            'lab_id'=>$labId,
                            'total_price' => $price,
                            'city'=>$lab->city,
                            'test_names' => $test->sub_test_name,
                            'image'=>$lab->image,
                            'single_price'=>  $lab->pivot->price                    
                        ];
                    } else {
                        $combinedResults[$labName]['id'] .= ', ' . $test->id;
                        $combinedResults[$labName]['test_names'] .= ', ' . $test->sub_test_name;
                        $combinedResults[$labName]['total_price'] += $price;
                        $combinedResults[$labName]['single_price'].=', '.$lab->pivot->price;
                    }
                }
            }    
            $test=[];
            foreach($combinedResults as $key=> $item){
              //  print_r($item['test_names']);
                $test[] = explode(',' ,$item['test_names']);             
            }
            
            $organs = Organ::take(12)->get();
            $categories = Category::take(12)->get();
            Session::put('selectedProducts', $previousValues);
           // dd($combinedResults);

            $responseData =['data' =>$submittedValue,'redirectTo'=>'/search-result'];
            //$html = view('Front-end.Search.removesearch', compact('labs','organs','combinedResults','categories'))->render();
  
            //return response()->json(['html' => $html]);  
            return response()->json($responseData,200);
             
            //return  view('Front-end.Search.index', compact('labs','combinedResults','organs','categories')); 
        }
        else {
                # code...
            abort(404);
        }
    }

    public function removeSelectedTest(Request $request){
        $selectedValues = $request->input('selectedValues');
        $previousValues = Session::get('selectedProducts', []); 
        //dd($previousValues);
        //Add the new value to the array of previously selected values
        $previousValues = collect($previousValues)->reject(function ($item) use ($selectedValues) {
            return $item === $selectedValues;
        })->toArray();

        //dd($previousValues);      
        $labs = collect();
        $labs = SubTest::with('getLab')->find($previousValues);
        $organs = Organ::take(12)->get();
        $categories = Category::take(12)->get();
        //dd($labs);
        Session::forget('selectedProducts');

        Session::put('selectedProducts', $previousValues);
        $combinedResults = [];
    
        foreach ($labs as $test) {
            foreach ($test->getLab as $lab) {
                $labName = $lab->lab_name;
                $price = $lab->pivot->price; // You might need to adjust this based on your data structure
                if (!array_key_exists($labName, $combinedResults)) {
                    $combinedResults[$labName] = [
                        'id'=>$test->id,
                        'lab_name' => $labName,
                        'total_price' => $price,
                        'city'=>$lab->city,
                        'test_names' => $test->sub_test_name,
                        'image'=>$lab->image                
                    ];
                } else {
                    $combinedResults[$labName]['test_names'] .= ', ' . $test->sub_test_name;
                    $combinedResults[$labName]['total_price'] += $price;
                }
            }
        }
        $cart = session()->get('cart',[]);
        $cart = \Session::forget('cart');
        $html = view('Front-end.Search.removesearch', compact('labs','organs','combinedResults','categories'))->render();
        return response()->json(['html' => $html]);
    }

    public function package($id){
        $all_labs = Lab::all();
        $package = Package::with('getLab', 'grouptest.subtest')->find($id)->toArray();
        $cart = session()->get('cart', []);

        $breadcrumbs = [
            ['label' => 'Home', 'url' => route('home')],
            ['label' => 'Package'],
            ['label' =>  $package['package_name']],  
        ];
        
        //$package_id = collect($cart->pluck('package_name')->toArray());
        //dd($package_id);
        return view('Front-end.Package.index', compact('package',  'all_labs', 'cart','breadcrumbs'));
    }

    public function  get_all_category(){
        $all_categories = Category::paginate(12);
        //dd($categories);
        $organs = Organ::take(12)->get();
        $categories = Category::take(12)->get();

        $breadcrumbs = [
            ['label' => 'Home', 'url' => route('home')],
            ['label' => 'Package'],
        ];
       
        return view('Front-end.Category.list', compact('all_categories','organs','categories','breadcrumbs')); 
    }

    public function  get_package_from_category($id){
        $packages = Package::with('getLab')->where('category', $id)->get();
        //dd($packages);
        $category = Category::with('package')->find($id)->toArray();
        //dd($category);
        $organs = Organ::take(12)->get();
        $categories = Category::take(12)->get();
        return view('Front-end.Category.packages', compact('packages', 'category','organs','categories'));
    
    }


    public function about(){        
        return view('Front-end.About.index');
    }


    public function getMultipleSearchTest(Request $request){   
        $test_id = $request->input('checkBoxValue');
        $tests = SubTest::with('getLab')->find($test_id);
      
        $test_names = $tests->pluck('sub_test_name')->flatten();
        $test_ids = $tests->pluck('id')->toArray();
        //dd($test_names);
       
        $search_test_data = [];
        foreach($test_names as $index=>$name){
                $search_test_data['name'][]= $name;
                $search_test_data['id'][]= $test_ids[$index];

        }
        //dd($search_test_data);
        $labs = $tests->pluck('getLab')->flatten();
        
        $combinedResults =[];

        foreach ($labs as $lab) {
            $labName = $lab->lab_name;
            $labId = $lab->id;
            $price = $lab->pivot->price; // You might need to adjust this based on your data structur

            if (!array_key_exists($labName, $combinedResults)) {
                $combinedResults[$labName] = [
                    'lab_name' => $labName,
                    'lab_id'=>$labId,
                    'total_price' => $price,
                    'city'=>$lab->city,
                    'image'=>$lab->image,
                    'single_price'=>  $lab->pivot->price,
                    'test_names'=>$test_names,
                    'test_ids'=>$test_ids                   
                ];
            } else {
                $combinedResults[$labName]['total_price'] += $price;
                $combinedResults[$labName]['single_price'].=', '.$lab->pivot->price;
            }
        }
        //dd($combinedResults);
        return response()->json(['tests'=>$combinedResults,'searchTerms'=>$search_test_data],Response::HTTP_OK);
    }

    public function removeSearchTest(Request $request){
       // dd($request->input('testArr'));
        $dataArr = $request->input('dataArray');
        $test_id =[];
        foreach($dataArr as $index=>$value){
                $test_id[] = $dataArr[$index]['id'];
        }
        //dd($arr);
        $tests = SubTest::with('getLab')->find($test_id);
        
        $test_names = $tests->pluck('sub_test_name')->flatten();
        $test_ids = $tests->pluck('id')->toArray();
       
        $search_test_data = [];
        foreach($test_names as $index=>$name){
                $search_test_data['name'][]= $name;
                $search_test_data['id'][]= $test_ids[$index];

        }
        //dd($search_test_data);
        $labs = $tests->pluck('getLab')->flatten();
        $combinedResults =[];

        foreach ($labs as $lab) {
            $labName = $lab->lab_name;
            $labId = $lab->id;
            $price = $lab->pivot->price; // You might need to adjust this based on your data structur

            if (!array_key_exists($labName, $combinedResults)) {
                $combinedResults[$labName] = [
                    'lab_name' => $labName,
                    'lab_id'=>$labId,
                    'total_price' => $price,
                    'city'=>$lab->city,
                    'image'=>$lab->image,
                    'single_price'=>  $lab->pivot->price,
                    'test_names'=>$test_names,
                    'test_ids'=>$test_ids                    
                ];
            } else {

                $combinedResults[$labName]['total_price'] += $price;
                $combinedResults[$labName]['single_price'].=', '.$lab->pivot->price;
            }
        }
        //dd($combinedResults);
        return response()->json(['tests'=>$combinedResults,'searchTerms'=>$search_test_data],Response::HTTP_OK);
    }

    public function searchResult(Request $request){

        $breadcrumbs = [
            ['label' => 'Home', 'url' => route('home')],
            ['label' => 'Search Result'],
        ];

        $organs = Organ::take(12)->get();
        $categories = Category::take(12)->get();
        return view('Front-end.Search.search-result',compact('organs','categories','breadcrumbs'));
    }
    public function searchTest(Request $request){
        //dd($request->all());
        $test_id = $request->input('test_id');
        $tests = SubTest::with('getLab')->find($test_id);
        $labs = $tests->pluck('getLab')->flatten();
        $test_names = $tests->pluck('sub_test_name')->flatten();
        $test_ids = $tests->pluck('id')->toArray();
        
        $search_test_data = [];
        foreach($test_names as $index=>$name){
                $search_test_data['name'][]= $name;
                $search_test_data['id'][]= $test_ids[$index];

        }
        //dd($search_test_data);
        $combinedResults =[];

        foreach ($labs as $lab) {
            $labName = $lab->lab_name;
            $labId = $lab->id;
            $price = $lab->pivot->price; // You might need to adjust this based on your data structur

            if (!array_key_exists($labName, $combinedResults)) {
                $combinedResults[$labName] = [
                    'lab_name' => $labName,
                    'lab_id'=>$labId,
                    'total_price' => $price,
                    'city'=>$lab->city,
                    'image'=>$lab->image,
                    'single_price'=>  $lab->pivot->price,
                    'test_names'=>$test_names,
                    'test_ids'=>$test_ids                   
                ];
            } else {
                $combinedResults[$labName]['total_price'] += $price;
                $combinedResults[$labName]['single_price'].=', '.$lab->pivot->price;
            }
        }
        //dd($combinedResults);
        return response()->json(['tests'=>$combinedResults,'searchTerms'=>$search_test_data],Response::HTTP_OK);
    }

    public function removeTests(Request $request){
        // dd($request->input('testArr'));
         $test_id = $request->input('dataArray');
         
         $tests = SubTest::with('getLab')->find($test_id);
         
         $test_names = $tests->pluck('sub_test_name')->flatten();
         $test_ids = $tests->pluck('id')->toArray();
        
         $search_test_data = [];
         foreach($test_names as $index=>$name){
                 $search_test_data['name'][]= $name;
                 $search_test_data['id'][]= $test_ids[$index];
 
         }
         //dd($search_test_data);
         $labs = $tests->pluck('getLab')->flatten();
         $combinedResults =[];
 
         foreach ($labs as $lab) {
             $labName = $lab->lab_name;
             $labId = $lab->id;
             $price = $lab->pivot->price; // You might need to adjust this based on your data structur
 
             if (!array_key_exists($labName, $combinedResults)) {
                 $combinedResults[$labName] = [
                     'lab_name' => $labName,
                     'lab_id'=>$labId,
                     'total_price' => $price,
                     'city'=>$lab->city,
                     'image'=>$lab->image,
                     'single_price'=>  $lab->pivot->price,
                     'test_names'=>$test_names,
                     'test_ids'=>$test_ids                    
                 ];
             } else {
 
                 $combinedResults[$labName]['total_price'] += $price;
                 $combinedResults[$labName]['single_price'].=', '.$lab->pivot->price;
             }
         }
         //dd($combinedResults);
         return response()->json(['tests'=>$combinedResults,'searchTerms'=>$search_test_data],Response::HTTP_OK);
    }

    public function coupon(){
        
        return view('Front-end.Coupon.index');
    }
 




}
