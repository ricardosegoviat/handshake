<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1 class="text-2xl font-bold mb-2">{{ $case->title }}</h1>
            <p class="text-sm text-gray-500 mb-6">Maturity level: {{ $case->maturity_level }}</p>

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
</x-app-layout>
