<div>
    {{-- Category Filter --}}
    <div class="flex flex-wrap gap-2 mb-8">
        @foreach($categories as $category)
            <button wire:click="filterByCategory('{{ $category }}')"
                    class="px-4 py-2 rounded-full text-sm font-medium transition-all duration-200
                           {{ $activeCategory === $category
                               ? 'bg-brand-red text-white shadow-lg shadow-brand-red/30'
                               : 'bg-slate-800 text-slate-400 hover:bg-slate-700 hover:text-white' }}">
                {{ $category }}
            </button>
        @endforeach
    </div>

    {{-- Channels Grid --}}
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4">
        @foreach($channels as $channel)
            <button wire:click="openChannel({{ $channel['id'] }})"
                    class="group relative glass rounded-xl p-5 flex flex-col items-center gap-3 text-center
                           hover:border-slate-600 hover:scale-105 transition-all duration-300 cursor-pointer">

                <div class="w-14 h-14 rounded-lg overflow-hidden bg-slate-800 flex items-center justify-center">
                    <img src="{{ $channel['logo'] }}"
                         alt="{{ $channel['name'] }}"
                         class="w-full h-full object-contain p-1"
                         onerror="this.style.display='none';this.nextElementSibling.style.display='flex'">
                    <div class="w-full h-full items-center justify-center text-white font-bold text-lg hidden"
                         style="background-color: {{ $channel['color'] }};">
                        {{ substr($channel['name'], 0, 2) }}
                    </div>
                </div>

                <div>
                    <p class="text-white text-sm font-semibold leading-tight line-clamp-2">{{ $channel['name'] }}</p>
                    <span class="inline-block mt-1 text-xs text-slate-500 font-medium">{{ $channel['category'] }}</span>
                </div>

                <span class="absolute top-2 right-2 w-2 h-2 rounded-full bg-green-400 opacity-0 group-hover:opacity-100 transition-opacity"></span>
            </button>
        @endforeach
    </div>

    {{-- Modal --}}
    @if($showModal && $selectedChannel)
        <div class="fixed inset-0 z-50 flex items-center justify-center p-4"
             x-data x-on:keydown.escape.window="$wire.closeModal()">

            {{-- Backdrop --}}
            <div class="absolute inset-0 bg-slate-950/80 backdrop-blur-sm"
                 wire:click="closeModal"></div>

            {{-- Modal Panel --}}
            <div class="relative glass rounded-2xl p-8 max-w-md w-full animate-slide-up shadow-2xl">
                <button wire:click="closeModal"
                        class="absolute top-4 right-4 text-slate-400 hover:text-white transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>

                <div class="flex items-center gap-4 mb-5">
                    <div class="w-16 h-16 rounded-xl overflow-hidden bg-slate-800 flex items-center justify-center shrink-0">
                        <img src="{{ $selectedChannel['logo'] }}"
                             alt="{{ $selectedChannel['name'] }}"
                             class="w-full h-full object-contain p-1"
                             onerror="this.style.display='none'">
                    </div>
                    <div>
                        <h3 class="text-white font-bold text-xl leading-tight">{{ $selectedChannel['name'] }}</h3>
                        <span class="inline-flex items-center gap-1.5 mt-1">
                            <span class="w-2 h-2 rounded-full" style="background-color: {{ $selectedChannel['color'] }}"></span>
                            <span class="text-slate-400 text-sm">{{ $selectedChannel['category'] }}</span>
                        </span>
                    </div>
                </div>

                <p class="text-slate-300 text-sm leading-relaxed mb-6">
                    {{ $selectedChannel['description'] }}
                </p>

                <div class="flex items-center gap-2 p-3 bg-slate-800/60 rounded-lg">
                    <svg class="w-4 h-4 text-brand-red shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                    </svg>
                    <p class="text-slate-400 text-xs">Proyecto demostrativo — sin streaming real.</p>
                </div>
            </div>
        </div>
    @endif
</div>
