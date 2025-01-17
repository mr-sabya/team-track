<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    //
    public function index()
    {
        $company = Company::findOrFail(intval(Auth::user()->company_id));
        $title = "Company";
        return view('company.profile.index', compact('company', 'title'));
    }

    // edit basic info  
    public function editBasicInfo()
    {
        $company = Company::findOrFail(intval(Auth::user()->company_id));
        $title = "Company";
        return view('company.profile.basic', compact('company', 'title'));
    }

    // attachment
    public function attachment()
    {
        $company = Company::findOrFail(intval(Auth::user()->company_id));
        $title = "Company";
        return view('company.profile.attachment', compact('company', 'title'));
    }
}
