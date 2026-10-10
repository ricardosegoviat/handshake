<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    public function index()
    {
        $topics = Topic::orderBy('name')->get();

        return view('admin.topics.index', compact('topics'));
    }

    public function create()
    {
        return view('admin.topics.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        Topic::create([
            'name' => $request['name'],
        ]);

        return redirect()->route('admin.topics.index');
    }

    public function edit(Topic $topic)
    {
        return view('admin.topics.edit', compact('topic'));
    }

    public function update(Request $request, Topic $topic)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $topic->update([
            'name' => $request['name'],
        ]);

        return redirect()->route('admin.topics.index');
    }

    public function destroy(Topic $topic)
    {
        $topic->delete();

        return redirect()->route('admin.topics.index');
    }
}
