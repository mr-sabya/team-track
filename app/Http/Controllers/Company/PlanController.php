<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    //
    public function index()
    {
        $title = 'Plans';
        return view('company.plan.index', compact('title'));
    }

    // appy
    public function apply($planId)
    {
        $title = 'Apply Plan';
        $plan = Plan::findOrFail($planId);
        return view('company.plan.apply', compact('title', 'plan'));
    }
}
