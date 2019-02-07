<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\User;

class UserCtr extends Controller
{
    public function index()
    {
        $users = User::with('employee', 'access_level')->orderBy('employee_id')->paginate(10)->jsonSerialize();

        return response($users, Response::HTTP_OK);
    }

    public function store()
    {
        
    }   

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());

        return response()->json($user);
    }

    public function destroy()
    {

    }
}
