@props(['value'])

<style>

    .text{
        font-weight: bold;
        color: black;
    }
</style>

<label {{ $attributes->merge(['class' => ' text block font-medium text-md text-gray-700']) }}>
    {{ $value ?? $slot }}
</label>
