<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $title = "User";
        return view('admin.user.index', compact('title'));
    }

  
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $user = User::findOrFail(intval($id));
        $title = "User";
        return view('admin.user.edit', compact('user', 'title'));
    }

}
