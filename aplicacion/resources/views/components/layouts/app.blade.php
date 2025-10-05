<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookbag - @yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
@livewire('navigation')

<main>
    {{--    @yield('content')--}}
    {{ $slot }}
</main>

</body>
<!-- Footer si lo necesitas -->
<footer class="bg-white border-t border-gray-200 mt-12">
    <div class="max-w-7xl mx-auto py-6 px-4">
        <p class="text-center text-gray-500 text-sm">
            &copy; {{ date('Y') }} Bookbag. Todos los derechos reservados.
        </p>
    </div>
</footer>
</html>
