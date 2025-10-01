<div class="bg-white dark:bg-slate-800 rounded-2xl shadow-lg overflow-hidden">
    <div class="bg-gradient-to-r from-emerald-400 to-teal-400 px-6 py-4">
        <h3 class="text-xl font-bold text-white flex items-center">
            <flux:icon.star class="h-6 w-6 mr-2" />
            Reseñas Recientes
        </h3>
    </div>
    <div class="p-6">
        <div class="space-y-4">
            @forelse($reviews as $review)
                <div class="p-4 rounded-xl bg-gradient-to-r from-emerald-50 to-teal-50 dark:from-slate-700 dark:to-slate-600">
                    <div class="flex items-center justify-between mb-3">
                        <div class="flex items-center space-x-2">
                            <div class="flex text-amber-300">
                                @for($i = 1; $i <= 5; $i++)
                                    <flux:icon.star class="h-4 w-4 {{ $i <= $review->rating ? 'text-amber-300' : 'text-gray-300' }}" />
                                @endfor
                            </div>
                            <span class="text-sm font-semibold text-gray-900 dark:text-white">{{ $review->rating }}/5</span>
                        </div>
                        <span class="text-xs text-gray-500 dark:text-gray-400">{{ $review->created_at->diffForHumans() }}</span>
                    </div>
                    <h4 class="text-sm font-semibold text-gray-900 dark:text-white mb-1">{{ $review->book->title }}</h4>
                    <p class="text-xs text-gray-600 dark:text-gray-300">por {{ $review->user->name }}</p>
                </div>
            @empty
                <div class="text-center py-8">
                    <div class="w-16 h-16 bg-gradient-to-br from-emerald-100 to-teal-200 rounded-full flex items-center justify-center mx-auto mb-4">
                        <flux:icon.star class="h-8 w-8 text-emerald-500" />
                    </div>
                    <p class="text-gray-600 dark:text-gray-400">No hay reseñas disponibles</p>
                </div>
            @endforelse
        </div>
    </div>
</div>
