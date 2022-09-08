<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
        @stack('styles')
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 sm:flex">
            <section class="hidden grow bg-white md:block md:w-2/12 2xl:w-1/12">
                @livewire('layouts.side-navigation')
            </section>
            <div class="md:w-10/12 2xl:w-11/12">
                @include('layouts.navigation')

                <!-- Page Content -->
                <main>
                    <div>
                        {{ $slot }}
                    </div>
                </main>
            </div>
        </div>


        @livewireScripts
        @stack('scripts')
        {{-- @livewire('livewire-ui-modal') --}}
    </body>
</html>
