<x-app-layout>
    <div>
        <a href="{{ route('admin.topics.create') }}">Create topic</a>
    </div>
    @foreach($topics as $topic)
        <div>
            {{ $topic->name }} <a href="{{ route('admin.topics.edit', $topic->id) }}">edit</a>
            <form action="{{ route('admin.topics.destroy', $topic->id) }}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit">delete</button>
            </form>
        </div>
    @endforeach
</x-app-layout>
