<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1 class="text-2xl font-bold mb-2">Topics</h1>
            <p class="mb-6">The topics we use across every diagnostic case</p>

            @forelse ($topics as $topic)
                <div class="bg-white p-4 mb-4 rounded shadow">
                    <h2 class="text-lg font-semibold"><a href="{{ route('topics.show', $topic) }}" class="hover:underline">{{ $topic->name }}</a></h2>
                    <p class="text-sm text-gray-500">{{ $topic->cases_count }} {{ Str::plural('case', $topic->cases_count) }}</p>
                </div>
            @empty
                <p>No topics yet.</p>
            @endforelse
        </div>
    </div>
</x-app-layout>
