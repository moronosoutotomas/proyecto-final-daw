<div class="group relative overflow-hidden rounded-xl {{ $color['bg'] }} p-6 text-white shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-105">
    <div class="absolute inset-0 bg-black/10"></div>
    <div class="relative z-10">
        <div class="flex items-center justify-between">
            <div>
                <p class="{{ $color['text'] }} text-sm font-medium">{{ $title }}</p>
                <p class="text-3xl font-bold">{{ $value }}</p>
            </div>
            <div class="w-12 h-12 bg-white/20 rounded-lg flex items-center justify-center backdrop-blur-sm">
                <flux:icon :name="$icon" class="h-7 w-7" />
            </div>
        </div>
        @if($description || $trend)
            <div class="mt-4 flex items-center {{ $color['text'] }} text-sm">
                @if($trend)
                    <flux:icon.arrow-trending-up class="h-4 w-4 mr-1" />
                @endif
                <span>{{ $description ?: $trend }}</span>
            </div>
        @endif
    </div>
</div>
