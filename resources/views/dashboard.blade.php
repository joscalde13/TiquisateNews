<x-layouts.app :title="__('Dashboard')">



    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="grid auto-rows-min gap-4 md:grid-cols-3">
            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 flex items-center justify-center">
                <div class="text-center">
                    <div class="text-3xl font-bold">{{ $newsCount }}</div>
                    <div class="text-lg">Total de Noticias</div>
                </div>
            </div>
            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 md:col-span-2 flex flex-col">
                <div class="p-4">
                    <div class="text-lg font-semibold mb-2">Últimas Noticias</div>
                    <ul class="space-y-2">
                        @forelse($latestNews as $news)
                            <li class="border-b border-neutral-200 dark:border-neutral-700 pb-2">
                                <div class="font-medium">{{ $news->title }}</div>
                                <div class="text-xs text-gray-500">{{ $news->created_at->format('d/m/Y H:i') }}</div>
                            </li>
                        @empty
                            <li>No hay noticias recientes.</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
