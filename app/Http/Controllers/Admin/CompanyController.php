<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // return Company::with('employees')->get();
        $title = "Company";
        $trash = Company::onlyTrashed()->count();
        return view('admin.company.index', compact('title', 'trash'));
    }

    // for trash
    public function trash()
    {
        //
        $title = "Company";
        return view('admin.company.trash', compact('title'));
    }

    // This method is used to fetch the count of trashed users
    public function trashCounter()
    {
        $trashCount = Company::onlyTrashed()->count();

        // Return the count as a JSON response
        return response()->json(['trash_count' => $trashCount]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $title = "Company";
        return view('admin.company.create', compact('title'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $company = Company::findOrFail(intval($id));
        $title = "Company";
        return view('admin.company.edit', compact('company', 'title'));
    }

    // edit basic info  
    public function editBasicInfo($id)
    {
        $company = Company::findOrFail(intval($id));
        $title = "Company";
        return view('admin.company.basic', compact('company', 'title'));
    }

    // attachment
    public function attachment($id)
    {
        $company = Company::findOrFail(intval($id));
        $title = "Company";
        return view('admin.company.attachment', compact('company', 'title'));
    }

    // show
    public function show($id)
    {
        $company = Company::findOrFail(intval($id));
        $title = "Company";
        return view('admin.company.show', compact('company', 'title'));    
    }

}
