<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Organ;
use App\Models\Category;
use Session;

class OrganController extends Controller{

    public $cartCount;

     
    public function index(){
        $cartCount = \Cart::count();
      
        $allorgans = Organ::paginate(30);
        $organs = Organ::take(12)->get();
     
        //dd($allorgans);
        return view('Front-end.Organs.index',compact('allorgans','organs','cartCount'));
    }
    public function findTestbyOrgan($id){

        $testsbyOrgan = Organ::find($id);
        $subtests= $testsbyOrgan->subtest;
        $organs = Organ::take(12)->get();
        $categories = Category::take(12)->get();
        
        //dd($testsbyOrgan);
        
        return view('Front-end.Organs.testbyorgan',compact('testsbyOrgan','subtests','organs','categories'));
    }
}
