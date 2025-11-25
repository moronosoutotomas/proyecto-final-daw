<form method="GET" action="{{ route('admin.users.index') }}" class="p-6">
	<div class="flex flex-col sm:flex-row gap-3 items-center justify-center">
		{{-- por nome --}}
		<div class="relative w-full sm:w-auto">
			<flux:icon.funnel class="absolute left-3 top-3 text-gray-400 dark:text-gray-500 w-5 h-5"/>
			<input
				type="text"
				name="name"
				value="{{ request('name') }}"
				placeholder="Nome ..."
				class="w-full pl-10 pr-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-800 text-gray-900 dark:text-white focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all"
			/>
		</div>

		{{-- por email --}}
		<div class="relative w-full sm:w-auto">
			<flux:icon.funnel class="absolute left-3 top-3 text-gray-400 dark:text-gray-500 w-5 h-5"/>
			<input
				type="text"
				name="email"
				value="{{ request('email') }}"
				placeholder="Email ..."
				class="w-full pl-10 pr-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-800 text-gray-900 dark:text-white focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all"
			/>
		</div>

		{{-- por rol --}}
		<div class="relative w-full sm:w-auto">
			<flux:icon.funnel class="absolute left-3 top-3 text-gray-400 dark:text-gray-500 w-5 h-5"/>
			<select
				name="role"
				class="w-full pl-10 pr-4 py-2.5 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300 text-sm focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all"
				onchange="this.form.submit()"
			>
				<option value="">Rol...</option>
				@foreach($roles as $role)
					<option
						value="{{ $role->name }}" {{ request('role') === $role->name ? 'selected' : '' }}>{{ mb_ucfirst($role->name) }}</option>
				@endforeach
			</select>
		</div>

		{{-- por min_date --}}
		<div class="w-full sm:w-auto">
			<input
				type="date"
				name="min_date"
				value="{{ request('min_date') }}"
				class="w-full px-3 py-2.5 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-800 text-gray-900 dark:text-white text-sm focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all"
			>
		</div>

		{{-- por max_date --}}
		<div class="w-full sm:w-auto">
			<input
				type="date"
				name="max_date"
				value="{{ request('max_date') }}"
				class="w-full px-3 py-2.5 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-800 text-gray-900 dark:text-white text-sm focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all"
			>
		</div>

		{{-- order y sentido --}}
		<div
			class="flex items-center justify-between sm:justify-start gap-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-800 px-3 py-2 text-sm text-gray-900 dark:text-white w-full sm:w-auto">
			<select
				name="order"
				class="bg-transparent focus:ring-0 focus:outline-none flex-1 sm:flex-none"
				onchange="this.form.submit()"
			>
				<option
					class="bg-gray-50 dark:bg-gray-800"
					value="name" {{ request('order', 'name') === 'name' ? 'selected' : '' }}>
					Nome
				</option>

				<option class="bg-gray-50 dark:bg-gray-800" value="email" {{ request('order') === 'email' ? 'selected' : '' }}>
					Email
				</option>

				<option class="bg-gray-50 dark:bg-gray-800" value="role" {{ request('order') === 'role' ? 'selected' : '' }}>
					Rol
				</option>

				<option class="bg-gray-50 dark:bg-gray-800"
							value="created_at" {{ request('order') === 'created_at' ? 'selected' : '' }}>
					Data de rexistro
				</option>
			</select>

			<div class="flex items-center gap-1 sm:ml-3">
				<label class="flex items-center gap-1 cursor-pointer">
					<input type="radio" name="sort" value="asc" {{ request('sort', 'asc') === 'asc' ? 'checked' : '' }}
					class="hidden"
								 onchange="this.form.submit()">
					<span class="text-gray-700 dark:text-gray-300">
						<flux:icon.arrow-up/>
					</span>
				</label>

				<label class="flex items-center gap-1 cursor-pointer">
					<input type="radio" name="sort" value="desc" {{ request('sort') === 'desc' ? 'checked' : '' }}
					class="hidden"
								 onchange="this.form.submit()">
					<span class="text-gray-700 dark:text-gray-300">
						<flux:icon.arrow-down/>
					</span>
				</label>
			</div>
		</div>

		{{-- botones --}}
		<div class="flex gap-2 w-full sm:w-auto">
			<button
				type="submit"
				class="flex-1 sm:flex-none flex space-x-2 items-center justify-center px-4 py-1.5 bg-amber-600 hover:bg-amber-700 text-white rounded-lg transition-all text-sm font-medium"
			>
				<flux:icon.magnifying-glass/>
				Buscar
			</button>

			@if(request()->hasAny(['name', 'email', 'role', 'min_date', 'max_date', 'order', 'sort']))
				<a
					href="{{ route('admin.users.index') }}"
					class="px-4 py-2.5 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 transition-all text-sm flex items-center gap-2"
					title="Limpar filtros"
				>
					<flux:icon.x-mark class="w-4 h-4"/>
				</a>
			@endif
		</div>
	</div>
</form>
