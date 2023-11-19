<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main class="max-w-5xl mx-auto mt-8 px-0 md:px-4">
                {{ $slot }}
            </main>
        </div>
        <button onclick="Livewire.dispatch('openModal', { component: { component: {component: 'create-post-modal'} } })"
        class="md:hidden fixed right-2 bottom-20 w-10 h-10 rounded-full bg-gray-900 flex justify-content-center items-center sm:z-10">
        <i class="bx bx-plus text-3xl text-white ms-1"></i>
        </button>


        @auth
        <div class="md:hidden fixed bottom-0 left-0 w-full flex flex-row justify-center space-x-3 items-center bg-white p-3">
            <a href="{{route('home_page')}}" class="grow text-center">
                {!! url()->current() == route('home_page') ?
                    '<i class="bx bxs-home-alt-2 text-2xl"></i>'
                    :'<i class="bx bx-home-alt-2 text-2xl"></i>'
                !!}
            </a>
            <a href="{{route('explore')}}" class="grow text-center">
                {!! url()->current() == route('explore') ?
                    '<i class="bx bxs-compass text-2xl"></i>'
                    :'<i class="bx bx-compass text-2xl"></i>'
                !!}
            </a>
            <a href="/{{auth()->user()->username}}" class="grow text-center">
                {!! url()->current() == '/{{auth()->user()->username}}' ?
                    '<i class="bx bx-user text-2xl h-10 w-10 rounded-full text-white"></i>'
                    :'<i class="bx bx-user text-2xl"></i>'
                !!}
            </a>
        </div>
    @endauth

    <!-- Before the closing </body> tag -->
@livewireScripts

    @livewire('wire-elements-modal')
    <script defer src="https://unpkg.com/@alpinejs/focus@3.x.x/dist/cdn.min.js"></script>
    </body>
</html>
