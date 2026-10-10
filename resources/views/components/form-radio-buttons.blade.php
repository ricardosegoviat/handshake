@props(['name', 'label', 'value' => '', 'options'])

<div class="mb-4 flex flex-col gap-1">
    <span class="text-sm font-semibold text-gray-700">{{ $label }}</span>
    <div class="flex flex-wrap gap-x-5 gap-y-2">
        @foreach($options as $key => $title)
            <label class="flex items-center gap-2 text-sm text-gray-900">
                <input name="{{ $name }}" type="radio" value="{{ $key }}" @checked(old($name, $value) == $key) class="h-4 w-4 accent-indigo-600"> {{ $title }}
            </label>
        @endforeach
    </div>
    @error($name) <div class="text-sm text-red-600">{{ $message }}</div> @enderror
</div>
