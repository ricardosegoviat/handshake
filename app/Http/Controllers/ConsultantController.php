<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;

class ConsultantController extends Controller
{
    public function index(): View
    {
        $consultants = User::query()
            ->whereHas('cases', fn ($query) => $query->where('is_public', true))
            ->withCount(['cases' => fn ($query) => $query->where('is_public', true)])
            ->orderBy('name')
            ->get();

        return view('consultants.index', compact('consultants'));
    }

    public function show(User $user): View
    {
        $cases = $user->cases()
            ->where('is_public', true)
            ->latest()
            ->get();

        return view('consultants.show', ['consultant' => $user, 'cases' => $cases]);
    }
}
