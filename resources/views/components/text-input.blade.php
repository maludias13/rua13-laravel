@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'w-full bg-[#E6E7EB] rounded-lg px-2 py-3 focus:border-none focus:ring-0 font-roboto-slab']) }}>