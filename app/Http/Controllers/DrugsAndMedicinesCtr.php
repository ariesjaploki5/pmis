<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\DrugsAndMedicines\Hdmhdr;
use App\Model\DrugsAndMedicines\Hgen;
use App\Model\DrugsAndMedicines\Hdruggrp;
use App\Model\DrugsAndMedicines\Hroute;
use App\Model\DrugsAndMedicines\Hstre;
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
        $dm = Hgen::with('hdruggrps.hdmhdrs')->where('gendesc', 'like', '%' . $search . '%')->paginate(10);
        return response()->json($dm);
    }
}
