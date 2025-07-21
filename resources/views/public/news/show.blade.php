<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $news->title }} | Tiquisate News</title>
    <link rel="icon" type="image/png" href="/TiquisateNewsLogo.png">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50 min-h-screen flex flex-col">
    <nav class="bg-white border-b border-gray-200 shadow-sm sticky top-0 z-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center h-16">
            <a href="/" class="flex items-center gap-3 group">
                <img src="/TiquisateNewsLogo.png" alt="TiquisateNews Logo" class="h-10 w-auto group-hover:opacity-80 transition-opacity">
                <span class="font-bold text-xl text-blue-900 group-hover:text-blue-700 transition-colors">Tiquisate News</span>
            </a>
            <a href="/" class="text-blue-600 hover:underline text-sm flex items-center gap-1"><i class="fas fa-arrow-left"></i> Volver a noticias</a>
        </div>
    </nav>
    <main class="flex-1 max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        @php \Carbon\Carbon::setLocale('es'); @endphp
        <article>
            @if($news->image)
                <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}" class="w-full h-72 object-cover rounded-xl mb-8">
            @endif
            <h1 class="text-3xl font-extrabold text-blue-900 mb-4 leading-tight">{{ $news->title }}</h1>
            <div class="flex items-center text-sm text-gray-500 mb-8">
                <i class="fas fa-calendar-alt mr-2"></i>
                <span>{{ $news->created_at->diffForHumans() }}</span>
            </div>
            <div class="prose max-w-none text-gray-800 mb-8 break-words overflow-x-auto max-w-full text-xl leading-relaxed font-serif" style="color:#232323">
                {!! nl2br(e($news->description)) !!}
            </div>
        </article>
    </main>
    <footer class="bg-gray-800 text-white py-8 mt-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <p>&copy; 2025 Tiquisate News. Todos los derechos reservados.</p>
        </div>
    </footer>
</body>
</html> 