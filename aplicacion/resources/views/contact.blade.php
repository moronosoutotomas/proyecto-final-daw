<x-layouts.app>

	@section('title', 'Contacto')

	<div
		class="min-h-screen bg-gradient-to-bl from-blue-50 to-amber-100 dark:bg-gradient-to-bl dark:from-amber-950 dark:to-blue-950 dark:bg-gray-900 py-12 px-4 sm:px-6 lg:px-8">
		<div class="max-w-4xl mx-auto">
			<!-- encabezado -->
			<div class="text-center mb-12">
				<h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">Contáctanos</h1>
				<p class="text-lg text-gray-600 dark:text-gray-400 max-w-2xl mx-auto">
					¿Tes algunha pregunta, suxerencia ou precisas ayuda? Estaremos encantades de axudarte.
				</p>
			</div>

			<div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
				<!-- form de contacto -->
				<div
					class="border shadow dark:shadow-gray-900 dark:text-gray-400 rounded-lg p-6 bg-gray-50 dark:bg-gray-800 border-gray-200 dark:border-gray-700">
					<h2 class="text-xl font-semibold text-gray-800 dark:text-white mb-6">Envíanos unha mensaxe</h2>

					<form action="#" method="POST" class="space-y-6">
						@csrf

						<!-- nombre -->
						<div>
							<label for="name" class="block text-sm font-medium text-gray-700 dark:text-white mb-2">
								Nome completo *
							</label>
							<input
								type="text"
								id="name"
								name="name"
								required
								class="w-full px-3 py-2 border border-gray-300 rounded-md dark:bg-amber-900/10 dark:border-gray-700 dark:text-gray-400-sm focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition duration-300"
								placeholder="Seu nome">
						</div>

						<!-- email -->
						<div>
							<label for="email" class="block text-sm font-medium text-gray-700 dark:text-white mb-2">
								Enderezo electrónico *
							</label>
							<input
								type="email"
								id="email"
								name="email"
								required
								class="w-full px-3 py-2 border border-gray-300 rounded-md dark:border-gray-700 dark:bg-amber-900/10 dark:text-gray-400-sm focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition duration-300"
								placeholder="seu@enderezo.com">
						</div>

						<!-- asunto -->
						<div>
							<label for="subject"
										 class="block text-sm font-medium text-gray-700 dark:text-white mb-2">
								Asunto *
							</label>
							<select
								id="subject"
								name="subject"
								required
								class="w-full px-3 py-2 border border-gray-300 rounded-md dark:border-gray-700 bg-white dark:bg-amber-900/10 dark:text-gray-400-sm focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition duration-300 [&>option]:bg-white [&>option]:dark:bg-gray-800 [&>option]:text-gray-900 [&>option]:dark:text-gray-300">
								<option value="">Selecciona un asunto</option>
								<option value="support">Soporte técnico</option>
								<option value="suggestion">Suxerencia</option>
								<option value="partnership">Colaboración</option>
								<option value="other">Outro</option>
							</select>
						</div>

						<!-- mensaje -->
						<div>
							<label for="message"
										 class="block text-sm font-medium text-gray-700 dark:text-white mb-2">
								Mensaxe *
							</label>
							<textarea
								id="message"
								name="message"
								rows="5"
								required
								class="w-full px-3 py-2 border border-gray-300 rounded-md dark:border-gray-700 dark:bg-amber-900/10 dark:text-gray-400-sm focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition duration-300"
								placeholder="Escribe a túa mensaxe aquí..."></textarea>
						</div>

						<!-- boton enviar -->
						<div>
							<button
								type="submit"
								class="w-full bg-amber-600 hover:bg-amber-700 text-white font-medium py-3 px-4 rounded-md duration-300 ease-in-out focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2">
								Enviar mensaxe
							</button>
						</div>
					</form>
				</div>

				<!-- información de contacto -->
				<div class="space-y-6">
					<!-- informacion general -->
					<div
						class="border shadow dark:shadow-gray-900 dark:text-white rounded-lg p-6  bg-gray-50 dark:bg-gray-800 border-gray-200 dark:border-gray-700">
						<h2 class="text-xl font-semibold text-gray-800 dark:text-white mb-4">
							Información de contacto
						</h2>

						<div class="space-y-4">
							<!-- email -->
							<div class="flex items-start">
								<div class="flex-shrink-0">
									<flux:icon.envelope class="h-6 w-6 text-amber-600" fill="none" viewBox="0 0 24 24"/>
								</div>
								<div class="ml-3">
									<h3 class="text-sm font-medium text-gray-900 dark:text-white">Email</h3>
									<p class="text-sm text-gray-400">contacto@bookbag.com</p>
									<p class="text-sm text-gray-400">soporte@bookbag.com</p>
								</div>
							</div>

							<!-- telefono -->
							<div class="flex items-start">
								<div class="flex-shrink-0">
									<flux:icon.phone class="h-6 w-6 text-amber-600" fill="none" viewBox="0 0 24 24"/>
								</div>
								<div class="ml-3">
									<h3 class="text-sm font-medium text-gray-900 dark:text-white">Teléfono</h3>
									<p class="text-sm  text-gray-400">+34 123 45 67 89</p>
								</div>
							</div>

							<!-- direccion -->
							<div class="flex items-start">
								<div class="flex-shrink-0">
									<flux:icon.map-pin class="h-6 w-6 text-amber-600" fill="none" viewBox="0 0 24 24"/>
								</div>
								<div class="ml-3">
									<h3 class="text-sm font-medium text-gray-900 dark:text-white">Dirección</h3>
									<p class="text-sm text-gray-400">
										C/ Alcalde Lavadores nº 10<br>
										Vigo, Pontevedra 36210<br>
										España
									</p>
								</div>
							</div>

							<!-- horario -->
							<div class="flex items-start">
								<div class="flex-shrink-0">
									<flux:icon.clock class="h-6 w-6 text-amber-600" fill="none" viewBox="0 0 24 24"/>
								</div>
								<div class="ml-3">
									<h3 class="text-sm font-medium text-gray-900 dark:text-white">Horario de
										atención</h3>
									<p class="text-sm text-gray-400">
										Lunes a Venres: 9:00 - 18:00<br>
										Sábados e domingos: Pechado
									</p>
								</div>
							</div>
						</div>
					</div>

					<!-- faq rapida -->
					<div
						class="border shadow dark:shadow-gray-900 rounded-lg p-6  bg-gray-50 dark:bg-gray-800 border-gray-200 dark:border-gray-700">
						<h2 class="text-xl font-semibold text-gray-800  dark:text-white mb-4">
							FAQ - Preguntas frecuentes
						</h2>

						<div class="space-y-3">
							<div>
								<h3 class="font-medium text-gray-900 dark:text-white">
									¿Cómo me rexistro na plataforma?
								</h3>
								<p class="text-sm text-gray-400 mt-1">
									Fai clic en "Rexístrate" na esquina superior dereita e completa o formulario.
								</p>
							</div>

							<div>
								<h3 class="font-medium text-gray-900 dark:text-white">
									¿É gratuita a plataforma?
								</h3>
								<p class="text-sm text-gray-400 mt-1">
									Sí, ofrecemos acceso gratuito a tódo-los nosos libros e recursos.
								</p>
							</div>

							<div>
								<h3 class="font-medium text-gray-900 dark:text-white">¿Podo suxerir libros?</h3>
								<p class="text-sm text-gray-400 mt-1">
									Evidentemente! Usa o formulario de contacto para enviárno-las túas suxerencias.
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</x-layouts.app>
