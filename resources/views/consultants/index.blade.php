<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1 class="text-2xl font-bold mb-2">Consultants</h1>
            <p class="mb-6">Everyone who has published a diagnostic case</p>

            @forelse ($consultants as $consultant)
                <div class="bg-white p-4 mb-4 rounded shadow">
                    <h2 class="text-lg font-semibold"><a href="{{ route('consultants.show', $consultant) }}" class="hover:underline">{{ $consultant->name }}</a></h2>
                    <p class="text-sm text-gray-500">{{ $consultant->cases_count }} {{ Str::plural('case', $consultant->cases_count) }}</p>
                </div>
            @empty
                <p>No consultants yet.</p>
            @endforelse
        </div>
    </div>
</x-app-layout>
