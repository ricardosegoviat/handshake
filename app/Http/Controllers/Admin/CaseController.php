<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DiagnosticCase;

class CaseController extends Controller
{
    public function index()
    {
        $cases = DiagnosticCase::all();

        return view('admin.cases.index', compact('cases'));
    }
}
