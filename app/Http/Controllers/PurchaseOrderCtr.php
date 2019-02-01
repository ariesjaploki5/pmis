<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Model\Purchase_order as PO;

class PurchaseOrderCtr extends Controller
{
    public function index()
    {
        $pos = PO::with('purchase_requests')->orderBy('id')->get()->jsonSerialize();
        return response($pos, Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $po = PO::create($input);
        return response($po, Response::HTTP_CREATED);
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        $po = PO::findOrFail($id);
        $po->update($input);
        return response($po, Response::HTTP_CREATED);
    }

    public function destroy()
    {

    }
}
