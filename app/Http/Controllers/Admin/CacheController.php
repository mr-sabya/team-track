<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CacheController extends Controller
{
    //
    public function index()
    {
        $title = 'Cache Management';
        return view('admin.cache', compact('title'));
    }
}
