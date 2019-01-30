<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Pap_code;

class PapCodeCtr extends Controller
{
    public function index()
    {
        $pap_codes = Pap_code::orderBy('id')->get();

        return response()->json($pap_codes);
    }

    public function store(Request $request)
    {
        $pap_code = Pap_code::create($request->all());

        return response()->json();
    }

    public function update()
    {

    }

    public function destroy()
    {

    }
}
