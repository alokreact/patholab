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
        $allorgans = Organ::paginate(12);
        $organs = Organ::take(12)->get();

        $breadcrumbs = [
            ['label' => 'Home', 'url' => route('home')],
            ['label' => 'Organs'],
        ];
        //dd($allorgans);
        return view('Front-end.Organs.index',compact('allorgans','organs','cartCount','breadcrumbs'));
    }

    public function findTestbyOrgan($id){
        $testsbyOrgan = Organ::find($id);
        $subtests= $testsbyOrgan->subtest;
        
        $organs = Organ::take(12)->get();
        $categories = Category::take(12)->get();        

        $breadcrumbs = [
            ['label' => 'Home', 'url' => route('home')],
            ['label' => 'Organ'],
            ['label' => $testsbyOrgan->name],
            
        ];

        return view('Front-end.Organs.testbyorgan',compact('testsbyOrgan','subtests','organs','categories','breadcrumbs'));
    }
}
