<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use Storage;
use DB;


class CompanyController extends Controller
{
    //
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
       //Show all employees from the database and return to view
       $companyes = DB::table('companies')->paginate(10);
       return view('layouts.company.index',['companyes'=>$companyes]);
   }
   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
       //Return view to create employee
       return view('layouts.company.create');
   }
   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {
       //Persist the employee in the database
       //form data is available in the request object
       $company = new Company();
       //input method is used to get the value of input with its
       //name specified
       $fileName = '';
              if ($request->file('logo')) {
                  $fileName = $request->file('logo')->store('/public');
                  $fileName = str_replace('public', 'storage', $fileName);
              }
       $company->name = $request->input('name');
       $company->email = $request->input('email');
       $company->logo = $fileName;
       $company->website = $request->input('website');
       $company->save(); //persist the data
       // var_dump($company); die;

       return redirect()->route('company.index')->with('info','Company Added Successfully');
   }
   /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function edit($id)
   {
       //Find the employee
       $company = Company::find($id);
       return view('layouts.company.edit',['company'=> $company]);
   }
   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request)
   {
       //Retrieve the employee and update
       $fileName = '';
              if ($request->file('logo')) {
                  $fileName = $request->file('logo')->store('/public');
                  $fileName = str_replace('public', 'storage', $fileName);
              }
       $company = Company::find($request->input('id'));
       $company->name = $request->input('name');
       $company->email = $request->input('email');
       $company->logo = $fileName;
       $company->website = $request->input('website');
       $company->save(); //persist the data
       return redirect()->route('company.index')->with('info','Company Updated Successfully');
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
       $company = Company::find($id);
       //delete
       $company->delete();
       return redirect()->route('company.index');
   }
}
