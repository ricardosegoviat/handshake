<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DiagnosticCase;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Http\Request;

class CaseController extends Controller
{
    public function index()
    {
        if (auth()->user()->is_admin) {
            $cases = DiagnosticCase::all();
        } else {
            $cases = DiagnosticCase::where('user_id', auth()->id())->get();
        }

        return view('admin.cases.index', compact('cases'));
    }

    public function create()
    {
        $topic_options = Topic::orderBy('name')->pluck('name', 'id')->toArray();

        return view('admin.cases.create', compact('topic_options'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'maturity_level' => ['required', 'string', 'max:255'],
            'topics' => ['nullable', 'array'],
        ]);

        // Create a new case
        $case = DiagnosticCase::create([
            'title' => $request['title'],
            'description' => $request['description'],
            'maturity_level' => $request['maturity_level'],
            'needs' => $request['needs'],
            'recommendations' => $request['recommendations'],
            'user_id' => auth()->id(),
        ]);

        $case->topics()->sync($request['topics'] ?? []);

        return redirect()->route('admin.cases.index');
    }

    public function edit(DiagnosticCase $case)
    {
        if (! $case->canChange(auth()->user())) {
            abort(401);
        }

        $topic_options = Topic::orderBy('name')->pluck('name', 'id')->toArray();
        $consultant_options = User::orderBy('name')->pluck('name', 'id')->toArray();

        return view('admin.cases.edit', compact('case', 'topic_options', 'consultant_options'));
    }

    public function update(Request $request, DiagnosticCase $case)
    {
        if (! $case->canChange(auth()->user())) {
            abort(401);
        }
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'maturity_level' => ['required', 'string', 'max:255'],
            'user_id' => ['required', 'integer', 'exists:users,id'],
            'topics' => ['nullable', 'array'],
        ]);

        $case->update([
            'title' => $request['title'],
            'description' => $request['description'],
            'maturity_level' => $request['maturity_level'],
            'needs' => $request['needs'],
            'recommendations' => $request['recommendations'],
            'user_id' => $request['user_id'],
        ]);

        $case->topics()->sync($request['topics'] ?? []);

        return redirect()->route('admin.cases.index');
    }

    public function destroy(DiagnosticCase $case)
    {
        if (! $case->canChange(auth()->user())) {
            abort(401);
        }
        $case->delete();

        return redirect()->route('admin.cases.index');
    }
}
