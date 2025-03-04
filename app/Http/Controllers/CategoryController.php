<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $allCat= Category::paginate(15);
        return view("categories.index",["cat"=>$allCat]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("categories.create");
  
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $newCat = new Category();
        $newCat->name = $request->input("name");
        $path = $request->file('image')->store('categories', 'public');
        $newCat->image=$path;
        $newCat->save();
        return redirect()->route("home.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
        return view("categories.show",["category"=>$category]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
        return view("categories.edit",["category"=>$category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
       
        $newCat->name = $request->input("name");
        $path = $request->file('image')->store('categories', 'public');
        $newCat->image=$path;
        return redirect()->route("categries.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
        $category->delete();
        return redirect()->route("categries.index");
    }
}
