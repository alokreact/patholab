<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
     public function index(){

        $users = User::all();
        return view('Admin.User.list',compact('users'));
     }
     
}
