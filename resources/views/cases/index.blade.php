<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1 class="text-2xl font-bold mb-6">Cases</h1>

            @forelse ($cases as $case)
                <div class="bg-white p-4 mb-4 rounded shadow">
                    <h2 class="text-lg font-semibold"><a href="{{ route('cases.show', $case) }}" class="hover:underline">{{ $case->title }}</a></h2>
                    @if($case->user)
                        <p class="text-sm text-gray-500"><a href="{{ route('consultants.show', $case->user) }}" class="hover:underline">by {{ $case->user->name }}</a></p>
                    @else
                        <p class="text-sm text-gray-500">by unknown</p>
                    @endif
                    <p>{{ $case->description }}</p>
                </div>
            @empty
                <p>No public cases yet.</p>
            @endforelse
        </div>
    </div>
</x-app-layout>
