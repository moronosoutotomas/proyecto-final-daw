<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
	@include('partials.head')
</head>
<body
	class="min-h-screen h-dvh antialiased bg-gradient-to-bl from-blue-50 to-amber-100 dark:from-blue-950 dark:to-amber-950 py-20">

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
			<a href="{{ route('home') }}" class="z-20 flex flex-col items-center gap-2 font-medium lg:hidden"
				 wire:navigate>
                        <span class="flex h-9 w-9 items-center justify-center rounded-md">
                            <img src="{{ asset('logo.png') }}" alt="Bookbag" class="size-9 rounded-md shadow-sm dark:shadow-white/10"/>
                        </span>
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
