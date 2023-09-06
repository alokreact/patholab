<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrganTestController extends Controller
{
    public function get_test_from_organ($organ_id){

        $organ = Organ::find($organ_id);
        
        return  view('Front-end.Labs.index',compact('labs'));
    }
}
