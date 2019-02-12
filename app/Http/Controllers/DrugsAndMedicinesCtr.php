<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\DrugsAndMedicines\Hdmhdr;
use App\Model\DrugsAndMedicines\Hgen;
class DrugsAndMedicinesCtr extends Controller
{
    public function index()
    {
        $all = Hgen::orderBy('gencode')->get();

        return response()->json($all);
    }
}
