@props(['value'])

<label {{ $attributes->merge(['class' => 'bmd-label-static']) }}>
    {{ $value ?? $slot }}
</label>
