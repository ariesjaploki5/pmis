<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Model\Division;

class DivisionCtr extends Controller
{
    public function index()
    {
        $divisions = Division::orderBy('id')->paginate(10)->jsonSerialize();
        return response($divisions, Response::HTTP_OK);
    }

    public function all()
    {
        $divisions = Division::orderBy('id')->get()->jsonSerialize();

        return response($divisions, Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $division = Division::create($input);
        
        return response($division, Response::HTTP_CREATED);
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        $division = Division::findOrFail($id);
        $division->update($input);
        
        return response($division, Response::HTTP_CREATED);
    }

    public function destroy()
    {

    }
}
