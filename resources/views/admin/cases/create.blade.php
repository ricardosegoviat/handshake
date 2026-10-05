<x-app-layout>
    <h1>Create new case</h1>
    <form action="{{ route('admin.cases.store') }}" method="POST">

        @csrf

        <x-form-text-input name="title" label="Title*" placeholder="Title" />

        <div>
            <label for="description">Description*</label><br>
            <textarea name="description" id="description" placeholder="Describe the case">{{ old('description') }}</textarea>
            @error('description') <div style="color: red;">{{ $message }}</div> @enderror
        </div>

        <x-form-text-input name="maturity_level" label="Maturity level*" placeholder="basic, developing or advanced" />

        <div>
            <label for="needs">Needs</label><br>
            <textarea name="needs" id="needs" placeholder="What does the organization need?">{{ old('needs') }}</textarea>
        </div>

        <div>
            <label for="recommendations">Recommendations</label><br>
            <textarea name="recommendations" id="recommendations" placeholder="What do you recommend?">{{ old('recommendations') }}</textarea>
        </div>

        <div>
            <label for="user_id">Consultant*</label><br>
            <input type="number" name="user_id" id="user_id" placeholder="User ID" value="{{ old('user_id') }}">
            @error('user_id') <div style="color: red;">{{ $message }}</div> @enderror
        </div>

        <button type="submit">Create case</button>
    </form>
</x-app-layout>
