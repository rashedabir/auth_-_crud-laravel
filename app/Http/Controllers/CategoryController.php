<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;

class CategoryController extends Controller
{
    public function index(){
        $categories = Categories::all();
        return view('dashboard', compact('categories'));
    }

    public function create(){
        return view('categories.create');
    }

    public function store(Request $request){
        $category = new Categories;

        $category->name = $request->name;

        $category->save();

        return redirect("/dashboard");
    }

    public function edit($id){
        $category = Categories::where('id', $id)->first();

        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, $id){
        $category = Categories::where('id', $id)->first();

        $category->name = $request->name;

        $category->save();

        return redirect("/dashboard");
    }

    public function delete( $id){
        $category = Categories::where('id', $id)->first();

        $category->delete();

        return redirect("/dashboard");
    }
}