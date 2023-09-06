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

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $labs = Lab::orderBy('created_at', 'desc')->get();
        $organs = Organ::take(12)->get();
        $packages = Package::with('grouptest.subtest')->withCount("grouptest")->get();

        //dd($packages);

        $banners = Slider::all();
        //dd($banners);
        $subtest = GroupTest::with('subtest')->find(8);
        //dd($subtest);
        $commentsCount = [];

        foreach ($packages as $package) {
            foreach ($package->grouptest as $grouptest) {
                //dd($grouptest->pivot->parent_test_id);
                $subtest = GroupTest::withCount('subtest')->find($grouptest->pivot->parent_test_id);
                //$subtes = GroupTest::with('subtest')->find($subtest->parent_test_id);
                //dd($subtest);
            }
        }
        //print_r($commentsCount);die;
        // echo $subtest_count->subtest_count;
        $categories = Category::with('package')->inRandomOrder()->take(6)->get();
        return view('Front-end.Home', compact('labs', 'organs', 'packages', 'categories','banners'));
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
            
      
            $submittedValue = $request->input('subtest');
            $previousValues = Session::get('selectedProducts', []);
            if(!empty($submittedValue)) {
                if(!in_array($submittedValue, $previousValues)) {
                    $previousValues[] = $submittedValue;
                }
            }
            //Store the updated values back to the session
            //dd($previousValues);
            // if(count($previousValues) >1){
                
            //     $cart = \Session::forget('cart');
            // }
            $labs = collect();
            $labs = SubTest::with('getLab')->find($previousValues);

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
            //dd($combinedResults);
            $organs = Organ::take(12)->get();
            $categories = Category::take(12)->get();
            //dd($labs);
            Session::put('selectedProducts', $previousValues);
            //return  view('Front-end.Labs.index', compact('labs')); 
            return  view('Front-end.Search.index', compact('labs','combinedResults','organs','categories')); 
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
        $html = view('Front-end.Search.removesearch', compact('labs','organs','combinedResults','categories'))->render();
        return response()->json(['html' => $html]);
    }

    public function package($id){

        $all_labs = Lab::all();
        $package = Package::with('getLab', 'grouptest.subtest')->find($id)->toArray();
        // $parent_tests = $package->parenttest()->get()->toArray();
        // $subtests = $parent_tests->subtest()->get();
        //dd($subtests);
        //$values = new \Illuminate\Support\Collection(explode(",", $package->parent_test_id));
        // $parent_tests = \DB::table('parent_tests')

        //     ->select('parent_tests.parent_test_name as parent_name', 'parent_tests.id as id', 'parent_tests.sub_tests as parent_sub_tests')
        //     ->whereIn('parent_tests.id', $values)
        //     ->get()->toArray();

        $cart = session()->get('cart', []);
        //$package_id = collect($cart->pluck('package_name')->toArray());
        //dd($package_id);
        return view('Front-end.Package.index', compact('package',  'all_labs', 'cart'));
    }

    public function  get_all_category(){
        $all_categories = Category::all();
        //dd($categories);
        $organs = Organ::take(12)->get();
        $categories = Category::take(12)->get();
        return view('Front-end.Category.list', compact('all_categories','organs','categories')); 
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
}
