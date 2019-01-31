<?php

namespace App\Http\Controllers;

use JWTAuth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Model\Item;
use App\User;

use DB;

class ItemCtr extends Controller
{

    public function index(Request $request)
    {
        $items = Item::orderBy('id')->paginate(10)->jsonSerialize();
        return response($items, Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $item = Item::create($request->all());
        return response()->json($item);
    }

    public function update(Request $request, $id)
    {
        $item = Item::findOrFail($id);
        $input = $request->all();
        $item->update($input);

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
