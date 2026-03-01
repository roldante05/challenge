<x-layouts.app title="Inicio — Tv FlexDan">
    {{-- Hero Banner --}}
    <livewire:hero-banner />

    {{-- Row carouseles --}}
    <div class="py-10 space-y-10">
        <livewire:movie-carousel title="🔥 Películas en Tendencia" type="trending" />
        <livewire:series-carousel title="📺 Series en Tendencia" type="trending" />
        <livewire:movie-carousel title="🎬 Películas Populares" type="popular" />
        <livewire:series-carousel title="⭐ Series Populares" type="popular" />
    </div>

    {{-- Canales AR teaser --}}
    <section class="max-w-7xl mx-auto px-6 py-10">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-xl font-semibold text-white tracking-tight">📡 Canales de TV Argentina</h2>
            <a href="{{ route('channels.index') }}"
               class="text-brand-red hover:text-brand-red-light text-sm font-medium transition-colors">
                Ver todos →
            </a>
        </div>
        <livewire:channel-grid />
    </section>
</x-layouts.app>
