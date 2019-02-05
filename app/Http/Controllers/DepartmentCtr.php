<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Model\Department;

class DepartmentCtr extends Controller
{
    public function index()
    {
        $departments = Department::with('division')->orderBy('id')->paginate(100)->jsonSerialize();
        return response($departments, Response::HTTP_OK);
    }

    public function all()
    {
        $departments = Department::with('division')->orderBy('id')->get()->jsonSerialize();

        return response($departments, Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $department = Department::create($input);
        
        return response($department, Response::HTTP_CREATED);
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        $department = Department::findOrFail($id);
        $department->update($input);
        
        return response($department, Response::HTTP_CREATED);
    }

    public function destroy()
    {

    }
}
