<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Model\PurchaseRequest as PR;
use App\Model\Item;


class PurchaseRequestCtr extends Controller
{

    public function search(Request $request)
    {
        
    }

    public function index()
    {
        $prs = PR::with('items')->orderBy('id')->get()->jsonSerialize();
        return response($prs, Response::HTTP_OK);
    }

    public function store(Request $request)
    {

        $count = count($request->items);

        $pr = PR::create([
            'purpose' => $request->purpose,
        ]);
        
        for($i = 0; $i < $count; $i++){
            $item_cost = Item::where('id', $request->items[$i]['id'])->first();
            $total_cost = $item_cost->cost * $request->items[$i]['quantity'];
            $pr->items()->attach($pr->id, ['item_id' => $request->items[$i]['id'], 'quantity' => $request->items[$i]['quantity'], 'total_cost' => $total_cost]);
        }
        return response($pr->id, Response::HTTP_CREATED);
    }

    public function store_new_item()
    {

    }


    public function store_items(Request $request,$id)
    {
        $pr = PR::findOrFail($id);
        $count = count($request->item_id);
        $item_ids = $request->items;
        $quantities = $request->quanity;
        return response($pr, Response::HTTP_CREATED);
    }


    public function update(Request $request, $id)
    {
        $input = $request->all();
        $pr = PR::findOrFail($id);
        $pr->update($input);
        return response($pr, Response::HTTP_CREATED);
    }

    public function destroy($id)
    {
        $pr = PR::where('id', $id)->first();

        $pr->items()->detach();
        $pr->delete();

        return response($pr, Response::HTTP_OK);
    }
}
