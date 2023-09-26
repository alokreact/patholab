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
}
