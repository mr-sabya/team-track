<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InsuranceTypeController extends Controller
{
    //
    public function index()
    {
        $title = "Insurance Type";
        return view('admin.insurance.index', compact('title'));
    }


    public function trash()
    {
        $title = "Insurance Type";
        return view('admin.insurance.trash', compact('title'));
    }
}
