<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todas las Noticias | Tiquisate News</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50">
    <header class="bg-white shadow-sm border-b">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4">
                <h1 class="text-2xl font-bold text-gray-900">Tiquisate News</h1>
                <a href="/login" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                    <i class="fas fa-sign-in-alt mr-2"></i>Iniciar Sesión
                </a>
            </div>
        </div>
    </header>
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Noticias Recientes</h2>
        @if($news->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($news as $item)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow">
                        @if($item->image)
                            <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}" class="w-full h-56 object-cover">
                        @else
                            <div class="w-full h-56 bg-gray-200 flex items-center justify-center">
                                <i class="fas fa-newspaper text-5xl text-gray-400"></i>
                            </div>
                        @endif
                        <div class="p-6">
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ $item->title }}</h3>
                            <p class="text-gray-600 mb-4 line-clamp-3">{{ Str::limit($item->description, 120) }}</p>
                            <div class="flex justify-between items-center">
                                <span class="text-xs text-gray-500">{{ $item->created_at->format('d/m/Y H:i') }}</span>
                                <a href="{{ route('public.news.show', $item->id) }}" class="text-blue-600 hover:text-blue-800 font-medium">Ver más <i class="fas fa-arrow-right ml-1"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-10 flex justify-center">
                {{ $news->links() }}
            </div>
        @else
            <div class="text-center py-12">
                <i class="fas fa-newspaper text-6xl text-gray-300 mb-4"></i>
                <h3 class="text-xl font-semibold text-gray-600 mb-2">No hay noticias disponibles</h3>
                <p class="text-gray-500">Pronto tendremos nuevas noticias para ti.</p>
            </div>
        @endif
    </main>
    <footer class="bg-gray-800 text-white py-8 mt-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <p>&copy; 2024 Tiquisate News. Todos los derechos reservados.</p>
        </div>
    </footer>
</body>
</html> 