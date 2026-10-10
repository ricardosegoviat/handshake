<x-app-layout>
    <h1>Create new topic</h1>
    <form action="{{ route('admin.topics.store') }}" method="POST">

        @csrf

        <x-form-text-input name="name" label="Name*" placeholder="Name" />

        <button type="submit">Create topic</button>
    </form>
</x-app-layout>
