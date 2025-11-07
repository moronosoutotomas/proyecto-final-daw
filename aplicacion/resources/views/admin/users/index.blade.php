<x-layouts.app>
	@section('title', 'Usuarios')

	<div
		class="min-h-screen bg-gradient-to-bl from-blue-50 to-amber-100 dark:bg-gradient-to-bl dark:from-amber-950 dark:to-blue-950 dark:bg-gray-900">
		<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
			<!-- Header -->
			<div class="mb-8">
				<div class="flex justify-between items-center">
					<div>
						<h1 class="text-3xl font-bold text-gray-900 dark:text-white">Usuarios</h1>
						<p class="mt-2 text-gray-600 dark:text-gray-400">Xestión de usuarios do sistema</p>
					</div>
				</div>
			</div>

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
								<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">
									<span>
											{{ ucfirst($user->name) }}
									</span>
								</td>
								<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">
									<span>
											{{ ucfirst($user->email) }}
									</span>
								</td>

							</tr>
						@endforeach
						</tbody>

					</table>
				</div>
			</div>

		</div>
	</div>
</x-layouts.app>
