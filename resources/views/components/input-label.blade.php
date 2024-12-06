@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-dark dark:text-dark']) }}>
    {{ $value ?? $slot }}
</label>
