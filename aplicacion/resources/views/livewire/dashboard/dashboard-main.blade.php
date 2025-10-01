<div class="min-h-screen bg-gradient-to-br from-amber-50 via-orange-50 to-yellow-50 dark:from-slate-900 dark:via-amber-900 dark:to-orange-900">
    <div class="space-y-8 p-6">
        <!-- Header con diseño de libro -->
        <div class="relative overflow-hidden rounded-2xl bg-gradient-to-r from-amber-400 via-orange-400 to-yellow-400 p-8 text-white shadow-2xl">
            <div class="absolute inset-0 bg-black/10"></div>
            <div class="relative z-10">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-4xl font-bold mb-2">📚 BookBag</h1>
                        <p class="text-xl text-amber-100">Tu biblioteca personal digital</p>
                        <p class="text-sm text-amber-200 mt-1">Bienvenido de vuelta, {{ auth()->user()->name ?? 'Lector' }}</p>
                    </div>
                    <div class="hidden md:block">
                        <div class="w-24 h-24 bg-white/20 rounded-full flex items-center justify-center backdrop-blur-sm">
                            <flux:icon.book-open class="h-12 w-12 text-white" />
                        </div>
                    </div>
                </div>
            </div>
            <!-- Decoración de páginas -->
            <div class="absolute -right-4 -top-4 w-32 h-32 bg-white/10 rounded-full"></div>
            <div class="absolute -left-8 -bottom-8 w-24 h-24 bg-white/5 rounded-full"></div>
        </div>

        <!-- Stats Cards con tema de libros -->
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
            @foreach($stats as $stat)
                <livewire:dashboard.stats-card 
                    :title="$stat['title']"
                    :value="$stat['value']"
                    :icon="$stat['icon']"
                    :color="$stat['color']"
                    :description="$stat['description']"
                    :trend="$stat['trend']"
                />
            @endforeach
        </div>

        <!-- Contenido Principal -->
        <div class="grid grid-cols-1 gap-8 lg:grid-cols-3">
            <!-- Libros Recientes -->
            <div class="lg:col-span-2">
                <livewire:dashboard.recent-books :limit="5" />
            </div>

            <!-- Reseñas Recientes -->
            <div class="lg:col-span-1">
                <livewire:dashboard.recent-reviews :limit="4" />
            </div>
        </div>

        <!-- Acciones Rápidas -->
        <livewire:dashboard.quick-actions />
    </div>
</div>
