<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    //

    public function index()
    {
        $title = "Role";
        return view('admin.role.index', compact('title'));    
    }
}
