<x-app-layout>
    @foreach($cases as $case)
        <div>
            {{ $case->title }} <a href="">edit</a> <a href="">delete</a>
        </div>
    @endforeach
</x-app-layout>
