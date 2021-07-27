@props(['disabled' => false])

<style>

    .back{
        border-color: #bc264f;
        background-color: white;
    }
</style>

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => ' back rounded-sm shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50']) !!}>
