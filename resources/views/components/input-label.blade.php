@props(['value', 'astrick' => false])

<label {{ $attributes->merge(['class' => 'block font-light text-sm  font-medium']) }}>
    {{ $value ?? $slot }}
    @if ($astrick)
        <sup class="text-red-500">*</sup>
    @endif
</label>
