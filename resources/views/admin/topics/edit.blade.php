<x-app-layout>
    <div class="py-12">
        <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-2xl font-bold mb-6">Edit {{ $topic->name }}</h1>

            <form action="{{ route('admin.topics.update', $topic->id) }}" method="POST" class="bg-white p-6 rounded-lg shadow-sm">

                @method('PUT')
                @csrf

                <x-form-text-input name="name" label="Name*" placeholder="Name" value="{{ $topic->name }}" />

                <button type="submit" class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-500">Save changes</button>
            </form>
        </div>
    </div>
</x-app-layout>
