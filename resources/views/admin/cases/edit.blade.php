<x-app-layout>
    <div class="py-12">
        <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-2xl font-bold mb-6">Edit {{ $case->title }}</h1>

            <form action="{{ route('admin.cases.update', $case->id) }}" method="POST" class="bg-white p-6 rounded-lg shadow-sm">

                @method('PUT')
                @csrf

                <x-form-text-input name="title" label="Title*" placeholder="Title" value="{{ $case->title }}" />

                <x-form-textarea name="description" label="Description*" placeholder="Describe the case" value="{{ $case->description }}" />

                <x-form-text-input name="maturity_level" label="Maturity level*" placeholder="basic, developing or advanced" value="{{ $case->maturity_level }}" />

                <x-form-textarea name="needs" label="Needs" placeholder="What does the organization need?" value="{{ $case->needs }}" />

                <x-form-textarea name="recommendations" label="Recommendations" placeholder="What do you recommend?" value="{{ $case->recommendations }}" />

                <x-form-select name="user_id" label="Consultant*" :options="$consultant_options" value="{{ $case->user_id }}" />

                <x-form-checkboxes name="topics" label="Topics" :values="$case->topics->pluck('id')->toArray()" :options="$topic_options" />

                <button type="submit" class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-500">Save changes</button>
            </form>
        </div>
    </div>
</x-app-layout>
