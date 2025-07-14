<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $news->title }} | Tiquisate News</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50">
    <header class="bg-white shadow-sm border-b">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4">
                <a href="/" class="text-2xl font-bold text-gray-900">Tiquisate News</a>
                <a href="/login" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                    <i class="fas fa-sign-in-alt mr-2"></i>Iniciar Sesión
                </a>
            </div>
        </div>
    </header>
    <main class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <nav class="mb-6">
            <a href="/" class="text-blue-600 hover:underline"><i class="fas fa-arrow-left mr-1"></i> Volver a noticias</a>
        </nav>
        <article class="bg-white rounded-lg shadow-lg overflow-hidden">
            @if($news->image)
                <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}" class="w-full h-96 object-cover">
            @else
                <div class="w-full h-96 bg-gray-200 flex items-center justify-center">
                    <i class="fas fa-newspaper text-6xl text-gray-400"></i>
                </div>
            @endif
            <div class="p-8">
                <h1 class="text-3xl font-bold text-gray-900 mb-4">{{ $news->title }}</h1>
                <div class="flex items-center text-sm text-gray-500 mb-6">
                    <i class="fas fa-calendar-alt mr-2"></i>
                    <span>{{ $news->created_at->format('d/m/Y H:i') }}</span>
                </div>
                <div class="prose max-w-none text-gray-800 mb-8">
                    {!! nl2br(e($news->description)) !!}
                </div>
            </div>
        </article>
    </main>
    <footer class="bg-gray-800 text-white py-8 mt-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <p>&copy; 2024 Tiquisate News. Todos los derechos reservados.</p>
        </div>
    </footer>
</body>
</html> 