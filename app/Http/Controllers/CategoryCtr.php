<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Model\Category;

class CategoryCtr extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('id')->paginate(10)->jsonSerialize();

        return response($categories, Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $category = Category::create($request->all());
        return response()->json($category);
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $input = $request->all();
        $category->update($input);

        return response()->json($category);
    }

    public function destroy($id)
    {

    }

    public function archived($id)
    {
        $item = Category::where('id', $id)->first();
        
        return response()->json($item);
    }
}
