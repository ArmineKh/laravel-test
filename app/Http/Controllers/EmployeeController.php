<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Requests\CreateEmployeeRequest;


class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $employees = Employee::paginate(10);
      return view('employee.index',['employees'=>$employees]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateEmployeeRequest $request)
    {
        $employee = Employee::create(['name' => $request->input('name'),
           'lastname' => $request->input('lastname'),
           'company' => $request->input('company'),
           'email' => $request->input('email'),
           'phone' => $request->input('phone')]);

        return redirect()->route('employees.index')->with('info','Employee Added Successfully');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::find($id);
        return view('employee.edit',['employee'=> $employee]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(CreateEmployeeRequest $request, $id) 
    {
        $employee = Employee::find($request->input('id'))
        ->update(['name' => $request->input('name'),
         'lastname' => $request->input('lastname'),
         'company' => $request->input('company'),
         'email' => $request->input('email'),
         'phone' => $request->input('phone')]);

        return redirect()->route('employees.index')->with('info','Employee Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::find($id);
        $employee->delete();
        return redirect()->route('employees.index');
    }
}
