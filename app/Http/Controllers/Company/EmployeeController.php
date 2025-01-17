<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $title = "Employee";
        return view('company.employee.index', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $title = "Employee";
        return view('company.employee.create', compact('title'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function addBulk()
    {
        //
        $title = "Employee";
        $company = Company::where('id', Auth::user()->company_id)->first();
        return view('company.employee.bulk', compact('title', 'company'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $title = "Employee";
        $employee = User::findOrFail(intval($id));
        return view('company.employee.edit', compact('title', 'employee'));
    }


    // visa
    public function visaInfo($id)
    {
        $employee = User::findOrFail(intval($id));
        return view('company.employee.visa', compact('employee'));
    }

    // passport
    public function passportInfo($id)
    {
        $employee = User::findOrFail(intval($id));
        return view('company.employee.passport', compact('employee'));
    }


    // vehicle
    public function vehicleInfo($id)
    {
        $employee = User::findOrFail(intval($id));
        return view('company.employee.vehicle', compact('employee'));
    }

    // driving-license
    public function DrivingLicense($id)
    {
        $employee = User::findOrFail(intval($id));
        return view('company.employee.driving-license', compact('employee'));
    }

    // Emirates Info
    public function EmiratesInfo($id)
    {
        $employee = User::findOrFail(intval($id));
        return view('company.employee.emirates', compact('employee'));
    }

    // Insurance Info
    public function InsuranceInfo($id)
    {
        $employee = User::findOrFail(intval($id));
        return view('company.employee.insurance', compact('employee'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function extras($id)
    {
        //
        $employee = User::findOrFail(intval($id));
        return view('company.employee.extra', compact('employee'));
    }
    
}
