<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Model\Pap_code;

class PapCodeCtr extends Controller
{
    public function index()
    {
        $pap_codes = Pap_code::with('category')->orderBy('id')->paginate(50)->jsonSerialize();
        return response($pap_codes, Response::HTTP_OK);
    }

    public function all()
    {
        $pap_codes = Pap_code::with('category')->orderBy('id')->get()->jsonSerialize();
        return response($pap_codes, Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $pap_code = Pap_code::create($request->all());
        return response($pap_code, Response::HTTP_CREATED);
    }

    public function update(Request $request, $id)
    {
        $pap_code = Pap_code::findOrFail($id);
        $input = $request->all();
        $pap_code->update($input);
        
        return response($pap_code, Response::HTTP_OK);
    }

    public function destroy()
    {

    }
}
