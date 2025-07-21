<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todas las Noticias | Tiquisate News</title>
    <link rel="icon" type="image/png" href="/TiquisateNewsLogo.png">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .menu-transition {
            transition: transform 0.3s ease-in-out;
        }
        .hero-overlay {
            background: linear-gradient(45deg, rgba(30, 58, 138, 0.9), rgba(59, 130, 246, 0.8));
        }
    </style>
</head>

<body class="bg-gray-50 min-h-screen flex flex-col">
  
    <nav class="bg-white border-b border-gray-200 shadow-sm sticky top-0 z-50 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex items-center gap-3 flex-shrink-0">
                    <img src="/TiquisateNewsLogo.png" alt="TiquisateNews Logo" class="h-10 w-auto">
                    <span class="font-bold text-xl text-blue-900">Tiquisate News</span>
                </div>

                <!-- Navigation links centrados -->
                <div class="hidden md:flex gap-8 text-sm font-medium absolute left-1/2 transform -translate-x-1/2">
                    <a href="#inicio" class="text-gray-700 hover:text-blue-700 transition-colors">Inicio</a>
                    <a href="#noticias" class="text-gray-700 hover:text-blue-700 transition-colors">Noticias</a>
                    <a href="#sobre-nosotros" class="text-gray-700 hover:text-blue-700 transition-colors">Sobre Nosotros</a>
                    <a href="#internacionales" class="text-gray-700 hover:text-blue-700 transition-colors">Internacionales</a>
                    <a href="#locales" class="text-gray-700 hover:text-blue-700 transition-colors">Locales</a>
                </div>

                <!-- Login button -->
                <div class="hidden md:flex flex-shrink-0">
                    <a href="login" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors">Login</a>
                </div>

               
                <button id="hamburger-btn" class="md:hidden p-2 text-gray-700 hover:text-blue-700 focus:outline-none">
                    <div class="w-6 h-6 flex flex-col justify-center items-center">
                        <span class="hamburger-line block w-6 h-0.5 bg-current transition-all duration-300"></span>
                        <span class="hamburger-line block w-6 h-0.5 bg-current mt-1.5 transition-all duration-300"></span>
                        <span class="hamburger-line block w-6 h-0.5 bg-current mt-1.5 transition-all duration-300"></span>
                    </div>
                </button>
            </div>

            
            <div id="mobile-menu" class="md:hidden menu-transition transform -translate-y-full opacity-0 invisible absolute top-full left-0 right-0 z-40">
                <div class="bg-white border-t border-gray-200 py-4 shadow-lg">
                    <a href="#inicio" class="block px-4 py-2 text-gray-700 hover:text-blue-700 hover:bg-gray-50 transition-colors">
                        <i class="fas fa-home w-5"></i> Inicio
                    </a>
                    <a href="#noticias" class="block px-4 py-2 text-gray-700 hover:text-blue-700 hover:bg-gray-50 transition-colors">
                        <i class="fas fa-newspaper w-5"></i> Noticias
                    </a>
                    <a href="#sobre-nosotros" class="block px-4 py-2 text-gray-700 hover:text-blue-700 hover:bg-gray-50 transition-colors">
                        <i class="fas fa-info-circle w-5"></i> Sobre Nosotros
                    </a>
                    <a href="#internacionales" class="block px-4 py-2 text-gray-700 hover:text-blue-700 hover:bg-gray-50 transition-colors">
                        <i class="fas fa-globe w-5"></i> Internacionales
                    </a>
                    <a href="#locales" class="block px-4 py-2 text-gray-700 hover:text-blue-700 hover:bg-gray-50 transition-colors">
                        <i class="fas fa-map-marker-alt w-5"></i> Locales
                    </a>
                    <a href="login" class="block mx-4 mt-4 bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors text-center">
                        <i class="fas fa-sign-in-alt w-5"></i> Login
                    </a>
                </div>
            </div>
        </div>
    </nav>

   
    <section id="inicio" class="relative h-64 sm:h-80 md:h-96 overflow-hidden">
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1504711434969-e33886168f5c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" 
                 alt="Breaking News" 
                 class="w-full h-full object-cover object-center">
        </div>
        <div class="hero-overlay absolute inset-0 flex items-center justify-center">
            <div class="text-center text-white px-4 sm:px-6">
                <h1 class="text-3xl sm:text-4xl md:text-6xl font-bold mb-2 sm:mb-4 tracking-tight">
                    Tiquisate News
                </h1>
                <p class="text-base sm:text-xl md:text-2xl mb-4 sm:mb-6 font-light">
                    Tu fuente confiable de noticias locales e internacionales
                </p>
                <div class="flex flex-col sm:flex-row gap-3 sm:gap-4 justify-center">
                    <a href="#noticias" class="bg-white text-blue-900 px-6 sm:px-8 py-2 sm:py-3 rounded-full font-semibold hover:bg-gray-100 transition-all transform hover:scale-105 text-sm sm:text-base">
                        Ver Noticias <i class="fas fa-arrow-down ml-2"></i>
                    </a>
                    <a href="#sobre-nosotros" class="border-2 border-white text-white px-6 sm:px-8 py-2 sm:py-3 rounded-full font-semibold hover:bg-white hover:text-blue-900 transition-all text-sm sm:text-base">
                        Conoce Más <i class="fas fa-info-circle ml-2"></i>
                    </a>
                </div>
            </div>
        </div>
        
    </section>

   
    <main id="noticias" class="flex-1 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <h2 class="text-3xl font-extrabold text-blue-900 mb-8 text-center tracking-tight">Noticias Recientes</h2>
        
        <!-- Simulando noticias para la demo -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Noticia de ejemplo -->
            <div class="block group bg-white rounded-xl shadow hover:shadow-lg border border-gray-100 hover:bg-blue-50 transition-all min-h-[340px] flex flex-col cursor-pointer">
                <div class="w-full h-48 bg-gradient-to-br from-blue-100 to-blue-200 flex items-center justify-center rounded-t-xl">
                    <i class="fas fa-newspaper text-4xl text-blue-400"></i>
                </div>
                <div class="p-5 flex flex-col flex-1 justify-between">
                    <div>
                        <h3 class="text-lg font-bold text-blue-900 mb-1 group-hover:text-blue-700 transition-colors">Noticia de Ejemplo</h3>
                        <p class="text-gray-700 text-base mb-3 line-clamp-3 leading-relaxed">Esta es una noticia de ejemplo para mostrar cómo se ve el diseño con el navbar centrado.</p>
                    </div>
                    <div class="flex justify-between items-center mt-2">
                        <span class="text-xs text-gray-500">
                            Hace 2 horas<br>
                            <span class="text-[11px] text-gray-400">(21/07/2025)</span>
                        </span>
                        <span class="px-4 py-1 bg-blue-600 text-white rounded-full text-xs font-semibold shadow hover:bg-blue-700 transition-colors pointer-events-none">
                            Leer noticia <i class="fas fa-arrow-right"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>

      
        <section id="sobre-nosotros" class="mt-20 max-w-3xl mx-auto text-center">
            <h3 class="text-2xl font-bold text-blue-900 mb-6">Sobre Nosotros</h3>
            <div class="bg-white rounded-xl shadow-sm p-8 border border-gray-100">
                <i class="fas fa-users text-4xl text-blue-600 mb-4"></i>
                <p class="text-gray-600 text-lg leading-relaxed">
                    Tiquisate News es un medio digital comprometido con informar de manera veraz y oportuna a la comunidad local e internacional. Nuestro equipo de periodistas profesionales trabaja incansablemente para traerte las noticias más relevantes.
                </p>
            </div>
        </section>

        <section id="que-hacemos" class="mt-16 max-w-3xl mx-auto text-center">
            <h3 class="text-2xl font-bold text-blue-900 mb-6">¿Qué Hacemos?</h3>
            <div class="bg-white rounded-xl shadow-sm p-8 border border-gray-100">
                <i class="fas fa-pen text-4xl text-blue-600 mb-4"></i>
                <p class="text-gray-600 text-lg leading-relaxed">
                    Publicamos noticias relevantes, reportajes, entrevistas y análisis sobre los temas que más importan a nuestra audiencia. Nos especializamos en periodismo de calidad con un enfoque ético y responsable.
                </p>
            </div>
        </section>

        <section id="internacionales" class="mt-16 max-w-3xl mx-auto text-center">
            <h3 class="text-2xl font-bold text-blue-900 mb-6">Noticias Internacionales</h3>
            <div class="bg-white rounded-xl shadow-sm p-8 border border-gray-100">
                <i class="fas fa-globe text-4xl text-blue-600 mb-4"></i>
                <p class="text-gray-600 text-lg leading-relaxed">
                    Cobertura de los acontecimientos más importantes a nivel mundial, con un enfoque claro y objetivo. Mantenemos a nuestros lectores informados sobre política, economía, cultura y sociedad internacional.
                </p>
            </div>
        </section>

        <section id="locales" class="mt-16 max-w-3xl mx-auto text-center">
            <h3 class="text-2xl font-bold text-blue-900 mb-6">Noticias Locales</h3>
            <div class="bg-white rounded-xl shadow-sm p-8 border border-gray-100">
                <i class="fas fa-map-marker-alt text-4xl text-blue-600 mb-4"></i>
                <p class="text-gray-600 text-lg leading-relaxed">
                    Información actualizada sobre lo que sucede en Guatemala, para mantenerte siempre informado sobre tu comunidad. Cubrimos eventos locales, política nacional y temas de interés regional.
                </p>
            </div>
        </section>
    </main>

    
    <footer class="bg-gray-800 text-white py-12 mt-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="text-center md:text-left">
                    <h4 class="text-lg font-bold mb-4">Tiquisate News</h4>
                    <p class="text-gray-300">Tu fuente confiable de noticias</p>
                </div>
                <div class="text-center">
                    <h4 class="text-lg font-bold mb-4">Síguenos</h4>
                    <a href="https://www.facebook.com/share/1EAFvvdoMb/?mibextid=wwXIfr" 
                       target="_blank" 
                       class="inline-flex items-center gap-2 text-blue-400 hover:text-blue-200 transition-colors">
                        <i class="fab fa-facebook-square text-2xl"></i> Facebook
                    </a>
                </div>
                <div class="text-center md:text-right">
                    <h4 class="text-lg font-bold mb-4">Contacto</h4>
                    <p class="text-gray-300">info@tiquisatenews.com</p>
                </div>
            </div>
            <div class="border-t border-gray-600 mt-8 pt-8 text-center">
                <p>&copy; 2025 Tiquisate News. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>

    <script>
      
        const hamburgerBtn = document.getElementById('hamburger-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        const hamburgerLines = document.querySelectorAll('.hamburger-line');

        hamburgerBtn.addEventListener('click', () => {
            const isOpen = mobileMenu.classList.contains('translate-y-0');
            
            if (isOpen) {
               
                mobileMenu.classList.remove('translate-y-0', 'opacity-100', 'visible');
                mobileMenu.classList.add('-translate-y-full', 'opacity-0', 'invisible');
                
               
                hamburgerLines[0].style.transform = 'rotate(0deg) translateY(0px)';
                hamburgerLines[1].style.opacity = '1';
                hamburgerLines[2].style.transform = 'rotate(0deg) translateY(0px)';
            } else {
               
                mobileMenu.classList.remove('-translate-y-full', 'opacity-0', 'invisible');
                mobileMenu.classList.add('translate-y-0', 'opacity-100', 'visible');
                
               
                hamburgerLines[0].style.transform = 'rotate(45deg) translateY(8px)';
                hamburgerLines[1].style.opacity = '0';
                hamburgerLines[2].style.transform = 'rotate(-45deg) translateY(-8px)';
            }
        });

        
        document.querySelectorAll('#mobile-menu a').forEach(link => {
            link.addEventListener('click', () => {
                mobileMenu.classList.remove('translate-y-0', 'opacity-100', 'visible');
                mobileMenu.classList.add('-translate-y-full', 'opacity-0', 'invisible');
                
              
                hamburgerLines[0].style.transform = 'rotate(0deg) translateY(0px)';
                hamburgerLines[1].style.opacity = '1';
                hamburgerLines[2].style.transform = 'rotate(0deg) translateY(0px)';
            });
        });

       
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>
</body>
</html>