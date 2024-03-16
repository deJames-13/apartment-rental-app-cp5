@props(['page' => 'app'])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ isset($title) ? $title . ' - ' . config('app.name') : config('app.name') }}</title>

    @livewireStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body id="app" data-theme="dim" class="min-h-screen font-sans antialiased bg-base-200/50 dark:bg-base-200">
    {{ $slot }}

    {{-- Toast --}}
    <x-toast />
    @livewireScripts
</body>


</html>
