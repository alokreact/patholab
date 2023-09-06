<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubTest;
use App\Models\Organ;
use DB;

class TestByOrganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $organs = Organ::all();
        $selectedValues = '';
        return view('Admin.TestByOrgan.list', compact( 'organs','selectedValues'));

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sub_tests = SubTest::all();
        $organs = Organ::all();
        $selectedValues= '';
        return view('Admin.TestByOrgan.create', compact('sub_tests', 'organs','selectedValues'));

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        try {
            DB::beginTransaction();  
                    
            //$organ = Organ::find($request->organ);
            $organ = Organ::where('id',$request->organ)->first();
            //dd($organ);
            $organ->subtest()->sync($request->input('sub_tests',[]));

            DB::commit(); // Tell Laravel this transacion's all good and it can persist to DB
            return redirect()->back()->with('message', 'Test added successfully');
  
        } catch (\Exception $exp) {

            dd($exp->getMessage());
            DB::rollBack(); // Tell Laravel, "It's not you, it's me. Please don't persist to DB"
            throw  $exp;
            return redirect()->back()->with('message', 'Please try agin, after sometime!');
  
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sub_tests = SubTest::all();
        $organs = Organ::all();
       
        $organ_subtest = Organ::find($id);

        $selectedValues = collect($organ_subtest->subtest()->pluck('test_id')->toArray());
        //dd($sub);
        return view('Admin.TestByOrgan.edit', compact('organ_subtest','organs','sub_tests','selectedValues'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();  
            //$organ = Organ::find($request->organ);
            $organ = Organ::where('id',$id)->first();
            //dd($organ);
            $organ->subtest()->sync($request->input('sub_tests',[]));

            DB::commit(); // Tell Laravel this transacion's all good and it can persist to DB
            return redirect()->back()->with('message', 'Test updated successfully');
  
        } catch (\Exception $exp) {

            dd($exp->getMessage());
            DB::rollBack(); // Tell Laravel, "It's not you, it's me. Please don't persist to DB"
            throw  $exp;
            return redirect()->back()->with('message', 'Please try agin, after sometime!');
  
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
