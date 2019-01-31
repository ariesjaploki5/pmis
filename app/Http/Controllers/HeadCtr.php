<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Model\Head;

class HeadCtr extends Controller
{
    public function index()
    {
        $heads = Head::with('division')->orderBy('id')->paginate(10)->jsonSerialize();
        return response($heads, Response::HTTP_OK);
    }

    public function all()
    {
        $heads = Head::with('division')->orderBy('id')->get()->jsonSerialize();

        return response($heads, Response::HTTP_OK);
    }
    public function store(Request $request)
    {
        $input = $request->all();
        $head = Head::create($input);

        return response()->json($head);
    }

    public function update()
    {

    }

    public function destroy()
    {

    }
}
