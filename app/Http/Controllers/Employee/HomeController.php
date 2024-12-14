<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //
    public function index()
    {
        $employee =  Auth::user();
        return view('employee.home.index', compact('employee'));
    }

    //
    public function profile()
    {
        $employee =  Auth::user();
        return view('employee.profile.index', compact('employee'));
    }


    // visa
    public function visaInfo()
    {
        $employee = Auth::user();
        return view('employee.profile.visa', compact('employee'));
    }

    // passport
    public function passportInfo()
    {
        $employee = Auth::user();
        return view('employee.profile.passport', compact('employee'));
    }


    // vehicle
    public function vehicleInfo()
    {
        $employee = Auth::user();
        return view('employee.profile.vehicle', compact('employee'));
    }

    // driving-license
    public function DrivingLicense()
    {
        $employee = Auth::user();
        return view('employee.profile.driving-license', compact('employee'));
    }
    
    // Emirates Info
    public function EmiratesInfo()
    {
        $employee = Auth::user();
        return view('employee.profile.emirates', compact('employee'));
    }

    // Insurance Info
    public function InsuranceInfo()
    {
        $employee = Auth::user();
        return view('employee.profile.insurance', compact('employee'));
    }



    // change password
    public function password()
    {
        $employee = Auth::user();
        return view('employee.auth.password', compact('employee'));
    }
}
