<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

            <div>
                <h1 class="text-2xl font-bold mb-1">{{ $case->title }}</h1>
                <p class="text-sm text-gray-500">Maturity level: {{ $case->maturity_level }}</p>
            </div>

            <div class="space-y-1 text-sm text-gray-700">
                <p>Organization: {{ $case->organization?->name ?? 'Unassigned' }}</p>
                <p>Consultant: @if($case->user)<a href="{{ route('consultants.show', $case->user) }}" class="underline">{{ $case->user->name }}</a>@else unknown @endif</p>
                <p>Topics: @forelse($case->topics as $topic)<a href="{{ route('topics.show', $topic) }}" class="underline">{{ $topic->name }}</a>@if(!$loop->last), @endif @empty none @endforelse</p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-sm space-y-6">
                <div>
                    <h2 class="font-semibold mb-2">Description</h2>
                    <p>{{ $case->description }}</p>
                </div>

                <div>
                    <h2 class="font-semibold mb-2">Needs</h2>
                    <p>{{ $case->needs }}</p>
                </div>

                <div>
                    <h2 class="font-semibold mb-2">Recommendations</h2>
                    <p>{{ $case->recommendations }}</p>
                </div>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-sm">
                <h2 class="font-semibold mb-4">Provider matches</h2>
                @forelse($case->matches as $match)
                    <div class="mb-4 last:mb-0">
                        <p><b>{{ $match->provider->name }}</b> ({{ $match->provider->country }})</p>
                        <p class="text-gray-700">{{ $match->comment }}</p>
                    </div>
                @empty
                    <p>No matches for this case yet.</p>
                @endforelse
            </div>

        </div>
    </div>
</x-app-layout>
