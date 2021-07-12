<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Company;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::orderBy('name','asc')->get();
        return view('company.index',[
            'companies' => $companies
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fileNameToStore= null;
        if($request->hasFile("logo"))
        {
            $fileNameWithExt = $request->file("logo");
            $fileNaming = $fileNameWithExt->getClientOriginalName();
            $filename = pathinfo($fileNaming,PATHINFO_FILENAME);
            $extension = $fileNameWithExt->guessClientExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $fileNameWithExt->storeAs('public/logo',$fileNameToStore); 
        }
        $company = Company::create([
            'name' => $request->name,
            'email' => $request->email,
            'logo' => $fileNameToStore,
            'website_url' => $request->website_url,
        ]);
        return redirect()->route('company-index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = Company::findorFail($id);
        return view('company.show',[
            'company' => $company
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::findorFail($id);
        return view('company.edit',[
            'company' => $company
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $company = Company::findorFail($id);
        $fileNameToStore= "defaultLogo";

        if($company->logo !="defaultLogo")
        {
            if($request->current_logo == false)
            Storage::disk('public')->delete('logo/'.$company->logo);
        }

        if($request->hasFile("logo"))
        {
            $fileNameWithExt = $request->file("logo");
            $fileNaming = $fileNameWithExt->getClientOriginalName();
            $filename = pathinfo($fileNaming,PATHINFO_FILENAME);
            $extension = $fileNameWithExt->guessClientExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $fileNameWithExt->storeAs('public/logo',$fileNameToStore); 
        }

        $company->name = $request->name;
        $company->email = $request->email;
        $company->logo = $fileNameToStore;
        $company->website_url = $request->website_url;
        $company->save();

        return redirect()->route('company-show',$company->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Company::findorFail($id);
        Storage::disk('public')->delete('logo/'.$company->logo);
        $company->delete();
        return redirect()->route('company-index');
    }
}
