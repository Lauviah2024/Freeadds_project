<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Categorie;   // Link with my category model

class CategorieController extends Controller
{
    // Add a category 
    public function store(Request $request) // Takes as parameter the add request
    {
        $request->validate(['name' => 'required|unique:Categorie|max:50']);
        Categorie::create($request->all()); // save the model and return a new instance 
        return redirect()->route('categories.index')->with('Success', 'Category created successfully'); // redirects by the defined route with the success message given
    }

    // fetch a category in the database
    public function index()
    {
        $categorie = Categorie::all();
        return view('categories.index', compact('categories'));
    }

    // update a category in the database
    public function update(Request $request, $id) // Tale as parameters the input and the id of the category that will be updated
    {
        $request->validate(['name' => 'required|unique:Categorie|max:50']);
        $categorie = Categorie::find($id);  // Check the id of the category with the method find
        $categorie->update($request->all());
        return redirect()->route('categories.index')->with('Success', 'Category updated successfully');
    }

    // destroy a category in the database
    public function destroy($id)    // Takes as parameter the id of the category that will be destroyed
    {
        $categorie = Categorie::find($id);  // Check the id of the category with the method find
        $categorie->delete();
        return redirect()->route('categories.index')->with('Success', 'Category updated successfully');
    }

    // create a new category
    public function create()
    {
        return view('categories.create');
    }

    // show the category
    public function show ($id)
    {
        $categorie = Categorie::find($id);
        return view('categories.show',compact('categorie'));
    }

    // edit a category
    public function edit ($id)
    {
        $categorie = Categorie::find($id);
        return view('categories.edit',compact('categorie'));
    }
}
