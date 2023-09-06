<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\GroupTest;
use App\Models\SubTest;

use App\Http\Requests\Admin\GrouptestCreateRequest;


class GrouptestController extends Controller{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grouptests = GroupTest::with('subtest')->get()->toArray();
        
        return view('Admin.GroupTest.list',compact('grouptests'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){

        $sub_tests = SubTest::all();
        return view('Admin.GroupTest.create',compact('sub_tests'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        
        $data = $request->all();
     
         $grouptest = new GroupTest;
         $grouptest->name = $request->name;
         $grouptest->save();
         $grouptest->subtest()->sync(collect($request->sub_tests,[]));

        return redirect()->back()->with('message','Test Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $grouptest = GroupTest::find($id); 
        $sub_tests = SubTest::all();       
        $subtest_selected_values = $grouptest->subtest()->get()->toArray();

        $selectedValues = collect($grouptest->subtest()->pluck('sub_tests_id')->toArray());
     
        return view('Admin.GroupTest.edit',compact('grouptest','subtest_selected_values','sub_tests','selectedValues'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){

        $grouptest = GroupTest::find($id);
        $grouptest->name = $request->name;
        $grouptest->save();
        $grouptest ->subtest()->sync(collect($request->sub_tests,[]));
        return redirect()->back()->with('message','Test Updated Successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){

        $grouptest = GroupTest::find($id);
        $grouptest->delete();
        $grouptest->subtest()->wherePivot('grouptest_id', $grouptest->id)->detach();
        return redirect()->route('groutest.index')->with('message','Deleted Successfully');
        //dd($id);
    }
}
