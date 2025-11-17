<x-layouts.app>
	@section('title', 'Editar usuario')

	<div
		class="min-h-screen bg-gradient-to-bl from-blue-50 to-amber-100 dark:bg-gradient-to-bl dark:from-amber-950 dark:to-blue-950 dark:bg-gray-900"
	>
		<div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
			<!-- breadcrumb -->
			<nav class="mb-8">
				<ol class="flex items-center space-x-2 text-sm text-gray-500 dark:text-gray-400">
					<li><a href="{{ route('home') }}" class="hover:text-gray-700 dark:hover:text-gray-300">Inicio</a></li>
					<li><span class="mx-2">/</span></li>
					<li><a href="{{ route('admin.users.index') }}"
								 class="hover:text-gray-700 dark:hover:text-gray-300">Usuarios</a></li>
					<li><span class="mx-2">/</span></li>
					<li class="text-gray-900 dark:text-white">Editar usuario</li>
				</ol>
			</nav>

			<!-- form -->
			<div
				class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
				<div class="px-6 py-8">
					<div class="mb-8">
						<h1 class="text-3xl font-bold text-gray-900 dark:text-white">Editar usuario</h1>
						<p class="mt-2 text-gray-600 dark:text-gray-400">Actualiza a información dun usuario</p>
					</div>

					<form action="{{ route('admin.users.update', $user) }}" method="POST">
						@csrf
						@method('PUT')

						<div class="space-y-6">
							<!-- name -->
							<div>
								<label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
									Nome
								</label>
								<input type="text"
											 name="name"
											 id="name"
											 value="{{ old('name', $user->name) }}"
											 class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-amber-500 focus:border-amber-500 dark:bg-gray-700 dark:text-white @error('name') border-red-500 @enderror"
											 placeholder="Tipo de incógnito">
								@error('name')
								<p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
								@enderror
							</div>

							<!-- email -->
							<div>
								<label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
									Email
								</label>
								<input type="email"
											 name="email"
											 id="email"
											 value="{{ old('email', $user->email) }}"
											 required
											 class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-amber-500 focus:border-amber-500 dark:bg-gray-700 dark:text-white @error('email') border-red-500 @enderror"
											 placeholder="tipo.incognito@bookbag.com">
								@error('email')
								<p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
								@enderror
							</div>

							<!-- password -->
							<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
								<div>
									<label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
										Contrasinal
									</label>
									<input type="password"
												 name="password"
												 id="password"
												 value=""
												 class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-amber-500 focus:border-amber-500 dark:bg-gray-700 dark:text-white @error('password') border-red-500 @enderror"
												 placeholder="********">
									@error('password')
									<p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
									@enderror
								</div>

								<!-- confirm password -->
								<div>
									<label for="password_confirmation" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
										Confirmar contrasinal
									</label>
									<input type="password"
												 name="password_confirmation"
												 id="password_confirmation"
												 value=""
												 class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-amber-500 focus:border-amber-500 dark:bg-gray-700 dark:text-white @error('password_confirmation') border-red-500 @enderror"
												 placeholder="********">
									@error('password_confirmation')
									<p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
									@enderror
								</div>
							</div>
						</div>

						<!-- actions -->
						<div class="mt-8 flex justify-end space-x-3">
							<a href="{{ route('admin.users.index') }}"
								 class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white font-medium rounded-md shadow-sm transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
								Cancelar
							</a>
							<button type="submit"
											class="inline-flex items-center px-4 py-2 bg-amber-600 hover:bg-amber-700 text-white font-medium rounded-md shadow-sm transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500">
								Actualizar
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</x-layouts.app>
