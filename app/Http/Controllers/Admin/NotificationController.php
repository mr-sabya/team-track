<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    
    public function index()
    {
        return view('admin.notification.index');
    }

    // setting
    public function setting()
    {
        return view('admin.notification.setting');
    }
}
