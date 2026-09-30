<?php

namespace App\Http\Controllers;
use App\Models\DiagnosticCase;

use Illuminate\Http\Request;

class CaseController extends Controller
{
    public function index()
    {
        $cases = DiagnosticCase::where('is_public', true)->get();

        return view('cases.index', ['cases' => $cases]);
    }

public function show(DiagnosticCase $case)
{
    return view('cases.show', ['case' => $case]);
}
}
