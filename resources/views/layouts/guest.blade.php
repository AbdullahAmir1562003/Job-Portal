<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'JobPortal') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-slate-950 text-slate-100 min-h-screen flex flex-col justify-center items-center py-12 sm:px-6 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-md text-center mb-6">
            <a href="/" class="inline-flex items-center gap-2">
                <span class="text-3xl font-black tracking-tight bg-gradient-to-r from-indigo-500 to-cyan-400 bg-clip-text text-transparent">
                    💼 JobPortal
                </span>
            </a>
        </div>

        <div class="w-full sm:max-w-md px-6 py-8 bg-slate-900 border border-slate-800 shadow-2xl rounded-2xl">
            {{ $slot }}
        </div>
    </body>
</html>