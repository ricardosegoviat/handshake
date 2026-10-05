<x-app-layout>
    <h1>Create new case</h1>
    <form action="{{ route('admin.cases.store') }}" method="POST">

        @csrf

        <div>
            <label for="title">Title</label><br>
            <input type="text" name="title" id="title" placeholder="Title">
        </div>

        <div>
            <label for="description">Description</label><br>
            <textarea name="description" id="description" placeholder="Describe the case"></textarea>
        </div>

        <div>
            <label for="maturity_level">Maturity level</label><br>
            <input type="text" name="maturity_level" id="maturity_level" placeholder="basic, developing or advanced">
        </div>

        <div>
            <label for="needs">Needs</label><br>
            <textarea name="needs" id="needs" placeholder="What does the organization need?"></textarea>
        </div>

        <div>
            <label for="recommendations">Recommendations</label><br>
            <textarea name="recommendations" id="recommendations" placeholder="What do you recommend?"></textarea>
        </div>

        <div>
            <label for="user_id">Consultant</label><br>
            <input type="number" name="user_id" id="user_id" placeholder="User ID" value="1">
        </div>

        <button type="submit">Create case</button>
    </form>
</x-app-layout>
