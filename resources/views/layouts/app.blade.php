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
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

        <!-- Styles -->
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

		<!-- Add the CSS code to a CSS file or the head section of the HTML document -->
		<style>
			@media (prefers-color-scheme: light) {
				body {
					background-color: #f9f9f9;
				}

				.bg-pattern {
					background-color: #fff;
					background-image: linear-gradient(to bottom left, #ffffff, #f6f6f6, #ffffff);
				}

			}

			@media (prefers-color-scheme: dark) {
				body {
					background-color: #1a202c;
				}

				.bg-pattern {
					background-color: rgb(54, 83, 20);
					background-image: radial-gradient(at 5% 89%, rgb(17, 24, 39) 0, transparent 100%), radial-gradient(at 100% 100%, rgb(15, 23, 42) 0, transparent 100%), radial-gradient(at 100% 0%, rgb(15, 23, 42) 0, transparent 49%), radial-gradient(at 84% 17%, rgb(12, 74, 110) 0, transparent 26%), radial-gradient(at 17% 15%, rgb(15, 23, 42) 0, transparent 100%), radial-gradient(at 85% 15%, rgb(88, 28, 135) 0, transparent 42%), radial-gradient(at 80% 45%, rgb(0, 0, 0) 0, transparent 100%);
				}
		}
		</style>


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
