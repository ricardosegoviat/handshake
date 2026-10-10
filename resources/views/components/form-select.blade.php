@props(['name', 'label', 'value' => '', 'options'])

<div class="mb-4 flex flex-col gap-1">
    <label for="{{ $name }}" class="text-sm font-semibold text-gray-700">{{ $label }}</label>
    <select
        name="{{ $name }}"
        id="{{ $name }}"
        class="w-full rounded-md border border-gray-300 px-3 py-2 text-sm text-gray-900 focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500"
    >
        @foreach($options as $key => $title)
            <option value="{{ $key }}" @selected(old($name, $value) == $key)>{{ $title }}</option>
        @endforeach
    </select>
    @error($name) <div class="text-sm text-red-600">{{ $message }}</div> @enderror
</div>
