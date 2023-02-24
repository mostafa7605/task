<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(){
        $products= Product::all();
        return view('pages.products.index',compact('products'));

    }

    public function create(){
    	 return view('pages.products.create');
    }
    public function store(Request $request){
    	//dd($request->all());
    	$validator = Validator::make($request->all(), [
            'name' => 'required',
            'description'=>'required',
            'image'=>'required'

        ]);
        if ($validator->fails()) {
            return Redirect::back()->withInput()->withErrors($validator);
        }
        if($request->hasFile('image')){


            $image = time().'.'.$request->image->extension();

            $request->image->move(public_path('images/products/'), $image);
            $path=('images/products/').$image;


        }

      Product::create(['name'=>$request->name,'description'=>$request->description,'image'=>$path]);
    	 return redirect('/products');
    }
    public function edit($id){
    	$product=Product::find($id);
    	 return view('pages.products.edit',compact('product'));
    }

    public function update(Request $request ,$id){
    	//dd($request->all());
    	$validator = Validator::make($request->all(), [
            'name' => 'required',
            'description'=>'required',
            'image'=>'required'

        ]);
        if ($validator->fails()) {
            return Redirect::back()->withInput()->withErrors($validator);
        }
        $path=Product::where('id',$id)->first()->image;
         if($request->hasFile('image')){


            $image = time().'.'.$request->image->extension();

            $request->image->move(public_path('images/products/'), $image);
            $path=('images/products/').$image;


        }
       
        Product::where('id',$id)->update(['name'=>$request->name,'description'=>$request->description,'image'=>$path]);
      
    	 return redirect('/products');
    }

    public function delete($id){
    	Product::where('id',$id)->delete();
    	return redirect('/products');
    }
}