<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompanyRequest;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies=Company::paginate(3);
        return view('admin.companies.index',compact('companies'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('logo'))
        {
            $path=$request->file('logo')->store('public/images');

            $product=Company::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'logo'=>$path,
                'website'=>$request->website,
            ]);

            Mail::send('email.CompanyCreated',$product->toArray(),
            function($message){
                $message->to('salmansagar1122@gmail.com','Laravel is fun')->subject('Company Created');
            });
            return redirect()->route('companies.index')->with('message','Company created Successfully');
        }



        // {
         return redirect()->route('companies.create')->with('message','Failed to create');
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('admin.companies.edit',compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCompanyRequest $request, Company $company)
    {
        if($request->hasFile('logo'))
        {
            $path=$request->file('logo')->store('public/images');

            $company->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'logo'=>$path,
                'website'=>$request->website,
            ]);

            return redirect()->route('companies.index')->with('message','Company Updated with Logo');
        }
        else
        {
            $company->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'website'=>$request->website,
            ]);

            return redirect()->route('companies.index')->with('message','Company Updated without logo');
        }
         return redirect()->route('companies.edit')->with('message','Failed to Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company->delete();
        return redirect()->route('companies.index')->with('message','Deleted Successfully');
    }
}
