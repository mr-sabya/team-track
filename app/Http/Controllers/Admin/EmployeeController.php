<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $title = "Employee";
        return view('admin.employee.index', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $title = "Employee";
        return view('admin.employee.create', compact('title'));
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $title = "Employee";
        $employee = User::findOrFail(intval($id));
        return view('admin.employee.edit', compact('title', 'employee'));
    }


    // visa
    public function visaInfo($id)
    {
        $employee = User::findOrFail(intval($id));
        return view('admin.employee.visa', compact('employee'));
    }

    // visa
    public function passportInfo($id)
    {
        $employee = User::findOrFail(intval($id));
        return view('admin.employee.passport', compact('employee'));
    }
}
