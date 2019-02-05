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
        $pr = PR::create([
            'purpose' => $request->purpose,
        ]);

        $count = count($request->item);

        foreach($request->item as $item){
            
        }

        return response($pr->id, Response::HTTP_CREATED);
    }

    public function store_items(Request $request,$id)
    {
        $pr = PR::findOrFail($id);
        foreach($data as $datas){
            $pr->items()->attach($datas['id'], ['quantity', $datas['quantity']]);
        }
        return response($pr, Response::HTTP_CREATED);
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
