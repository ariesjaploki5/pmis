<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Head;

class HeadCtr extends Controller
{
    public function index()
    {
        $heads = Head::orderBy('id')->get();

        return response()->json($heads);
    }

    public function store()
    {
        $head = Head::create($request->all());

        return response()->json($head);
    }

    public function update()
    {

    }

    public function destroy()
    {

    }
}
