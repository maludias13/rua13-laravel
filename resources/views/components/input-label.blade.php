@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-roboto-regular font-medium text-sm text-black']) }}>
    {{ $value ?? $slot }}
</label>
