<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Model\Unit;

class UnitCtr extends Controller
{
    public function index()
    {
        $units = Unit::orderBy('id')->paginate(10)->jsonSerialize();

        return response($units, Response::HTTP_OK);
    }

    public function all()
    {
        $units = Unit::orderBy('id')->get()->jsonSerialize();

        return response($units, Response::HTTP_OK);
    }
    public function store(Request $request)
    {
        $input = $request->all();
        $unit = Unit::create($input);
        return response($unit, Response::HTTP_CREATED);
    }

    public function update(Request $request, $id)
    {
        $unit = Unit::findOrFail($id);
        $input = $request->all();
        $unit->update($input);

        return response($unit, Response::HTTP_OK);
    }
}
