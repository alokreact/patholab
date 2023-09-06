<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\Admin\OrganCreateRequest;
use App\Models\Organ;


class OrganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allOrgans = Organ::all();
        return view('Admin.Organs.index', compact('allOrgans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Organs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrganCreateRequest $request)
    {
        
        $data = $request->all();

        if ($request->file('image')) {
    
            $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('Image'), $filename);
            $data['image'] = $filename;
            $data['status'] = 1;
        }
    
        Organ::create($data);
        
        return redirect()->back()->with('message','Organ Created Succesfully');
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
    public function edit($id){

        $organ = Organ::find($id);
        return view('Admin.Organs.edit',compact('organ'));
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
        $organ = Organ::find($id);
        $data = $request->except('_method', '_token');  
        // $user = User::find($id);
        
        

        if ($request->file('image')) {  

                 $file = $request->file('image');
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('Image'), $filename);
                $data['image'] = $filename;
        }    
        Organ::where('id',$id)->update($data);
        //$organ->update($data);
        return redirect()->back()->with('message', 'Organ updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $organ = Organ::find($id);
        $organ->delete();

        return redirect()->route('organ.index')->with('message','Deleted Successfully');

    }
}
