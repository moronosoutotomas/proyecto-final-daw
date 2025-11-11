<form method="GET" action="{{ route('books.index') }}" class="p-6">
	<div class="flex flex-col sm:flex-row gap-3 items-center justify-center">

		{{-- search --}}
		<div class="relative">
			<flux:icon.funnel class="absolute left-3 top-3 text-gray-400 dark:text-gray-500 w-5 h-5"/>
			<input
				type="text"
				name="search"
				{{--wire:model.live="search"--}}
				value="{{ request('search') }}"
				placeholder="Filtrar por título ..."
				class="w-full pl-10 pr-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-800 text-gray-900 dark:text-white focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all"
			/>
		</div>
		<input wire:model.live="searchBook" type="text" id="simple-search">
		{{-- min_sth --}}
		<div>
			<select
				name="min_sth"
{{--				wire:model.live="min_sth"--}}
				class="w-full px-3 py-2.5 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-800 text-gray-900 dark:text-white text-sm focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all"
				onchange="this.form.submit()"
			>
				<option value="">{{ $min_sth }}</option>
				{{--@for($i = 1; $i <= 5; $i++)
					<option value="{{ $i }}" {{ request('min_sth') == $i ? 'selected' : '' }}>
						@for($j = 1; $j <= $i; $j++)
							⭐
						@endfor
						ou máis
					</option>
				@endfor--}}
			</select>
		</div>

		{{-- max_sth --}}
		<div>
			<select
				name="max_sth"
{{--				wire:model.live="max_sth"--}}
				class="w-full px-3 py-2.5 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-800 text-gray-900 dark:text-white text-sm focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all"
				onchange="this.form.submit()"
			>
				<option value="">{{ $max_sth }}</option>
				{{--@for($i = 1; $i <= 5; $i++)
					<option value="{{ $i }}" {{ request('max_sth') == $i ? 'selected' : '' }}>
						@for($j = 1; $j <= $i; $j++)
							⭐
						@endfor
						ou máis
					</option>
				@endfor--}}
			</select>
		</div>

		{{-- order y sentido --}}
		<div
			class="flex items-center gap-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-800 px-3 py-2 text-sm text-gray-900 dark:text-white">
			<select
				name="order"
{{--					wire:model.live="order"--}}
				class="bg-transparent focus:ring-0 focus:outline-none"
				onchange="this.form.submit()"
			>
				@foreach($order as $key => $value)
					<option
						class="bg-gray-50 dark:bg-gray-800"
						value="{{ $value }}}" {{ request('order', $key) == $key ? 'selected' : '' }}>
						{{ $value }}
					</option>
				@endforeach
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

			@if(request()->hasAny(['search', 'min_sth', 'max_sth', 'order', 'sort']))
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
