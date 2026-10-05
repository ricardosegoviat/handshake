<x-app-layout>
    <div>
        <a href="{{ route('admin.cases.create') }}">Create case</a>
    </div>
    @foreach($cases as $case)
        <div>
            {{ $case->title }} <a href="{{ route('admin.cases.edit', $case->id) }}">edit</a>
            <form action="{{ route('admin.cases.destroy', $case->id) }}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit">delete</button>
            </form>
        </div>
    @endforeach
</x-app-layout>
