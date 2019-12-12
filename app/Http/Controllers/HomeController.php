<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      $users = User::all();
      return view('home',['users'=>$users]);
        // return view('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Retrieve the employee
        $users = User::find($id);
        //delete
        $users->delete();
        return redirect()->route('home');
    }
}
