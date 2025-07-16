<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todas las Noticias | Tiquisate News</title>
    <link rel="icon" type="image/png" href="/TiquisateNewsLogo.png">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>





<body class="bg-gray-50 min-h-screen flex flex-col">

    <!-- Minimalist Navbar -->
    <nav class="bg-white border-b border-gray-200 shadow-sm sticky top-0 z-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center h-16">
            <div class="flex items-center gap-3">
                <img src="/TiquisateNewsLogo.png" alt="TiquisateNews Logo" class="h-10 w-auto">
                <span class="font-bold text-xl text-blue-900">Tiquisate News</span>
            </div>
            <div class="flex gap-6 text-sm font-medium">
                <a href="#sobre-nosotros" class="text-gray-700 hover:text-blue-700 transition-colors">Sobre Nosotros</a>
                <a href="login" class="hover:text-blue-700 transition-colors">Login</a>
            </div>
        </div>
    </nav>


    
    <main class="flex-1 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <h2 class="text-3xl font-extrabold text-blue-900 mb-8 text-center tracking-tight">Noticias Recientes</h2>
        @php \Carbon\Carbon::setLocale('es'); @endphp
        @if($news->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($news as $item)


                    <a href="{{ route('public.news.show', $item->id) }}" class="block group bg-white rounded-xl shadow hover:shadow-lg border border-gray-100 hover:bg-blue-50 transition-all min-h-[340px] flex flex-col cursor-pointer focus-visible:ring-2 focus-visible:ring-blue-400 outline-none">
                        @if($item->image)
                            <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}" class="w-full h-48 object-cover rounded-t-xl group-hover:scale-105 group-hover:opacity-70 transition-transform transition-opacity duration-300">
                        @else
                            <div class="w-full h-48 bg-gradient-to-br from-blue-100 to-blue-200 flex items-center justify-center rounded-t-xl">
                                <i class="fas fa-newspaper text-4xl text-blue-400"></i>
                            </div>
                        @endif

                        
                        <div class="p-5 flex flex-col flex-1 justify-between">


                            <div>
                                <h3 class="text-lg font-bold text-blue-900 mb-1 group-hover:text-blue-700 transition-colors">{{ $item->title }}</h3>
                                <p class="text-gray-700 text-base mb-3 line-clamp-3 font-serif leading-relaxed" style="color:#232323">{{ Str::limit($item->description, 120) }}</p>
                            </div>

                            <div class="flex justify-between items-center mt-2">

                                <span class="text-xs text-gray-500">
                                    {{ $item->created_at->diffForHumans() }}<br>
                                    <span class="text-[11px] text-gray-400">({{ $item->created_at->format('d/m/Y') }})</span>
                                </span>

                                <span class="px-4 py-1 bg-blue-600 text-white rounded-full text-xs font-semibold shadow hover:bg-blue-700 transition-colors pointer-events-none">
                                    Leer noticia <i class="fas fa-arrow-right"></i>
                                </span>
                                
                            </div>


                        </div>
                    </a>
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

        
        <!-- Secciones del menú -->
        <section id="sobre-nosotros" class="mt-20 max-w-3xl mx-auto text-center">
            <h3 class="text-2xl font-bold text-blue-900 mb-2">Sobre Nosotros</h3>
            <p class="text-gray-600">Tiquisate News es un medio digital comprometido con informar de manera veraz y oportuna a la comunidad local e internacional.</p>
        </section>
        <section id="que-hacemos" class="mt-16 max-w-3xl mx-auto text-center">
            <h3 class="text-2xl font-bold text-blue-900 mb-2">¿Qué Hacemos?</h3>
            <p class="text-gray-600">Publicamos noticias relevantes, reportajes, entrevistas y análisis sobre los temas que más importan a nuestra audiencia.</p>
        </section>
        <section id="internacionales" class="mt-16 max-w-3xl mx-auto text-center">
            <h3 class="text-2xl font-bold text-blue-900 mb-2">Noticias Internacionales</h3>
            <p class="text-gray-600">Cobertura de los acontecimientos más importantes a nivel mundial, con un enfoque claro y objetivo.</p>
        </section>
        <section id="locales" class="mt-16 max-w-3xl mx-auto text-center">
            <h3 class="text-2xl font-bold text-blue-900 mb-2">Noticias Locales</h3>
            <p class="text-gray-600">Información actualizada sobre lo que sucede en Guatemala, para mantenerte siempre informado.</p>
        </section>
    </main>
    <footer class="bg-gray-800 text-white py-8 mt-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <p>&copy; 2025 Tiquisate News. Todos los derechos reservados.</p>
            <div class="mt-4 flex justify-center gap-4">
                <a href="https://www.facebook.com/share/1EAFvvdoMb/?mibextid=wwXIfr" target="_blank" class="inline-flex items-center gap-2 text-blue-400 hover:text-blue-200 transition-colors">
                    <i class="fab fa-facebook-square text-2xl"></i> Facebook
                </a>
            </div>
        </div>
    </footer>
</body>
</html> 