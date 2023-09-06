<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Appointment;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(){

        return view('Admin.Dashboard.index');
    }

    public function appointment (){

        $appointments = Appointment::all();
        return view('Admin.Appointment.list',compact('appointments'));
    }
}
