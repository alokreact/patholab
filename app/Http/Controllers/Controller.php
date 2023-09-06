<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $selectedValues;

    public function __construct() 
    {
        // Fetch the Site Settings object
        $selectedValues= ['1'];
    
        \View::share('selectedValues', $this->selectedValues);
    }
}
