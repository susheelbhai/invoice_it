<x-layout.guest>
    <x-slot name='head'>
        <link rel="icon" href="{{ asset('images/logo/logo.png') }}">
        {{ $head }}
    </x-slot>

    {{ $slot }}

</x-layout.guest>
