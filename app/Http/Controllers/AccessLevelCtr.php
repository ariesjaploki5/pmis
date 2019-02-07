<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Access_level as Al;

class AccessLevelCtr extends Controller
{
    public function index()
    {
        $als = Al::paginate(10);
        return response()->json($als);
    }

    public function all()
    {
        $als = Al::all();
        return response()->json($als);
    }

    public function store(Request $request)
    {
        $al = Al::create($request->all());
        return response()->json($al);
    }

    public function update(Request $request, $id)
    {
        $al = Al::findOrFail($id);
        $al->update($request->all());
        return response()->json($al);
    }

    public function destroy($id)
    {
        $al = Al::where('id', $id)->first();
        return response()->json($al);
    }
}
