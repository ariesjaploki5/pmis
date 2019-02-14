<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\DrugsAndMedicines\Hdmhdr;
use App\Model\DrugsAndMedicines\Hgen;
use App\Model\DrugsAndMedicines\Hdruggrp;
use App\Model\DrugsAndMedicines\Hroute;
use App\Model\DrugsAndMedicines\Hstre;
use App\Model\DrugsAndMedicines\Cart;
use DB;


class DrugsAndMedicinesCtr extends Controller
{
    public function index()
    {
        $all = Hdmhdr::with(['hdruggrp.hgen', 'hstre', 'hroute'])->orderBy('dmdcomb')->paginate(10);

        return response()->json($all);
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
        ->where('dmdstat', 'A')
        ->where('grpstat', 'A')
        ->where('genstat', 'A')
        ->where('rtestat', 'A')
        ->where('formstat', 'A')
        // ->select(['gendesc', 'formdesc', 'rtedesc', 'dmdrxot', 'dmdnost', 'stredesc'])
        ->get();

        
        return response()->json($dm);
    }


    public function add(Request $request, $dmdcomb, $dmdctr, $user_id)
    {
        

        return reponse()->json();
    }

    public function remove(Request $request, $dmdcomb, $dmdctr, $user_id)
    {
        $dm_remove = Cart::where('dmdcomb', $dmdcomb)->where('dmdctr', $dmdctr)->get();
        
        $dm = $this->cart($user_id);
        return response()->json($dm);
    }

    public function cart($user_id)
    {
        $dm = Cart::hdmhdrs($user_id)->get();

        return $dm;
    }
}
