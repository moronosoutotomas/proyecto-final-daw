@if(session('success'))
<div
	class="mb-6 bg-green-50 dark:bg-green-900/30 border border-green-200 dark:border-green-800 text-green-800 dark:text-green-200 px-4 py-3 rounded-lg flex items-center justify-between">
	<div class="flex items-center">
		<flux:icon.check-circle variant="solid" class="w-5 h-5 mr-2"/>
		<span>{{ session('success') }}</span>
	</div>
	<button onclick="this.parentElement.remove()"
					class="text-green-800 dark:text-green-200 hover:text-green-600 dark:hover:text-green-400">
		<flux:icon.x-mark variant="solid" class="w-4 h-4"/>
	</button>
</div>
@endif

@if(session('error'))
<div
	class="mb-6 bg-red-50 dark:bg-red-900/30 border border-red-200 dark:border-red-800 text-red-800 dark:text-red-200 px-4 py-3 rounded-lg flex items-center justify-between">
	<div class="flex items-center">
		<flux:icon.check-circle variant="solid" class="w-5 h-5 mr-2"/>
		<span>{{ session('error') }}</span>
	</div>
	<button onclick="this.parentElement.remove()"
					class="text-red-800 dark:text-red-200 hover:text-red-600 dark:hover:text-red-400">
		<flux:icon.x-mark variant="solid" class="w-4 h-4"/>
	</button>
</div>
@endif

@if(session('info'))
<div
	class="mb-6 bg-blue-50 dark:bg-blue-900/30 border border-blue-200 dark:border-blue-800 text-blue-800 dark:text-blue-200 px-4 py-3 rounded-lg flex items-center justify-between">
	<div class="flex items-center">
		<flux:icon.check-circle variant="solid" class="w-5 h-5 mr-2"/>
		<span>{{ session('info') }}</span>
	</div>
	<button onclick="this.parentElement.remove()"
					class="text-blue-800 dark:text-blue-200 hover:text-blue-600 dark:hover:text-blue-400">
		<flux:icon.x-mark variant="solid" class="w-4 h-4"/>
	</button>
</div>
@endif
