<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Validator;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        // $categories = Category::with('children')
        // ->whereNull('parent')
        // ->get();
        // dd($categories);
        return view('pages.category.index', compact('categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('pages.category.create', compact('categories'));
    }
    public function store(Request $request)
    {
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);
        if ($validator->fails()) {
            return Redirect::back()->withInput()->withErrors($validator);
        }
        

        Category::create(['name' => $request->name]);
        return redirect('/category');
    }
    public function edit($id)
    {
        $category = Category::find($id);
        $categories = Category::all();
        return view('pages.category.edit', compact('category', 'categories'));
    }

    public function update(Request $request, $id)
    {
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);
        if ($validator->fails()) {
            // dd($validator);
            return Redirect::back()->withInput()->withErrors($validator);
        }
        

        Category::where('id', $id)->update(['name' => $request->name]);
        // dd($request->all());
        return redirect('/category');
    }

    public function delete($id)
    {
        Category::where('id', $id)->delete();
        return redirect('/category');
    }
}
