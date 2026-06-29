<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'iNou') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-gray-50 text-gray-900">
    <div class="flex min-h-screen items-center justify-center px-4 py-12 sm:px-6 lg:px-8">
        <div class="w-full max-w-sm space-y-6 rounded-2xl bg-white p-8 shadow-lg ring-1 ring-gray-200">
            <div class="text-center">
                <p class="text-xs font-semibold uppercase tracking-[0.35em] text-gray-400">magazin</p>
                <h1 class="mt-2 text-4xl font-bold text-gray-900">iNou</h1>
            </div>

            <div class="space-y-3">
                @if (Route::has('login'))
                    <a href="{{ route('login') }}"
                       class="flex w-full items-center justify-center rounded-md bg-indigo-600 px-4 py-3 text-sm font-semibold text-white hover:bg-indigo-500">
                        Login
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                           class="flex w-full items-center justify-center rounded-md border border-gray-300 px-4 py-3 text-sm font-semibold text-gray-700 hover:bg-gray-50">
                            Creaza cont
                        </a>
                    @endif
                @endif
            </div>
        </div>
    </div>
</body>
</html>
