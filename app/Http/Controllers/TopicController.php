<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Contracts\View\View;

class TopicController extends Controller
{
    public function index(): View
    {
        $topics = Topic::query()
            ->withCount(['cases' => fn ($query) => $query->where('is_public', true)])
            ->orderBy('name')
            ->get();

        return view('topics.index', compact('topics'));
    }

    public function show(Topic $topic): View
    {
        $cases = $topic->cases()
            ->where('is_public', true)
            ->with('user')
            ->latest()
            ->get();

        return view('topics.show', compact('topic', 'cases'));
    }
}
