<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Appointment;
use App\Models\Prescription;
use Symfony\Component\HttpFoundation\Response;

class ContactController extends Controller
{
    public function index()
    {
        return view('Front-end.Contact.index');
    }
   
    public function appointment()
    {

        return view('Front-end.Appointment.index');
    }

    public function store_appointment(Request $request)
    {
        $data = $request->all();

        $validate = $request->validate([
            'name' => 'required',
            'reason' => 'required',
            'phone' => 'required',
     
        ]);

        if ($validate) {

            $appointment = new Appointment;
            $appointment->name = $request->name;
            $appointment->phone = $request->phone;
            $appointment->pin = $request->reason;
            $appointment->save();
            //Appointment::create($data);

            // return  redirect()->back()->with('message', 'Successfully Placed');

            return response()->json(['message'=>'Submitted Succesfully'],Response::HTTP_CREATED);
        }
    }

    public function prescription()
    {
        return view('Front-end.Appointment.upload-prescription');
    }

    public function store_prescription(Request $request){

        $data = $request->all();

        //dd($data);

        $validate= $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'report' => 'required',
        ]);

        if ($validate) {

            if($request->file('report')) {

                $file = $request->file('report');
                $filename = date('YmdHi') . $file->getClientOriginalName();                             
                $file->move(public_path('images/reports'), $filename);
                //$data['report'] = $filename;
            
                $prescription = new Prescription;
                $prescription->name = $request->name;
                $prescription->phone = $request->phone;
                $prescription->report = $filename;
                $prescription->save();
                //Appointment::create($data);
                return  response()->json(['message'=>'Report Uploaded Successfully. Our team will contact you soon!']);
            }
        }
    }
}
