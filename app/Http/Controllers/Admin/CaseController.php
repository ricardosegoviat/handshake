<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DiagnosticCase;
use Illuminate\Http\Request;

class CaseController extends Controller
{
    public function index()
    {
        $cases = DiagnosticCase::all();

        return view('admin.cases.index', compact('cases'));
    }

    public function create()
    {
        return view('admin.cases.create');
    }

    public function store(Request $request)
    {
        // Validate the request (form data)

        // Create a new case
        DiagnosticCase::create([
            'title' => $request['title'],
            'description' => $request['description'],
            'maturity_level' => $request['maturity_level'],
            'needs' => $request['needs'],
            'recommendations' => $request['recommendations'],
            'user_id' => $request['user_id'],
        ]);

        return redirect()->route('admin.cases.index');
    }

    public function edit(DiagnosticCase $case)
    {
        // $case contains the referenced case

        return view('admin.cases.edit', compact('case'));
    }

    public function update(Request $request, DiagnosticCase $case)
    {
        // Validate the request (form data)

        $case->update([
            'title' => $request['title'],
            'description' => $request['description'],
            'maturity_level' => $request['maturity_level'],
            'needs' => $request['needs'],
            'recommendations' => $request['recommendations'],
            'user_id' => $request['user_id'],
        ]);

        return redirect()->route('admin.cases.index');
    }

    public function destroy(DiagnosticCase $case)
    {
        $case->delete();

        return redirect()->route('admin.cases.index');
    }
}
