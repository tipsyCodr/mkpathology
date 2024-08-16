@props(['href' => '#'])

<a
    {{ $attributes->merge(['href' => $href, 'class' => 'inline-flex items-center justify-center px-5 py-3 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-primary hover:bg-primary/70 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-primary transition duration-150 ease-in-out']) }}>
    {{ $slot }}
</a>
