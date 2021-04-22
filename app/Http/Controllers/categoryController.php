<?php

namespace App\Http\Controllers;

use App\category;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    public function index()
    {

        $categories = category::all();
        return view('categoryIndex', compact('categories'));
    }

    public function create()
    {
        return view('categoryCreate');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255'

        ]);
        $show = category::create($validatedData);

        return redirect('/category')->with('success', 'Category is successfully saved');
    }
    public function show()
    {
    }

    public function edit($id)
    {
        $category = category::findOrFail($id);

        return view('categoryedit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',

        ]);
        category::whereId($id)->update($validatedData);

        return redirect('/category')->with('success', 'Category name is successfully updated');
    }

    public function destroy($id)
    {
        $category = category::findOrFail($id);
        $category->delete();

        return redirect('/category')->with('success', 'Category is successfully deleted');
    }
}
