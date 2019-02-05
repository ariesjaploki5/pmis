<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\ModeOfProcurement as MOP;
class ModeOfProcurementCtr extends Controller
{
    public function index()
    {
        $mops = MOP::paginate(10)->jsonSerialize();

        return response($mops, Reponse::HTTP_OK);
    }

    public function all()
    {
        $mops = MOP::orderBy('id')->get();

        return response()->json($mops);
    }

    public function store()
    {

    }

    public function update()
    {

    }
    public function destroy()
    {
        
    }
}
