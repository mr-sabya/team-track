<?php

namespace App\Http\Controllers\Admin;

use App\Exports\UserDataExport;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $title = "Employee";
        return view('admin.employee.index', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $title = "Employee";
        return view('admin.employee.create', compact('title'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function addBulk()
    {
        //
        $title = "Employee";
        return view('admin.employee.bulk', compact('title'));
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $title = "Employee";
        $employee = User::findOrFail(intval($id));
        return view('admin.employee.edit', compact('title', 'employee'));
    }


    // visa
    public function visaInfo($id)
    {
        $employee = User::findOrFail(intval($id));
        return view('admin.employee.visa', compact('employee'));
    }

    // passport
    public function passportInfo($id)
    {
        $employee = User::findOrFail(intval($id));
        return view('admin.employee.passport', compact('employee'));
    }


    // vehicle
    public function vehicleInfo($id)
    {
        $employee = User::findOrFail(intval($id));
        return view('admin.employee.vehicle', compact('employee'));
    }

    // driving-license
    public function DrivingLicense($id)
    {
        $employee = User::findOrFail(intval($id));
        return view('admin.employee.driving-license', compact('employee'));
    }
    
    // Emirates Info
    public function EmiratesInfo($id)
    {
        $employee = User::findOrFail(intval($id));
        return view('admin.employee.emirates', compact('employee'));
    }

    // Insurance Info
    public function InsuranceInfo($id)
    {
        $employee = User::findOrFail(intval($id));
        return view('admin.employee.insurance', compact('employee'));
    }

    // Insurance Info
    public function extras($id)
    {
        $employee = User::findOrFail(intval($id));
        return view('admin.employee.extra', compact('employee'));
    }


    // download demo excel data
    public function demoExcelData()
    {
        return Excel::download(new UserDataExport, 'user_data.xlsx');
    }

    // download demo csv file
    public function demoCSVData()
    {
        return Excel::download(new UserDataExport, 'user_data.csv', \Maatwebsite\Excel\Excel::CSV);
    }
}
