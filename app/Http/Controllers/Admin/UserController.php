<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
     public function index(){

        $users = User::all();
        return view('Admin.Users.list',compact('users'));
     }
 
     public function edit($id){

      $user = User::find($id);
      return view('Admin.Users.edit',compact('user'));
   }

   public function update(Request $request,$id){

      $user = User::find($id);
      $user->name = $reuest->input('name');
      $user->phone = $reuest->input('phone');
      $user->email = $reuest->input('email');
      $user->save();

      //return view('Admin.User.edit',compact('user'));
   }
   public function destroy($id){

      $user = user::find($id);
      $user->delete();
      
   }

}
