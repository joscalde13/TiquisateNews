<x-layouts.app>
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="flex justify-between items-center mb-10">
            <h1 class="text-3xl font-thin text-gray-300">Noticias Recientes</h1>
            <a href="{{ route('news.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-600 active:bg-gray-800 focus:outline-none focus:border-gray-800 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                Nueva Noticia
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-900 bg-opacity-50 text-green-200 p-4 rounded-lg mb-6">
                {{ session('success') }}
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            @forelse ($news as $item)
                <div class="group bg-gray-800 bg-opacity-50 rounded-lg overflow-hidden">
                    @if ($item->image)
                        <div class="h-48">
                            <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}" class="w-full h-full object-cover">
                        </div>
                    @endif
                    <div class="p-6">
                        <h2 class="text-xl font-semibold text-gray-200 group-hover:text-blue-400 transition-colors duration-200">{{ $item->title }}</h2>
                        <p class="text-gray-400 mt-2 leading-relaxed text-base">
                            {{ Str::limit($item->description, 150) }}
                        </p>
                        <div class="mt-4 flex items-center space-x-4 text-sm">
                            <a href="{{ route('news.edit', $item) }}" class="inline-flex items-center px-3 py-1.5 bg-gray-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-600 active:bg-gray-800 focus:outline-none focus:border-gray-800 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">Editar</a>
                            <form action="{{ route('news.destroy', $item) }}" method="POST" onsubmit="return confirm('¿Confirmas que quieres eliminar esta noticia?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="inline-flex items-center px-3 py-1.5 bg-red-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-600 active:bg-red-800 focus:outline-none focus:border-red-800 focus:ring ring-red-300 disabled:opacity-25 transition ease-in-out duration-150">Eliminar</button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-16">
                    <p class="text-gray-500">Aún no hay noticias publicadas.</p>
                </div>
            @endforelse
        </div>
    </div>
</x-layouts.app>
