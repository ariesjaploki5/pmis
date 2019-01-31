<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Model\Employee;

class EmployeeCtr extends Controller
{
    public function index()
    {
        $employees = Employee::orderBy('employeeid')->paginate(75)->jsonSerialize();
        return response($employees, Response::HTTP_OK);
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
