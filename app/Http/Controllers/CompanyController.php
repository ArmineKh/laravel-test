<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Requests\CreateCompanieRequest;
use Storage;
use DB;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $companyes = Company::paginate(10);
      return view('company.index',['companyes'=>$companyes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
               return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCompanieRequest $request)
    {
        //

               $logoName = '';
                if ($request->file('logo'))
                {
                    $logoName = $request->file('logo')->store('/public');
                    $logoName = str_replace('public', 'storage', $logoName);
                }
                $company = Company::create(['name' => $request->input('name'),
                                            'email' => $request->input('email'),
                                            'logo' => $logoName,
                                            'website' => $request->input('website')]);


               return redirect()->route('company.index')->with('info','Company Added Successfully');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $comp = Company::find($id);
        return view('company.edit',['company'=> $comp]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(CreateCompanieRequest $request, $id)
    {
        //
        $logoName = '';
        if ($request->file('logo'))
        {
             $logoName = $request->file('logo')->store('/public');
             $logoName = str_replace('public', 'storage', $logoName);
         }

        $comp = Company::find($request->input('id'))
                           ->update(['name' => $request->input('name'),
                                    'email' => $request->input('email'),
                                    'logo' => $logoName,
                                    'website' => $request->input('website')]);

        return redirect()->route('company.index')->with('info','Company Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $comp = Company::find($id);
        $comp->delete();
        return redirect()->route('company.index');
    }
}
