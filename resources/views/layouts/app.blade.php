@props(["page" => "app"])

<!DOCTYPE html>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">

	<head>
		<meta charset="utf-8">
		<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, viewport-fit=cover" name="viewport">
		<meta content="{{ csrf_token() }}" name="csrf-token">
		<title>{{ isset($title) ? $title . " - " . config("app.name") : config("app.name") }}</title>

		<livewire:styles />
		@vite(["resources/css/app.css", "resources/js/app.js"])
	</head>

	<body class="min-h-screen bg-base-200/50 font-sans antialiased dark:bg-base-200" data-theme="dim" id="app">
		{{ $slot }}

		{{-- Toast --}}
		<x-toast />
		<livewire:scripts />
	</body>

</html>
