<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use DB;

class EmployeeController extends Controller
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
       $employees = DB::table('employees')->paginate(10);

       // $employees = Employee::all()->paginate(10);
       return view('layouts.employee.index',['employees'=>$employees]);
   }
   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
       //Return view to create employee
       return view('layouts.employee.create');
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
       $employee = new Employee();
       //input method is used to get the value of input with its
       //name specified
       $employee->name = $request->input('firstname');
       $employee->lastname = $request->input('lastname');
       $employee->company = $request->input('department');
       $employee->email = $request->input('email');
       $employee->phone = $request->input('phone');
       $employee->save(); //persist the data
       return redirect()->route('employees.index')->with('info','Employee Added Successfully');
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
       $employee = Employee::find($id);
       return view('layouts.employee.edit',['employee'=> $employee]);
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
       $employee = Employee::find($request->input('id'));
       $employee->name = $request->input('firstname');
       $employee->lastname = $request->input('lastname');
       $employee->company = $request->input('department');
       $employee->email = $request->input('email');
       $employee->phone = $request->input('phone');
       $employee->save(); //persist the data
       return redirect()->route('employees.index')->with('info','Employee Updated Successfully');
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
       $employee = Employee::find($id);
       //delete
       $employee->delete();
       return redirect()->route('employees.index');
   }
}