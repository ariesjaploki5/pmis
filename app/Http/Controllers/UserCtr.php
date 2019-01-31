<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\User;

class UserCtr extends Controller
{
    public function index()
    {
        $users = User::orderBy('employeeid')->paginate(10)->jsonSerialize();

        return response($users, Response::HTTP_OK);
    }

    public function store()
    {
        
    }

    public function update()
    {

    }

    public function destroy()
    {

    }
}
