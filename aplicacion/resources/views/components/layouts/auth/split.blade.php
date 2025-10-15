<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-amber-100 antialiased dark:bg-linear-to-b dark:from-neutral-950 dark:to-neutral-900">
        <div class="relative grid h-dvh flex-col items-center justify-center px-8 sm:px-0 lg:max-w-none lg:grid-cols-2 lg:px-0">
            <div class="bg-muted relative hidden h-full flex-col p-10 text-white lg:flex dark:border-e dark:border-neutral-800">
                <div class="absolute inset-0 bg-neutral-900"></div>
                <a href="{{ route('home') }}" class="relative z-20 flex items-center text-4xl font-bold" wire:navigate>
                    <img src="/logo.png" width="200px" alt="Bookgbag logo">
                    Bookbag
                </a>

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

                <div class="relative z-20 mt-auto">
                    <blockquote class="space-y-3 bg-amber-100 rounded-lg p-4">
                        <flux:heading size="lg" class="leading-relaxed">&ldquo;{{ $randomQuote['quote'] }}&rdquo;</flux:heading>
                        <footer><flux:subheading class="text-amber-300">{{ $randomQuote['author'] }}</flux:subheading></footer>
                    </blockquote>
                </div>
            </div>
            <div class="w-full lg:p-8">
                <div class="mx-auto flex w-full flex-col justify-center space-y-6 sm:w-[350px]">
                    <a href="{{ route('home') }}" class="z-20 flex flex-col items-center gap-2 font-medium lg:hidden" wire:navigate>
                        <span class="flex h-9 w-9 items-center justify-center rounded-md">
                            <x-app-logo-icon class="size-9 fill-current text-black dark:text-white" />
                        </span>

                        <span class="sr-only">Bookbag</span>
                    </a>
                    {{ $slot }}
                </div>
            </div>
        </div>
        @fluxScripts
    </body>
</html>
