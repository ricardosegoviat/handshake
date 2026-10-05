<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1 class="text-2xl font-bold mb-2">{{ $topic->name }}</h1>
            <p class="text-sm text-gray-500 mb-6">{{ $cases->count() }} {{ Str::plural('case', $cases->count()) }}</p>

            @forelse ($cases as $case)
                <div class="bg-white p-4 mb-4 rounded shadow">
                    <h2 class="text-lg font-semibold"><a href="{{ route('cases.show', $case) }}" class="hover:underline">{{ $case->title }}</a></h2>
                    <p class="text-sm text-gray-500">by {{ $case->user?->name ?? 'unknown' }}</p>
                    <p>{{ Str::limit($case->description, 100) }}</p>
                </div>
            @empty
                <p>No cases for this topic yet.</p>
            @endforelse
        </div>
    </div>
</x-app-layout>
