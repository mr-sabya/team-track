<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    //
    public function index()
    {
        $title = 'Plan';
        return view('admin.plan.index', compact('title'));
    }

    // company plants
    public function companyPlans()
    {
        $title = 'Company Plans';
        return view('admin.plan.company-plans', compact('title'));
    }
}
