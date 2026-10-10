@props(['name', 'label', 'placeholder' => '', 'value' => ''])

<div class="mb-4 flex flex-col gap-1">
    <label for="{{ $name }}" class="text-sm font-semibold text-gray-700">{{ $label }}</label>
    <textarea
        name="{{ $name }}"
        id="{{ $name }}"
        placeholder="{{ $placeholder }}"
        rows="5"
        class="w-full rounded-md border border-gray-300 px-3 py-2 text-sm text-gray-900 placeholder:text-gray-400 focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500"
    >{{ old($name, $value) }}</textarea>
    @error($name) <div class="text-sm text-red-600">{{ $message }}</div> @enderror
</div>
