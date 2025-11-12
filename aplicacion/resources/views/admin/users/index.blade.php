<x-layouts.app>
	@section('title', 'Usuarios')

	<div
		class="min-h-screen bg-gradient-to-bl from-blue-50 to-amber-100 dark:bg-gradient-to-bl dark:from-amber-950 dark:to-blue-950 dark:bg-gray-900">
		<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
			<!-- flash messages -->
			<x-flash-message />

			<!-- Header -->
			<div class="mb-8">
				<div class="flex justify-between items-center">
					<div>
						<h1 class="text-3xl font-bold text-gray-900 dark:text-white">Usuarios</h1>
						<p class="mt-2 text-gray-600 dark:text-gray-400">Xestión de usuarios do sistema</p>
					</div>
					@can('admin.users.manage')
						<a href="{{ route('admin.users.create') }}"
							 class="inline-flex items-center px-4 py-2 bg-amber-600 hover:bg-amber-700 text-white font-medium rounded-md shadow-sm transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500">
							<flux:icon.plus-circle/>
							<span class="mx-1">Novo usuario</span>
						</a>
					@endcan
				</div>
			</div>

			<!-- searchbar -->
			<div
				class="mb-4 bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden"
			>
				<livewire:users-search-bar/>
			</div>

			<!-- tabla -->
			<div
				class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
				<div class="overflow-x-auto">
					<table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
						<thead class="bg-gray-50 dark:bg-gray-700">
						<tr>
							<th scope="col"
									class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
								ID
							</th>
							<th scope="col"
									class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
								Nome
							</th>
							<th scope="col"
									class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
								Email
							</th>
							<th scope="col"
									class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
								Rol
							</th>
							<th scope="col"
									class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
								Membro dende
							</th>
							<th scope="col"
									class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
								Accións
							</th>
						</tr>
						</thead>

						<tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
						@foreach($users as $user)
							<tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
								<td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">
									{{ $user->id }}
								</td>
								<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white capitalize">
									<span>
											{{ $user->name }}
									</span>
								</td>
								<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white lowercase">
									<span>
											{{ $user->email }}
									</span>
								</td>
								<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white capitalize">
									<span
										class="inline-flex items-center px-2 py-0.5 rounded font-medium bg-gray-100 text-gray-700 dark:bg-gray-700 dark:text-gray-300">
                        {{ $user->getRoleNames()->first() }}
									</span>
								</td>
								<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white lowercase">
									<span>
											{{ date_format($user->created_at, 'j M Y') }}
									</span>
								</td>
								@role('administrador')
								<td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
									<div class="flex justify-center items-center">
										{{-- editar --}}
										<a href="{{ route('admin.users.edit', $user) }}"
											 class="px-2 py-2 text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300 transition-colors">
											<flux:icon.pencil-square/>
										</a>

										{{-- eliminar --}}
										<form action="{{ route('admin.users.destroy', $user) }}" method="POST"
													class="inline delete-form">
											@csrf
											@method('DELETE')
											<button type="submit"
															class="px-2 py-2 text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300 transition-colors">
												<flux:icon.trash/>
											</button>
										</form>
									</div>
								</td>
								@endrole
							</tr>
						@endforeach
						</tbody>

					</table>
				</div>
			</div>

			<!-- paginacion -->
			@if($users->hasPages())
				<div class="mt-6">
					{{ $users->links() }}
				</div>
			@endif
		</div>
	</div>
</x-layouts.app>
