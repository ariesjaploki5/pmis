<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\DrugsAndMedicines\Hdmhdr;
use App\Model\DrugsAndMedicines\Hgen;
use App\Model\DrugsAndMedicines\Hdruggrp;
use App\Model\DrugsAndMedicines\Hroute;
use App\Model\DrugsAndMedicines\Hstre;
use App\Model\Ppmp;
use DB;


class DrugsAndMedicinesCtr extends Controller
{




    public function index($user_id)
    {
        $select = PPMP::where('user_id', $user_id)->where('status', 'preparing')->orderBy('id', 'desc')->first();
        $items = DB::table('hospital_e.j10.pams_ppmps as ppmp')
        ->join('hospital_e.j10.pams_ppmp_drugs_and_medicines as dm', 'ppmp.id', '=', 'dm.ppmp_id')
        ->join('hospital.dbo.hdmhdr as hdmhdr', function($join){
            $join->on('dm.dmdcomb', '=', 'hdmhdr.dmdcomb')->on('dm.dmdctr', '=', 'hdmhdr.dmdctr');
        })->where('ppmp.id', $select->id)->orderBy('dm.id')->get();

        return response()->json($items);

        if($items)
        {
            return response()->json($items);
        } else {
            return response()->json();
        }
        
    }

    public function search(Request $request)
    {
        $search = $request->search;
        // $dm = Hdmhdr::with(['hdruggrp.hgen' => function ($q) use ($search) {
        //     $q->where('gendesc', 'like', '%' . $search . '%');
        // } , 'hroute', 'hstre'])->get();

        $dm = DB::table('hospital.dbo.hdmhdr as hdmhdr')
        ->join('hospital.dbo.hdruggrp as hdruggrp', 'hdmhdr.grpcode', '=', 'hdruggrp.grpcode')
        ->join('hospital.dbo.hgen as hgen', 'hdruggrp.gencode', '=', 'hgen.gencode')
        ->join('hospital.dbo.hform as hform', 'hdmhdr.formcode', '=', 'hform.formcode')
        ->leftjoin('hospital.dbo.hroute as hroute', 'hdmhdr.rtecode', '=', 'hroute.rtecode')
        ->leftjoin('hospital.dbo.hstre as stre', 'hdmhdr.strecode', '=', 'stre.strecode')
        ->where('gendesc', 'like', $search . '%')
        ->orderBy('gendesc')
        ->orderBy('stredesc')
        // ->select(['gendesc', 'formdesc', 'rtedesc', 'dmdrxot', 'dmdnost', 'stredesc'])
        ->get();

        // $dm = Hgen::with('hdruggrps.hdmhdr')->where('gendesc', 'like', '%' . $search . '%')->select('gendesc')->get();
        return response()->json($dm);
    }

    public function add(Request $request, $dmdcomb, $dmdctr, $user_id)
    {
        $select = PPMP::where('user_id', $user_id)->where('status', 'preparing')->orderBy('id', 'desc')->first();


        if(!$select)
        {
            $new = PPMP::create(
                [
                    'user_id' => $user_id,
                    'type' => 'drugs and medicines',
                    'status' => 'preparing'
                ]
            );
        }

        $select = PPMP::where('user_id', $user_id)->where('status', 'preparing')->orderBy('id', 'desc')->first();

        $item = DB::table('hospital_e.j10.pams_ppmp_drugs_and_medicines')->insert([
            'dmdcomb' => $dmdcomb, 'dmdctr' => $dmdctr, 'ppmp_id' => $select->id,
        ]);

        return response()->json($item);

    }

    public function remove(Request $request, $dmdcomb, $dmdctr, $user_id)
    {
        $select = PPMP::where('user_id', $user_id)->where('status', 'preparing')->orderBy('id', 'desc')->first();
        $id = $select->id;
        $item = DB::table('hospital_e.j10.pams_ppmp_drugs_and_medicines')->where('dmdcomb', $dmdcomb)->where('dmdctr', $dmdctr)->where('ppmp_id', $id)->delete();

        return response()->json($item);
    }

    public function my_item(Request $request, $user_id)
    {
        // $id = $this->ppmp_id($user_id);
        
        $select = PPMP::where('user_id', $user_id)->where('status', 'preparing')->orderBy('id', 'desc')->first();

        $items = DB::table('hospital_e.j10.pams_ppmps as ppmp')
        ->join('hospital_e.j10.pams_ppmp_drugs_and_medicines as dm', 'ppmp.id', '=', 'dm.ppmp_id')
        ->join('hospital.dbo.hdmhdr as hdmhdr', function($join){
            $join->on('dm.dmdcomb', '=', 'hdmhdr.dmdcomb')->on('dm.dmdctr', '=', 'hdmhdr.dmdctr');
        })
        ->join('hospital.dbo.hdruggrp as hdruggrp', 'hdmhdr.grpcode', '=', 'hdruggrp.grpcode')
        ->join('hospital.dbo.hgen as hgen', 'hdruggrp.gencode', '=', 'hgen.gencode')
        ->join('hospital.dbo.hform as hform', 'hdmhdr.formcode', '=', 'hform.formcode')
        ->leftjoin('hospital.dbo.hroute as hroute', 'hdmhdr.rtecode', '=', 'hroute.rtecode')
        ->leftjoin('hospital.dbo.hstre as stre', 'hdmhdr.strecode', '=', 'stre.strecode')
        ->where('ppmp.id', $select->id)->orderBy('dm.id')->get();

        if(!$items)
        {
            return response()->json();
        }
        return response()->json($items);
    }

    public function preparing_ppmp($user_id)
    {
        $select = PPMP::where('user_id', $user_id)->where('status', 'preparing')->orderBy('id', 'desc')->first();
        return $select;
    }

    // public function ppmp_id($user_id){
    //     $select = $this->preparing_ppmp($user_id);
    //     $id = $select->id;
    //     return $id;
    // }
}
