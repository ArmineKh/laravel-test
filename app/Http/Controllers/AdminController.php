<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\User;
use DB;
use Auth;

class AdminController extends Controller
{
    //
    function isadmin(){
     if (Auth::id() == 1) {
       return Redirect::to('/admin');
     } else{
       Session::flash("error", ["You are not admin"]);
           return Redirect::to('/home');
     }
   }

   function goToAdminPage(){
     $users = User::where('id', '!=', 1)->get();
   return view("adminPage")->with('users', $users);
   }

 function delete($id){
   $user = User::find($id);
     DB::table('users')->where('id', $user->id)->delete();

       return Redirect::to('/admin');
 }

}
}
