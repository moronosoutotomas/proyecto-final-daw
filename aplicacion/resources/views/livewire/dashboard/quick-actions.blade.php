<div class="bg-white dark:bg-slate-800 rounded-2xl shadow-lg overflow-hidden">
    <div class="bg-gradient-to-r from-purple-400 to-indigo-400 px-6 py-4">
        <h3 class="text-xl font-bold text-white flex items-center">
            <flux:icon.lightning-bolt class="h-6 w-6 mr-2" />
            Acciones Rápidas
        </h3>
    </div>
    <div class="p-6">
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
            <flux:button :href="route('books.create')" variant="outline" class="h-24 flex-col space-y-3 border-2 border-amber-200 text-amber-600 hover:bg-amber-50 hover:border-amber-300">
                <flux:icon.plus class="h-8 w-8" />
                <span class="font-semibold">Nuevo Libro</span>
            </flux:button>
            
            <flux:button :href="route('books.index')" variant="outline" class="h-24 flex-col space-y-3 border-2 border-emerald-200 text-emerald-600 hover:bg-emerald-50 hover:border-emerald-300">
                <flux:icon.book-open class="h-8 w-8" />
                <span class="font-semibold">Ver Libros</span>
            </flux:button>
            
            <flux:button href="#" variant="outline" class="h-24 flex-col space-y-3 border-2 border-purple-200 text-purple-600 hover:bg-purple-50 hover:border-purple-300">
                <flux:icon.archive-box class="h-8 w-8" />
                <span class="font-semibold">Mis Estanterías</span>
            </flux:button>
            
            <flux:button :href="route('settings.profile')" variant="outline" class="h-24 flex-col space-y-3 border-2 border-rose-200 text-rose-600 hover:bg-rose-50 hover:border-rose-300">
                <flux:icon.cog class="h-8 w-8" />
                <span class="font-semibold">Configuración</span>
            </flux:button>
        </div>
    </div>
</div>
