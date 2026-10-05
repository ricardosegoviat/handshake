<x-app-layout>
    <div>
        <a href="{{ route('admin.cases.create') }}">Create case</a>
    </div>
    @foreach($cases as $case)
        <div>
            {{ $case->title }} <a href="">edit</a> <a href="">delete</a>
        </div>
    @endforeach
</x-app-layout>
