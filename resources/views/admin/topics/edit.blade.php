<x-app-layout>
    <h1>Edit {{ $topic->name }}</h1>
    <form action="{{ route('admin.topics.update', $topic->id) }}" method="POST">

        @method('PUT')
        @csrf

        <x-form-text-input name="name" label="Name*" placeholder="Name" value="{{ $topic->name }}" />

        <button type="submit">Save changes</button>
    </form>
</x-app-layout>
