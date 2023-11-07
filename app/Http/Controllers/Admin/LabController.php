<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\LabcreateRequest;
use Illuminate\Support\Facades\Storage;


use App\Models\Lab;

class LabController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $labs = Lab::all();
        return view('Admin.Lab.list',compact('labs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Lab.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LabcreateRequest $request)
    {
        $data = $request->all();
        //dd($data);
        if($request->file('image')) {
            $file = $request->file('image');
            $filename = date('Ymd').$file->getClientOriginalName();
            $filepath = $file->move(public_path('Image'), $filename);
            $data['image'] = $filename;
        }
        
        Lab::create($data);
        return redirect()->back()->with('message', 'Lab added successfully');
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
        $lab = Lab::find($id);
        return view('Admin.Lab.edit',compact('lab'));
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
        $lab = Lab::find($id);   
        
        //dd($request->input('lab_name'));
       
        if($request->file('image')) {
            if(file_exists(public_path('Image/'.$lab->image))){
                //Storage::delete(public_path('Image/').$lab->image);
                \File::delete(public_path('Image/'.$lab->image));
            }
            $file = $request->file('image');
            $filename = date('Ymd').$file->getClientOriginalName();
            $file->move(public_path('Image'), $filename);
       
           // $data['image'] = $filename;
        }

       // $data['image'] = $lab->image;
       
                 $lab->lab_name=$request->input('lab_name');
                 $lab->state=$request->input('state');
                 $lab->city=$request->input('city'); 
                 $lab->pin=$request->input('pin'); 
                 $lab->address1=$request->input('address1');
                 $lab->image=$request->file('image')?$filename:$lab->image;
                
                 $lab->save();

                //dd($data);
      //  $lab->update($data);
        return redirect()->back()->with('message','Updated Succesfully');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lab = Lab::find($id);
        $lab->delete();
        return redirect()->back()->with('message','Deleted Succesfully');

    }
}
