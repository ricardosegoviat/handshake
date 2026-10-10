<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="flex items-center justify-between mb-6">
                <h1 class="text-2xl font-bold">Topic management</h1>
                <a href="{{ route('admin.topics.create') }}" class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-500">Create topic</a>
            </div>

            <div class="bg-white rounded-lg shadow-sm divide-y divide-gray-100">
                @foreach($topics as $topic)
                    <div class="flex items-center justify-between gap-4 p-4">
                        <span>{{ $topic->name }}</span>
                        <div class="flex items-center gap-4 text-sm">
                            <a href="{{ route('admin.topics.edit', $topic->id) }}" class="text-indigo-600 hover:underline">edit</a>
                            <form action="{{ route('admin.topics.destroy', $topic->id) }}" method="POST">
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
