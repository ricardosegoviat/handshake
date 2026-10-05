<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1 class="text-2xl font-bold mb-2">{{ $case->title }}</h1>
            <p class="text-sm text-gray-500 mb-6">Maturity level: {{ $case->maturity_level }}</p>
            <p>Organization: {{ $case->organization?->name ?? 'Unassigned' }}</p>
            <p>Consultant: @if($case->user)<a href="{{ route('consultants.show', $case->user) }}" class="underline">{{ $case->user->name }}</a>@else unknown @endif</p>
            <p>Topics: @forelse($case->topics as $topic){{ $topic->name }}@if(!$loop->last), @endif @empty none @endforelse</p>
            <div class="bg-white p-4 rounded shadow">
                <h2 class="font-semibold mb-2">Description</h2>
                <p class="mb-4">{{ $case->description }}</p>

                <h2 class="font-semibold mb-2">Needs</h2>
                <p class="mb-4">{{ $case->needs }}</p>

                <h2 class="font-semibold mb-2">Recommendations</h2>
                <p>{{ $case->recommendations }}</p>
            </div>
        </div>
    </div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-6">
        <div class="bg-white p-6 shadow-sm sm:rounded-lg">
            <h2 class="font-semibold mb-2">Provider matches</h2>
            @forelse($case->matches as $match)
                <div class="mb-4">
                    <p><b>{{ $match->provider->name }}</b> ({{ $match->provider->country }})</p>
                    <p>{{ $match->comment }}</p>
                </div>
            @empty
                <p>No matches for this case yet.</p>
            @endforelse
        </div>
    </div>
</x-app-layout>
