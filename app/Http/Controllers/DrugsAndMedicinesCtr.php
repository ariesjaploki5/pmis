<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\DrugsAndMedicines\Hdmhdr;
use App\Model\DrugsAndMedicines\Hgen;
use App\Model\DrugsAndMedicines\Hdruggrp;
use App\Model\DrugsAndMedicines\Hroute;
use App\Model\DrugsAndMedicines\Hstre;
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
        ->where('gendesc', 'like', '%' . $search . '%')
        ->orderBy('gendesc')
        ->orderBy('stredesc')
        // ->select(['gendesc', 'formdesc', 'rtedesc', 'dmdrxot', 'dmdnost', 'stredesc'])
        ->get();

        // $dm = Hgen::with('hdruggrps.hdmhdr')->where('gendesc', 'like', '%' . $search . '%')->select('gendesc')->get();
        return response()->json($dm);
    }
}
