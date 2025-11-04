<form method="GET" action="{{ route('books.index') }}" class="p-6">
	<div class="flex flex-col sm:flex-row gap-3 items-center justify-center">
		{{-- por isbn13 --}}
		<div class="relative">
			<flux:icon.funnel class="absolute left-3 top-3 text-gray-400 dark:text-gray-500 w-5 h-5"/>
			<input
				type="text"
				name="isbn13"
				value="{{ request('isbn13') }}"
				placeholder="Filtrar por ISBN ..."
				class="w-full pl-10 pr-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-800 text-gray-900 dark:text-white focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all"
			/>
		</div>

		{{-- por title --}}
		<div class="relative">
			<flux:icon.funnel class="absolute left-3 top-3 text-gray-400 dark:text-gray-500 w-5 h-5"/>
			<input
				type="text"
				name="title"
				value="{{ request('title') }}"
				placeholder="Filtrar por título ..."
				class="w-full pl-10 pr-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-800 text-gray-900 dark:text-white focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all"
			/>
		</div>

		{{-- por author --}}
		<div class="relative">
			<flux:icon.funnel class="absolute left-3 top-3 text-gray-400 dark:text-gray-500 w-5 h-5"/>
			<input
				type="text"
				name="author"
				value="{{ request('author') }}"
				placeholder="Filtrar por autor ..."
				class="w-full pl-10 pr-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-800 text-gray-900 dark:text-white focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all"
			/>
		</div>

		{{-- por rating --}}
		<div>
			<select
				name="rating"
				class="w-full px-3 py-2.5 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-800 text-gray-900 dark:text-white text-sm focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all"
				onchange="this.form.submit()"
			>
				<option value="">Por valoración</option>
				@for($i = 1; $i <= 5; $i++)
					<option value="{{ $i }}" {{ request('rating') == $i ? 'selected' : '' }}>
						@for($j = 1; $j <= $i; $j++)
							⭐
						@endfor
						ou máis
					</option>
				@endfor
			</select>
		</div>

		{{-- order y sentido --}}
		<div
			class="flex items-center gap-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-800 px-3 py-2 text-sm text-gray-900 dark:text-white">
			<select
				name="order"
				class="bg-transparent focus:ring-0 focus:outline-none"
				onchange="this.form.submit()"
			>
				<option
					class="bg-gray-50 dark:bg-gray-800"
					value="title" {{ request('order', 'title') == 'title' ? 'selected' : '' }}>Título
				</option>

				<option class="bg-gray-50 dark:bg-gray-800" value="author" {{ request('order') == 'author' ? 'selected' : '' }}>
					Autor
				</option>

				<option class="bg-gray-50 dark:bg-gray-800" value="rating" {{ request('order') == 'rating' ? 'selected' : '' }}>
					Valoración
				</option>
			</select>

			<div class="flex items-center gap-1 ml-3">
				<label class="flex items-center gap-1 cursor-pointer">
					<input type="radio" name="sort" value="asc" {{ request('sort', 'asc') == 'asc' ? 'checked' : '' }}
					class="hidden"
								 onchange="this.form.submit()">
					<span class="text-gray-700 dark:text-gray-300">
						<flux:icon.arrow-up/>
					</span>
				</label>

				<label class="flex items-center gap-1 cursor-pointer">
					<input type="radio" name="sort" value="desc" {{ request('sort') == 'desc' ? 'checked' : '' }}
					class="hidden"
								 onchange="this.form.submit()">
					<span class="text-gray-700 dark:text-gray-300">
						<flux:icon.arrow-down/>
					</span>
				</label>
			</div>
		</div>


		{{-- botones --}}
		<div class="flex gap-2">
			<button
				type="submit"
				class="flex space-x-2 items-center px-4 py-1.5 bg-amber-600 hover:bg-amber-700 text-white rounded-lg transition-all text-sm font-medium"
			>
				<flux:icon.magnifying-glass/>
				Buscar
			</button>

			@if(request()->hasAny(['search', 'author', 'rating', 'order']))
				<a
					href="{{ route('books.index') }}"
					class="px-4 py-2.5 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 transition-all text-sm flex items-center gap-2"
					title="Limpar filtros"
				>
					<flux:icon.x-mark class="w-4 h-4"/>
				</a>
			@endif
		</div>
	</div>
</form>
