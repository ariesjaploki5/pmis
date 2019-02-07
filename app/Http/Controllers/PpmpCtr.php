<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Ppmp;

class PpmpCtr extends Controller
{
    public function index(){

    }

    public function store(Request $request)
    {
        $count = count($request->rows);
       
        foreach($request->rows as $row){
            $ppmp = Ppmp::create(

            );
        }
           
    }
        


}
