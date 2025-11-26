<!DOCTYPE html>
<html lang="es" class="" data-theme="{{ auth()->check() ? (auth()->user()->theme ?? 'system') : 'system' }}">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

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

	<!-- <script src="https://cdn.tailwindcss.com"></script> -->
	@vite(['resources/css/app.css', 'resources/js/app.js'])

	<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
	<script defer src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
@livewire('navigation')

<main>
	{{ $slot }}
</main>

<footer class="bg-gray-50 border-gray-200 text-gray-900 dark:bg-gray-900 dark:border-gray-700 dark:text-white">
	<div class="max-w-7xl mx-auto py-14 px-4">
		<p class="text-center text-gray-500 text-sm">
			Bookbag &copy; {{ date('Y') }} - Tódo-los dereitos reservados.
		</p>
	</div>
</footer>

<script>
	document.addEventListener('DOMContentLoaded', function () {
		const forms = document.querySelectorAll('.delete-form');

		forms.forEach(form => {
			form.addEventListener('submit', (e) => {
				e.preventDefault();

				Swal.fire({
					title: "Estás seguro?",
					theme: 'auto',
					text: "Esta acción é irreversível",
					icon: "warning",
					showCancelButton: true,
					confirmButtonColor: "#d33",
					cancelButtonColor: "#3085d6",
					confirmButtonText: "Sí, eliminar",
					cancelButtonText: "Cancelar"
				}).then((result) => {
					if (result.isConfirmed) {
						form.submit();
					}
				});
			});
		});
	});

	// TODO: toggle modal form para reseñas
</script>
</body>
</html>
