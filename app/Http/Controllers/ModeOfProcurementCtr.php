<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Model\ModeOfProcurement as MOP;
class ModeOfProcurementCtr extends Controller
{
    public function index()
    {
        $mops = MOP::paginate(10)->jsonSerialize();

        return response($mops, Response::HTTP_OK);
    }

    public function all()
    {
        $mops = MOP::orderBy('id')->get();

        return response()->json($mops);
    }

    public function store(Request $request)
    {
        $mop = MOP::create($request->all());
        return response()->json($mop);
    }

    public function update(Request $request, $id)
    {
        $mop = MOP::findOrFail($id);
        $mop->update($request->all());

        return response()->json($mop);
    }
    public function destroy($id)
    {
        $mop = MOP::where('id', $id)->first();
        $mop->delete();

        return response()->json($mop);
    }
}
