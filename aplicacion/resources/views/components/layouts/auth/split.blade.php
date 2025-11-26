<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="" data-theme="{{ auth()->check() ? (auth()->user()->theme ?? 'system') : 'system' }}">
<head>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

	<title>Bookbag - @yield('title')</title>

	<!--
	<link rel="icon" href="/logo.png" sizes="any">
	<link rel="icon" href="/logo.png" type="image/svg+xml">
	<link rel="apple-touch-icon" href="/logo.png">
	-->
	<!-- Favicon -->
	<link rel="icon" type="image/x-icon" href="/favicon.ico">
	<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
	<!-- Apple Touch Icons -->
	<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="152x152" href="/apple-touch-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="144x144" href="/apple-touch-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="120x120" href="/apple-touch-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="114x114" href="/apple-touch-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="76x76" href="/apple-touch-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="72x72" href="/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="60x60" href="/apple-touch-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="57x57" href="/apple-touch-icon-57x57.png">
	<!-- Android/Chrome -->
	<link rel="icon" type="image/png" sizes="192x192" href="/android-chrome-192x192.png">
	<link rel="icon" type="image/png" sizes="512x512" href="/android-chrome-512x512.png">
	<!-- Web App Manifest -->
	<link rel="manifest" href="/site.webmanifest">
	<!-- Microsoft Tiles -->
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="/mstile-144x144.png">
	<meta name="msapplication-config" content="/browserconfig.xml">
	<!-- Theme Color -->
	<meta name="theme-color" content="#ffffff">

	<!-- Fonts -->
	<link rel="preconnect" href="https://fonts.bunny.net">
	<link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet"/>

	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	@vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body
	class="min-h-screen h-dvh antialiased bg-gradient-to-bl from-blue-50 to-amber-100 dark:from-blue-950 dark:to-amber-950 py-8 sm:py-20">

@php
	$quotes = [
			['quote' => 'The cheaper the books become, the less money is spent on books.', 'author' => 'George Orwell'],
			['quote' => 'La lectura es a la mente lo que el ejercicio es al cuerpo.', 'author' => 'Joseph Addison'],
			['quote' => 'The best books... are those that tell you what you know already.', 'author' => 'George Orwell'],
			['quote' => 'Leer es como viajar sin la incomodidad del equipaje.', 'author' => 'Emilio Salgari'],
			['quote' => 'Cuantos más libros lees, menos temas te serán ajenos.', 'author' => 'Carlos Ruiz Zafón'],
			['quote' => 'Por leer mucho y dormir poco, su cerebro se secó y se volvió loco.', 'author' => 'Miguel de Cervantes Saavedra'],
			['quote' => 'If you only read the books that everyone else is reading, you can only think what everyone else is thinking.', 'author' => 'Haruki Murakami'],
	];
	$randomQuote = $quotes[array_rand($quotes)];
@endphp

<div class="relative grid flex-col items-center justify-center px-8 sm:px-0 lg:max-w-none lg:px-0">
	<div class="w-full lg:p-8">
		<div class="mx-auto flex w-full flex-col justify-center space-y-6 sm:w-[350px]">
			<a href="{{ route('home') }}" class="z-20 flex items-center justify-center mb-6 transition-opacity hover:opacity-80"
				 wire:navigate>
				<img src="{{ asset('logo.png') }}" alt="Bookbag" class="h-16 w-auto"/>
				<span class="sr-only">Bookbag</span>
			</a>
			{{ $slot }}
		</div>
	</div>
	<div class="relative hidden h-full flex-col p-10 text-white lg:flex mt-12">
		<div class="relative z-20 mt-auto">
			<blockquote class="space-y-3 rounded-lg p-4">
				<flux:heading size="lg" class="leading-relaxed">&ldquo;{{ $randomQuote['quote'] }}&rdquo;</flux:heading>
				<footer>
					<flux:subheading>{{ $randomQuote['author'] }}</flux:subheading>
				</footer>
			</blockquote>
		</div>
	</div>
</div>

@fluxScripts
</body>
</html>
