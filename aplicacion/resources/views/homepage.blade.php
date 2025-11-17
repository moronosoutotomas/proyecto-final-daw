<x-layouts.app>

	@section('title', 'Inicio')

	<!-- title -->
	<div class="min-h-screen bg-gradient-to-bl from-blue-50 to-amber-100 dark:from-blue-950 dark:to-amber-950 py-12">
		<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
			<div class="text-center py-16 space-y-10">
				<h1 class="text-3xl sm:text-4xl md:text-6xl font-bold text-gray-900 dark:text-white mb-6">
					Benvido a <span class="text-amber-600">Bookbag</span>
				</h1>
				<p class="text-xl text-gray-600 dark:text-gray-300 mb-8 max-w-2xl mx-auto">
					atopa e rexistra as túas lecturas
				</p>
				<div class="flex flex-col sm:flex-row gap-4 justify-center">
					<a href="{{ route('books.index') }}"
						 class="bg-amber-600 hover:bg-amber-700 text-white px-8 py-3 rounded-lg font-medium transition duration-300 transform hover:scale-105">
						Explorar libros
					</a>
					<a href="{{ route('about') }}"
						 class="border border-amber-600 text-amber-600 hover:bg-amber-600 hover:text-white px-8 py-3 rounded-lg font-medium transition duration-300">
						Coñece máis
					</a>
				</div>

				<!-- card plan premium -->
				<div
					class="mx-auto max-w-3xl rounded-2xl border border-gray-200 bg-white p-4 sm:p-6 text-left shadow-sm dark:border-gray-700 dark:bg-gray-900">
					<p class="text-sm font-medium text-amber-600 dark:text-amber-400">
						Premium para lectoras e lectores que queren un chisquiño máis
					</p>
					<h2 class="mt-2 text-2xl font-semibold text-gray-900 dark:text-white">
						Organiza mellor as túas lecturas
					</h2>
					<p class="mt-3 text-base text-gray-600 dark:text-gray-300">
						Acceso opcional cun período de proba. Non buscamos algo xigante, só engadir ferramentas útiles:
					</p>
					<ul class="mt-4 list-disc space-y-2 ps-5 text-sm text-gray-600 dark:text-gray-300" id="plans">
						<li>Sen límite de andeis.</li>
						<li>Andeis personalizados para organizar as túas lecturas.</li>
						<li>Resumo mensual coas lecturas e xéneros que máis che gustan.</li>
					</ul>
					<div class="mt-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:gap-4">
						<a href="{{ route('register') }}"
							 class="inline-flex items-center justify-center gap-2 rounded-lg bg-amber-600 px-6 py-2.5 text-sm font-semibold text-white transition hover:bg-amber-700 focus:outline-none focus-visible:ring-2 focus-visible:ring-amber-500 focus-visible:ring-offset-2 focus-visible:ring-offset-white dark:focus-visible:ring-offset-gray-900">
							<flux:icon.sparkles class="h-5 w-5"/>
							Probar 14 días gratis
						</a>
						<a href="{{ route('about') }}"
							 class="text-sm font-medium text-amber-600 transition hover:text-amber-500 dark:text-amber-400 dark:hover:text-amber-300">
							Quero saber máis
						</a>
					</div>
				</div>
			</div>
		</div>

		<!-- descripcion plan premium -->
		<div class="mx-auto mt-16 max-w-5xl px-4 sm:px-6 lg:px-8">
			<div
				class="rounded-2xl border border-gray-200 bg-white p-4 sm:p-8 shadow-sm dark:border-gray-700 dark:bg-gray-900">
				<div class="flex flex-col gap-6 md:flex-row md:items-center md:justify-between">
					<div class="text-left">
						<h2 class="text-2xl font-semibold text-gray-900 dark:text-white">Plan sinxelo, sen letra pequena</h2>
						<p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
							Premium custa 6€/mes. Podes cancelalo cando queiras e seguirás vendo as túas lecturas gardadas.
						</p>
					</div>
					<div class="flex flex-col items-start gap-3 md:items-end">
						<a href="{{ route('register') }}"
							 class="inline-flex items-center gap-2 rounded-lg border border-amber-600 px-5 py-2.5 text-sm font-semibold text-amber-600 transition hover:bg-amber-50 dark:hover:bg-amber-500/10">
							<flux:icon.arrow-right class="h-4 w-4"/>
							Ver opcións de pago
						</a>
						<p class="text-xs text-gray-500 dark:text-gray-400">Os primeiros 14 días non se cobran.</p>
					</div>
				</div>
			</div>
		</div>

		<!-- testimonio -->
		<div class="mx-auto mt-16 max-w-5xl px-4 sm:px-6 lg:px-8">
			<div class="overflow-hidden rounded-2xl border border-gray-200 bg-white p-4 sm:p-8 shadow-sm dark:border-gray-700 dark:bg-gray-900">
				<figure class="space-y-6 text-left">
					<blockquote class="text-base text-gray-600 dark:text-gray-300">
						“Uso Bookbag Premium para levar un seguimento do que vou lendo. Gústame a función de engadir andeis para ordenar mellor as miñas lecturas,
						e a miudo o resumo mensual descóbreme libros que engado a Pendentes.”
					</blockquote>
					<figcaption class="flex items-center gap-4">
						<div class="flex h-12 w-12 items-center justify-center rounded-full bg-amber-100 text-sm font-semibold text-amber-700 dark:bg-amber-500/20 dark:text-amber-200">
							TI
						</div>
						<div>
							<p class="text-sm font-semibold text-gray-900 dark:text-white">Tipo de incógnito</p>
							<p class="text-xs text-gray-500 dark:text-gray-400">Lector premium dende 2025</p>
						</div>
					</figcaption>
				</figure>
			</div>
		</div>

	</div>

</x-layouts.app>
