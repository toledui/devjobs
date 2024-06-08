@props(['value'])

<label {{ $attributes->merge(['class' => 'block text-sm dark:text-gray-400 text-gray-500 font-bold uppercase mb-2']) }}>
    {{ $value ?? $slot }}
</label>
