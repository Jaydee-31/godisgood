<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
        <title> BlogRealm | @yield('title')</title>
		
		<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
		<link rel="manifest" href="/site.webmanifest">


        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        {{-- <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script> --}}
		
        <!-- Styles -->
		<link href="{{asset('/assets/css/main.css')}}" rel="stylesheet">
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <x-banner />

        <!-- Add the class "bg-pattern" to the div element -->
		<div class="min-h-screen bg-pattern">

			<!-- Include the navigation menu component -->
			@livewire('navigation-menu')

			<!-- Page Heading -->
			@if (isset($header))
				<header class="text-center">
					<div class="max-w-7xl mx-auto pt-4 mt-4 px-4 sm:px-6 lg:px-8">
						{{ $header }}
					</div>
				</header>
			@endif

			<!-- Page Content -->
			<main>
				{{ $slot }}
			</main>
		</div>
		
        @stack('modals')

        @livewireScripts
    </body>
	<script>
		$(document).ready(function() {
			// Submit the search form when the search input field changes
			$('#search-input').on('input', function() {
				$('form#search-form').submit();
			});
		});
	</script>
</html>
