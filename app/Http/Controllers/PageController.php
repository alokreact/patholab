<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function terms(){
        return view('Front-end.Pages.terms');
    }

    public function policy(){
        return view('Front-end.Pages.policy');
    }

}
