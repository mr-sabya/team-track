<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    //
    public function index()
    {
        $title = "Permission";
        return view('admin.permission.index', compact('title'));    
    }
}
