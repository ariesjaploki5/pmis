<?php

namespace App\Http\Controllers\PPMP;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Model\PPMP\IctSupply;
use App\Model\Ppmp;

class IctSupplyCtr extends Controller
{
    public function index()
    {
        $ppmps = Ppmp::with('ict_supplies')->orderBy('id', 'desc')->get();

        return response()->json($ppmps);
    }

    public function store(Request $request, $id)
    {

        $ppmp = Ppmp::create([
            'user_id' => $id,
            'type' => 'ict supplies',
        ]);

        $count = count($request->items);

        for($i = 0; $i < $count; $i++)
        {
            $estimated_cost = $request->items[$i]['cost_per_unit'] * $request->items[$i]['quantity'];
            $ppmp = IctSupply::create([
                'description' => $request->items[$i]['description'],
                'specification' => $request->items[$i]['specification'],
                'cost_per_unit' => $request->items[$i]['cost_per_unit'],
                'quantity' => $request->items[$i]['quantity'],
                'estimated_cost' => $estimated_cost,
                'ppmp_id' => $ppmp->id,
                'status' => 'pending',
            ]);
        }
        

        return response()->json();
    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {
        
    }
}
