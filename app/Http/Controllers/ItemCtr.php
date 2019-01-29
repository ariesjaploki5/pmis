<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Item;

class ItemCtr extends Controller
{
    public function index($role_id)
    {
        $items = Item::with('pap_code')->orderBy('id')->get();
        
        return response()->json($items);
    }

    public function store(Request $request)
    {
        $item = Item::create($request->all());

        return response()->json($item);
    }

    public function update(Request $request, $id)
    {
        $item = Item::find($id);
        $input = $request->all();
        $item->fill($input)->save();

        return response()->json($item);
    }

    public function destroy($id)
    {
        $item = Item::where('id', $id)->first();
        $item->delete();
        return response()->json($item);
    }

    public function archived($id)
    {
        $item = Item::where('id', $id)->first();
        
        return response()->json($item);
    }
}
