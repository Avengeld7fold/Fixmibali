<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-auth-theme="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            :root {
                color-scheme: dark;
            }

            body.guest-body {
                background: #020617;
                color: #e2e8f0;
            }

            .guest-shell {
                background:
                    radial-gradient(720px 420px at 15% 10%, rgba(242, 106, 33, 0.14) 0%, transparent 55%),
                    radial-gradient(560px 360px at 85% 90%, rgba(56, 189, 248, 0.08) 0%, transparent 60%),
                    linear-gradient(180deg, #0b1120 0%, #020617 70%);
            }

            .guest-card {
                background: rgba(15, 23, 42, 0.9);
                border: 1px solid rgba(51, 65, 85, 0.8);
                box-shadow: 0 28px 60px rgba(0, 0, 0, 0.4);
                backdrop-filter: blur(16px);
            }
        </style>
    </head>
    <body class="guest-body font-sans text-slate-100 antialiased">
        <div class="guest-shell min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
            <div>
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-orange-400" />
                </a>
            </div>

            <div class="guest-card w-full sm:max-w-md mt-6 px-6 py-4 overflow-hidden sm:rounded-2xl">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
