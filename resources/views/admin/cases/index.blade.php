<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="flex items-center justify-between mb-6">
                <h1 class="text-2xl font-bold">Case management</h1>
                <a href="{{ route('admin.cases.create') }}" class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-500">Create case</a>
            </div>

            <div class="bg-white rounded-lg shadow-sm divide-y divide-gray-100">
                @foreach($cases as $case)
                    <div class="flex items-center justify-between gap-4 p-4">
                        <span>{{ $case->title }}</span>
                        <div class="flex items-center gap-4 text-sm">
                            <a href="{{ route('admin.cases.edit', $case->id) }}" class="text-indigo-600 hover:underline">edit</a>
                            <form action="{{ route('admin.cases.destroy', $case->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="text-red-600 hover:underline">delete</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
</x-app-layout>
