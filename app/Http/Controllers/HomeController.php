<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //

    public function index()
    {
        $user = Auth::user();

        if ($user->is_admin) {
            return view('admin.home.index');
        }

        return view('user.home.index');
    }
}
