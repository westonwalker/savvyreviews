<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body class="">
    <div class="h-screen flex overflow-hidden bg-gray-100">
        @include('layouts.navigation')

        <div class="flex flex-col w-0 flex-1 overflow-hidden">


            <header class="bg-gray-50 p-6">
                {{ $header }}
            </header>
            <main class="bg-white">
                <x-flash></x-flash>
                <div class="max-w-7xl mx-auto">
                    <div class="px-4 sm:px-0">
                        {{ $slot }}
                    </div>
                </div>
            </main>
        </div>
    </div>

    {{-- <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        <!-- Page Heading -->
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>

        <!-- Page Content -->
    </div> --}}
</body>

</html>
