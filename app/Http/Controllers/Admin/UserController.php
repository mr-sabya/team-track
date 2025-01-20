<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $title = "User";
        $trash = User::where(function ($query) {
            $query->where('is_admin', 1)
                ->orWhere('is_company', 1);
        })
            ->onlyTrashed() // Only consider trashed users
            ->count();
        return view('admin.user.index', compact('title', 'trash'));
    }

    // for trash
    public function trash()
    {
        //
        $title = "User";

        return view('admin.user.trash', compact('title'));
    }

    // This method is used to fetch the count of trashed users
    public function trashCounter()
    {
        $trashCount = User::where(function ($query) {
            $query->where('is_admin', 1)
                ->orWhere('is_company', 1);
        })
            ->onlyTrashed()  // This ensures we only count soft-deleted users
            ->count();

        // Return the count as a JSON response
        return response()->json(['trash_count' => $trashCount]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $user = User::findOrFail(intval($id));
        $title = "User";
        return view('admin.user.edit', compact('user', 'title'));
    }
}
