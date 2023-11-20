<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\Patient;

class PatientController extends Controller
{
    public function delete(Request $request){
        //dd($request->all());
        $patient = Patient::find($request->id);
        $patient->delete();
        return response()->json(['status'=>'success']);

    }

    public function edit($id){
        $patient = Patient::find($id);
        return view('Front-end.Profile.components.patient_edit',compact('patient'));
    }

    public function update(Request $request, $id){

        $patient = Patient::find($id);

        $patient->name = $request->input('name');
        $patient->age = $request->input('age');
        $patient->gender = $request->input('gender');
        $patient->save();

        return redirect()->route('patient');        
    }
}
