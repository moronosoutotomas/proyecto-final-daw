<!DOCTYPE html>
<html lang="es" class="">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Bookbag - @yield('title')</title>
	<link rel="icon" href="/logo.png" sizes="any">
	<link rel="icon" href="/logo.png" type="image/svg+xml">
	<link rel="apple-touch-icon" href="/logo.png">
	<link rel="preconnect" href="https://fonts.bunny.net">
	<link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet"/>

	<script src="https://cdn.tailwindcss.com"></script>
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
