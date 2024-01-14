<x-layout.app>
    <x-slot name='head'>
        <link rel="icon" href="{{ asset('images/logo/logo.png') }}">
        {{ $head }}
        @livewireStyles
    </x-slot>

    <x-slot name='header_profile_li'>
        @relativeInclude('header_profile_li')
    </x-slot>
    <form id="logout_form" action="{{ route('logout') }}" method="post">
        @csrf
    </form>

    <x-slot name='sidebar'>
        @relativeInclude('sidebar')
    </x-slot>

    {{ $slot }}


    <script>
        function logoutSubmit() {
            document.getElementById('logout_form').submit();
        }
    </script>
@livewireScripts
</x-layout.app>
