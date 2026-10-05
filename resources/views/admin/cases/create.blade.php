<x-app-layout>
    <h1>Create new case</h1>
    <form action="{{ route('admin.cases.store') }}" method="POST">

        @csrf

        <x-form-text-input name="title" label="Title*" placeholder="Title" />

        <x-form-textarea name="description" label="Description*" placeholder="Describe the case" />

        <x-form-text-input name="maturity_level" label="Maturity level*" placeholder="basic, developing or advanced" />

        <x-form-textarea name="needs" label="Needs" placeholder="What does the organization need?" />

        <x-form-textarea name="recommendations" label="Recommendations" placeholder="What do you recommend?" />

        <button type="submit">Create case</button>
    </form>
</x-app-layout>
