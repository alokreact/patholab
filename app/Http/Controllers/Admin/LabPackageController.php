<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\SubTest;

use App\Models\Lab;
use Illuminate\Support\Facades\Gate;

class LabPackageController extends Controller{

    public function index(){

        if(!Gate::allows('isAdmin')){
            abort(403);
        }

        $labs = Lab::all();
        return view('Admin.Labpackage.list',compact('labs'));
    }

    public function store(Request $request){
//dd($request->all());

        $price = collect($request->input('price',[]))
                        ->map(function($subtests){
                            return ['price'=>$subtests];
                    });
        //dd($price);
     
                    $lab = Lab::find($request->input('lab_id'));
        
        $lab->subtest()->sync($price);

        return redirect()->route('labpackage.index')->with('message','Added succesfully');               
    }

    public function create(){
        $labs = Lab::all();
        $subtests = SubTest::all();
        return view('Admin.Labpackage.index',compact('subtests','labs'));
    }

    public function edit($id){
        $selected_lab = Lab::with('subtest')->find($id);
        $subtests = SubTest::all();
        $labs = Lab::all();
        $selectedValues = collect($selected_lab->subtest()->pluck('sub_test_id')->toArray());
       // dd($selected_lab);
        return view('Admin.Labpackage.edit',compact('subtests','labs','selected_lab','selectedValues'));
    }

    public function update(Request $request, $id){
        //dd($request->all());
        $price = collect($request->input('price',[]))
                     ->map(function($subtests){
                    return ['price' => $subtests];
                });
            
            $lab = Lab::with('subtest')->find($id);
            //dd($lab->subtest->id);
            $lab->subtest()->sync($price, false);
            //$lab->subtest()->updateExistingPivot([$lab->id =>['price'=> $request->input('price',[])]], false);;
            return redirect()->back()->with('message','Updated succesfully');         
    }

    public function getSubtestprice(Request $request){
        //dd($request->id);
        $subtest = SubTest::find($request->id);
        return response()->json(['price'=> $subtest->price]);

    }


}
