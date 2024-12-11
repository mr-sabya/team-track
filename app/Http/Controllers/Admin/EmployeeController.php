<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('admin.employee.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.employee.create');
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        return view('admin.employee.edit', compact('id'));
    }


    // visa
    public function visaInfo($id)
    {
        return view('admin.employee.visa', compact('id'));
    }
}
