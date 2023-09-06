<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\TestCreateRequest;
use App\Models\SubTest;
use App\Models\Organ;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subtests = SubTest::all();
        return view('Admin.Test.index',compact('subtests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){

        $organs = Organ::all();
        return view('Admin.Test.create',compact('organs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TestCreateRequest $request){
        
        $data = $request->all();
     
        $subtest= SubTest::create($data);

        return redirect()->back()->with ('message','Test Created Succesfully');
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
        $organs = Organ::all();
        $subtest = SubTest::find($id);
        return view('Admin.Test.edit',compact('subtest','organs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $data = $request->all();
        $subtest = SubTest::find($id);
        $subtest->update($data);
        return redirect()->back()->with('message','Updated Successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){

        $subtest = SubTest::find($id);
        $subtest ->delete();
        return redirect()->back()->with('message','Deleted Successfully');

    }
}
