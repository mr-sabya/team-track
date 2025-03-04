<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DocumentTypeController extends Controller
{
    public function index()
    {
        $title = "Document Type";
        return view('admin.document-type.index', compact('title'));
    }
}
