<x-layouts.app :title="__('Dashboard')">
    <div class="p-6 space-y-6">
        
        <!-- Total de Noticias -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
            <div class="text-center">
                <div class="text-4xl font-bold text-gray-900 dark:text-white">{{ $newsCount }}</div>
                <div class="text-lg text-gray-600 dark:text-gray-400">Total de Noticias</div>
            </div>
        </div>

        <!-- Últimas Noticias -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow">
            <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Últimas Noticias</h2>
            </div>
            <div class="p-6">
                @forelse($latestNews as $news)
                    <div class="border-b border-gray-200 dark:border-gray-700 pb-4 mb-4 last:border-b-0 last:mb-0 last:pb-0">
                        <h3 class="font-medium text-gray-900 dark:text-white">{{ $news->title }}</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">{{ $news->created_at->format('d/m/Y H:i') }}</p>
                    </div>
                @empty
                    <p class="text-gray-500 dark:text-gray-400">No hay noticias recientes.</p>
                @endforelse
            </div>
        </div>

    </div>
</x-layouts.app>