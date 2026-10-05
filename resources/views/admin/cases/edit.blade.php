<x-app-layout>
    <h1>Edit {{ $case->title }}</h1>
    <form action="{{ route('admin.cases.update', $case->id) }}" method="POST">

        @method('PUT')
        @csrf

        <div>
            <label for="title">Title*</label><br>
            <input type="text" name="title" id="title" placeholder="Title" value="{{ old('title', $case->title) }}">
            @error('title') <div style="color: red;">{{ $message }}</div> @enderror
        </div>

        <div>
            <label for="description">Description*</label><br>
            <textarea name="description" id="description" placeholder="Describe the case">{{ old('description', $case->description) }}</textarea>
            @error('description') <div style="color: red;">{{ $message }}</div> @enderror
        </div>

        <div>
            <label for="maturity_level">Maturity level*</label><br>
            <input type="text" name="maturity_level" id="maturity_level" placeholder="basic, developing or advanced" value="{{ old('maturity_level', $case->maturity_level) }}">
            @error('maturity_level') <div style="color: red;">{{ $message }}</div> @enderror
        </div>

        <div>
            <label for="needs">Needs</label><br>
            <textarea name="needs" id="needs" placeholder="What does the organization need?">{{ old('needs', $case->needs) }}</textarea>
        </div>

        <div>
            <label for="recommendations">Recommendations</label><br>
            <textarea name="recommendations" id="recommendations" placeholder="What do you recommend?">{{ old('recommendations', $case->recommendations) }}</textarea>
        </div>

        <div>
            <label for="user_id">Consultant*</label><br>
            <input type="number" name="user_id" id="user_id" placeholder="User ID" value="{{ old('user_id', $case->user_id) }}">
            @error('user_id') <div style="color: red;">{{ $message }}</div> @enderror
        </div>

        <button type="submit">Save changes</button>
    </form>
</x-app-layout>
