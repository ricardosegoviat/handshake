<x-app-layout>
    <h1>Edit {{ $case->title }}</h1>
    <form action="{{ route('admin.cases.update', $case->id) }}" method="POST">

        @method('PUT')
        @csrf

        <x-form-text-input name="title" label="Title*" placeholder="Title" value="{{ $case->title }}" />

        <div>
            <label for="description">Description*</label><br>
            <textarea name="description" id="description" placeholder="Describe the case">{{ old('description', $case->description) }}</textarea>
            @error('description') <div style="color: red;">{{ $message }}</div> @enderror
        </div>

        <x-form-text-input name="maturity_level" label="Maturity level*" placeholder="basic, developing or advanced" value="{{ $case->maturity_level }}" />

        <div>
            <label for="needs">Needs</label><br>
            <textarea name="needs" id="needs" placeholder="What does the organization need?">{{ old('needs', $case->needs) }}</textarea>
        </div>

        <div>
            <label for="recommendations">Recommendations</label><br>
            <textarea name="recommendations" id="recommendations" placeholder="What do you recommend?">{{ old('recommendations', $case->recommendations) }}</textarea>
        </div>

        <x-form-number-input name="user_id" label="Consultant*" placeholder="User ID" value="{{ $case->user_id }}" />

        <button type="submit">Save changes</button>
    </form>
</x-app-layout>
