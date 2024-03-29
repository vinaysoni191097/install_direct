@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:border-gray-400 px-4 focus:ring-gray-400 border rounded-lg ']) !!}>
