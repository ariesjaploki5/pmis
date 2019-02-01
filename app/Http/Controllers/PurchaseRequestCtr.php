<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Model\Purchase_request as PR;

class PurchaseRequestCtr extends Controller
{
    public function index()
    {
        $prs = PR::with('items')->orderBy('id')->get()->jsonSerialize();
        return response($prs, Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $object = $request->items;
        $ob = response()->json($object);
        $obj = (array)$ob;

        return $obj->id;
        // $pr = PR::create([
        //     'purpose' => $request->purpose,
        // ]);

        

        // return response($pr, Response::HTTP_CREATED);
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        $pr = PR::findOrFail($id);
        $pr->update($input);
        return response($pr, Response::HTTP_CREATED);
    }

    public function destroy()
    {

    }
}
