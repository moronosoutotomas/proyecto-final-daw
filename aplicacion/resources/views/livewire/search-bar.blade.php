<form method="GET" action="{{ route('books.index') }}" class="p-6">
	<div class="flex flex-col sm:flex-row gap-3">
		{{-- searchbar --}}
		<div class="relative flex-1">
			<flux:icon.magnifying-glass class="absolute left-3 top-3 text-gray-400 dark:text-gray-500 w-5 h-5"/>
			<input
				type="text"
				name="search"
				value="{{ request('search') }}"
				placeholder="Buscar por título, autor ou ISBN..."
				class="w-full pl-10 pr-4 py-2.5 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-800 text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all"
			/>
		</div>

		{{-- by author --}}
		<div>
			<select
				name="author"
				class="w-full px-3 py-2.5 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-800 text-gray-900 dark:text-white text-sm focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all"
				onchange="this.form.submit()"
			>
				<option value="">Todos os autores</option>
				{{--				@foreach($authors as $a)--}}
				{{--					<option value="{{ $a }}" {{ request('author') == $a ? 'selected' : '' }}>--}}
				{{--						{{ Str::limit($a, 40) }}--}}
				{{--					</option>--}}
				{{--				@endforeach--}}
			</select>
		</div>

		{{-- by rating --}}
		<div>
			<select
				name="rating"
				class="w-full px-3 py-2.5 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-800 text-gray-900 dark:text-white text-sm focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all"
				onchange="this.form.submit()"
			>
				<option value="">Todas as valoracións</option>
				@for($i = 1; $i <= 5; $i++)
					<option value="{{ $i }}" {{ request('rating') == $i ? 'selected' : '' }}>
						@for($j = 1; $j <= $i; $j++)
							⭐
						@endfor
						ou máis
					</option>
				@endfor

				{{--				<option value="4" {{ request('rating') == 4 ? 'selected' : '' }}>⭐⭐⭐⭐ ou máis</option>--}}
				{{--				<option value="3" {{ request('rating') == 3 ? 'selected' : '' }}>⭐⭐⭐ ou máis</option>--}}
				{{--				<option value="2" {{ request('rating') == 2 ? 'selected' : '' }}>⭐⭐ ou máis</option>--}}
				{{--				<option value="1" {{ request('rating') == 1 ? 'selected' : '' }}>⭐ ou máis</option>--}}
			</select>
		</div>

		{{-- sentido --}}
		<div>
			<select
				name="order"
				class="w-full px-3 py-2.5 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-800 text-gray-900 dark:text-white text-sm focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all"
				onchange="this.form.submit()"
			>
				<option value="title" {{ request('order', 'title') == 'title' ? 'selected' : '' }}>Título</option>
				<option value="author" {{ request('order') == 'author' ? 'selected' : '' }}>Autor</option>
				<option value="publication_date" {{ request('order') == 'publication_date' ? 'selected' : '' }}>Data</option>
				<option value="rating" {{ request('order') == 'rating' ? 'selected' : '' }}>Valoración</option>
			</select>
		</div>

		{{-- botones --}}
		<div class="flex gap-2">
			<button
				type="submit"
				class="px-4 py-1.5 bg-amber-600 hover:bg-amber-700 text-white rounded-lg transition-all text-sm font-medium"
			>
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
