<div class="min-h-screen bg-gray-50 dark:bg-gray-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="flex gap-8 max-md:flex-col">
            <!-- Sidebar Navigation -->
            <aside class="w-full md:w-64 flex-shrink-0">
                <nav class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 p-2">
                    <a href="{{ route('settings.profile') }}" 
                       class="flex items-center px-4 py-3 text-sm font-medium rounded-md transition-colors {{ request()->routeIs('settings.profile') ? 'bg-amber-50 text-amber-700 dark:bg-amber-900/20 dark:text-amber-400' : 'text-gray-700 hover:bg-gray-50 dark:text-gray-300 dark:hover:bg-gray-700' }}"
                       wire:navigate>
                        <svg class="mr-3 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        Perfil
                    </a>
                    <a href="{{ route('settings.password') }}" 
                       class="flex items-center px-4 py-3 text-sm font-medium rounded-md transition-colors mt-1 {{ request()->routeIs('settings.password') ? 'bg-amber-50 text-amber-700 dark:bg-amber-900/20 dark:text-amber-400' : 'text-gray-700 hover:bg-gray-50 dark:text-gray-300 dark:hover:bg-gray-700' }}"
                       wire:navigate>
                        <svg class="mr-3 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                        </svg>
                        Contraseña
                    </a>
                    <a href="{{ route('settings.appearance') }}" 
                       class="flex items-center px-4 py-3 text-sm font-medium rounded-md transition-colors mt-1 {{ request()->routeIs('settings.appearance') ? 'bg-amber-50 text-amber-700 dark:bg-amber-900/20 dark:text-amber-400' : 'text-gray-700 hover:bg-gray-50 dark:text-gray-300 dark:hover:bg-gray-700' }}"
                       wire:navigate>
                        <svg class="mr-3 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01" />
                        </svg>
                        Apariencia
                    </a>
                </nav>
            </aside>

            <!-- Main Content -->
            <main class="flex-1 min-w-0">
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 p-6 md:p-8">
                    <div class="mb-6">
                        <h2 class="text-2xl font-bold text-gray-900 dark:text-white">{{ $heading ?? '' }}</h2>
                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">{{ $subheading ?? '' }}</p>
                    </div>
                    
                    <div class="border-t border-gray-200 dark:border-gray-700 pt-6">
                        {{ $slot }}
                    </div>
                </div>
            </main>
        </div>
    </div>
</div>
