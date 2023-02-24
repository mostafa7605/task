<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\Company;

class CompanyController extends Controller
{
    public function index(){
        $companies= Company::all();
        return view('website.companies.index',compact('companies'));

    }

    public function create(){
    	 return view('website.companies.create');
    }
    public function store(Request $request){
    	//dd($request->all());
    	$validator = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required|numeric|unique:company,phone',
            'email' => 'required|email|unique:company,email',
            'address_name' => 'required',
            'country' => 'required',
            'city'=>'required',
            'region'=>'required'

        ]);
        if ($validator->fails()) {
            return Redirect::back()->withInput()->withErrors($validator);
        }
        if($request->hasFile('logo')){


            $image = time().'.'.$request->logo->extension();

            $request->logo->move(public_path('images/companies/'), $image);
            $path=('images/companies/').$image;


        }

      Company::create(['name'=>$request->name,'email'=>$request->email,'phone'=>$request->phone,'logo'=>$path,'address_name'=>$request->address_name,'country'=>$request->country,'city'=>$request->city,'region'=>$request->region]);
    	 return redirect('/companies');
    }
    public function edit($id){
    	$company=Company::find($id);
    	 return view('website.companies.edit',compact('company'));
    }

    public function update(Request $request ,$id){
    	//dd($request->all());
    	$validator = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required|numeric|unique:company,phone,'. $id,
            'email' => 'required|email|unique:company,email,'. $id,
            'address_name' => 'required',
            'country' => 'required',
            'city'=>'required',
            'region'=>'required'

        ]);
        if ($validator->fails()) {
            return Redirect::back()->withInput()->withErrors($validator);
        }
        $path=Company::where('id',$id)->first()->logo;
         if($request->hasFile('logo')){


            $image = time().'.'.$request->logo->extension();

            $request->logo->move(public_path('images/companies/'), $image);
            $path=('images/companies/').$image;


        }
       
        Company::where('id',$id)->update(['name'=>$request->name,'email'=>$request->email,'logo'=>$path,'phone'=>$request->phone,'address_name'=>$request->address_name,'country'=>$request->country,'city'=>$request->city,'region'=>$request->region]);
      
    	 return redirect('/companies');
    }

    public function delete($id){
    	Company::where('id',$id)->delete();
    	return redirect('/companies');
    }
}