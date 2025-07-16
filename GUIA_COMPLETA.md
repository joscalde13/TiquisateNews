# Guía Detallada: Creación de un Blog de Noticias con Laravel desde Cero

Este tutorial te guiará a través de cada paso para construir un sistema de noticias completo, desde la configuración inicial del proyecto hasta la creación de la lógica del backend y las vistas del frontend.

---

## Parte 1: Configuración Inicial del Entorno y Proyecto

### 1.1. Prerrequisitos
Asegúrate de tener instalado lo siguiente en tu sistema:
- **PHP**: Versión 8.1 o superior.
- **Composer**: Es un manejador de dependencias para PHP. Lo usarás para instalar Laravel y otros paquetes.
- **Node.js y NPM**: Opcional, pero recomendado para manejar los assets de frontend (CSS, JS).
- **Un servidor de base de datos**: Usaremos **MySQL** en esta guía.

### 1.2. Creación del Proyecto Laravel
Abre tu terminal o consola y navega a la carpeta donde guardas tus proyectos. Luego, ejecuta el siguiente comando de Composer:

```bash
# Este comando descarga el esqueleto de un proyecto Laravel y lo instala en una nueva carpeta llamada "TiquisateNews"
composer create-project laravel/laravel TiquisateNews
```

Una vez que la instalación termine, muévete al directorio recién creado:
```bash
cd TiquisateNews
```

### 1.3. Configuración de la Base de Datos
Laravel maneja la configuración del entorno a través de un archivo especial llamado `.env`.

1.  **Crea una base de datos vacía** usando tu herramienta de gestión de bases de datos preferida (como phpMyAdmin o HeidiSQL). Nómbrala `tiquisate_news`.
2.  **Abre el archivo `.env`** en la raíz de tu proyecto.
3.  **Modifica las variables de conexión** de la base de datos:

```dotenv
# .env

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=tiquisate_news
DB_USERNAME=root
DB_PASSWORD=
```
> **Nota:** `DB_USERNAME` y `DB_PASSWORD` deben ser las credenciales de tu servidor de base de datos local. `root` y una contraseña vacía son comunes en entornos de desarrollo como XAMPP o WAMP.

---

## Parte 2: Estructura de la Base de Datos (Migraciones y Modelos)

### 2.1. Creación del Modelo y la Migración
En Laravel, un **Modelo** es una clase que representa una tabla de la base de datos (ej. `News` para la tabla `news`). Una **Migración** es un archivo que controla la versión de tu base de datos, permitiéndote crear y modificar tablas de forma programática.

Ejecuta este comando de `artisan` (la herramienta de línea de comandos de Laravel):

```bash
# Crea el archivo del Modelo en app/Models/News.php
# El flag -m también crea el archivo de migración correspondiente
php artisan make:model News -m
```

### 2.2. Definiendo la Tabla de Noticias
El comando anterior creó un archivo en `database/migrations/`. Ábrelo y modifica el método `up()` para definir las columnas de nuestra tabla `news`.

```php
// database/migrations/xxxx_xx_xx_xxxxxx_create_news_table.php

public function up(): void
{
    Schema::create('news', function (Blueprint $table) {
        $table->id(); // Columna de ID auto-incremental (bigint, unsigned, primary key)
        $table->string('title'); // Columna para el título (varchar)
        $table->text('description'); // Columna para el contenido (text)
        $table->string('image')->nullable(); // Columna para la ruta de la imagen, puede ser nula
        $table->timestamps(); // Crea las columnas created_at y updated_at automáticamente
    });
}
```

### 2.3. Ejecutando la Migración
Ahora, aplica esta estructura a tu base de datos real:

```bash
# Este comando ejecuta todas las migraciones pendientes
php artisan migrate
```
Después de esto, la tabla `news` existirá en tu base de datos `tiquisate_news`.

---

## Parte 3: Lógica del Backend (Controladores y Rutas)

### 3.1. Configurando el Modelo
Para proteger contra vulnerabilidades de asignación masiva, debemos especificar qué campos se pueden rellenar desde un formulario.

Abre `app/Models/News.php` y añade la propiedad `$fillable`.

```php
// app/Models/News.php

class News extends Model
{
    use HasFactory;

    // Define los campos que se pueden asignar masivamente de forma segura.
    protected $fillable = [
        'title',
        'description',
        'image',
    ];
}
```

### 3.2. Creando los Controladores
Los **Controladores** agrupan la lógica de las peticiones HTTP relacionadas. Crearemos uno para la parte pública y otro para la administración.

```bash
php artisan make:controller PublicNewsController
php artisan make:controller NewsController
```

### 3.3. Definiendo las Rutas
Las **Rutas** son las URLs de tu aplicación. Mapean una URL a un método específico de un controlador.

Reemplaza el contenido de `routes/web.php` con lo siguiente:

```php
// routes/web.php

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PublicNewsController;

/*
|--------------------------------------------------------------------------
| Rutas Públicas
|--------------------------------------------------------------------------
| Estas son las rutas que los visitantes del sitio verán.
*/

// La ruta raíz '/' mostrará el listado de noticias.
Route::get('/', [PublicNewsController::class, 'index'])->name('public.news.index');

// La ruta '/news/{id}' mostrará una noticia específica.
Route::get('/news/{id}', [PublicNewsController::class, 'show'])->name('public.news.show');


/*
|--------------------------------------------------------------------------
| Rutas de Administración (CRUD)
|--------------------------------------------------------------------------
| Estas rutas se usarían para gestionar las noticias.
| NOTA: En un proyecto real, estas rutas deben estar protegidas
| con un middleware de autenticación como `->middleware('auth')`.
*/

Route::get('/admin/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/admin/news/create', [NewsController::class, 'create'])->name('news.create');
Route::post('/admin/news', [NewsController::class, 'store'])->name('news.store');
Route::get('/admin/news/{id}/edit', [NewsController::class, 'edit'])->name('news.edit');
Route::put('/admin/news/{id}', [NewsController::class, 'update'])->name('news.update');
Route::delete('/admin/news/{id}', [NewsController::class, 'destroy'])->name('news.destroy');
```

### 3.4. Implementando la Lógica en los Controladores

**Controlador Público:**
Abre `app/Http/Controllers/PublicNewsController.php` y añade la lógica para mostrar las noticias.

```php
// app/Http/Controllers/PublicNewsController.php

class PublicNewsController extends Controller
{
    // Muestra una lista paginada de noticias.
    public function index()
    {
        // Obtiene las noticias, ordenadas por la más reciente, y las pagina (12 por página).
        $news = News::latest()->paginate(12);
        // Devuelve la vista 'public.news.index' y le pasa la variable 'news'.
        return view('public.news.index', compact('news'));
    }

    // Muestra una sola noticia.
    public function show($id)
    {
        // Busca la noticia por su ID. Si no la encuentra, lanza un error 404.
        $news = News::findOrFail($id);
        // Devuelve la vista 'public.news.show' y le pasa la noticia encontrada.
        return view('public.news.show', compact('news'));
    }
}
```

**Controlador de Administración (CRUD):**
Abre `app/Http/Controllers/NewsController.php`. Este controlador contendrá toda la lógica para Crear, Leer, Actualizar y Eliminar noticias (CRUD).

```php
// app/Http/Controllers/NewsController.php

class NewsController extends Controller
{
    // Muestra la lista de noticias en el panel de admin.
    public function index()
    {
        $news = News::latest()->paginate(10);
        return view('news.index', compact('news'));
    }

    // Muestra el formulario para crear una nueva noticia.
    public function create()
    {
        return view('news.create');
    }

    // Guarda una nueva noticia en la base de datos.
    public function store(Request $request)
    {
        // Valida los datos del formulario.
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        // Si se subió una imagen, la guarda y obtiene la ruta.
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('news_images', 'public');
        }

        News::create($data);

        return redirect()->route('news.index')->with('success', 'Noticia creada exitosamente.');
    }

    // Muestra el formulario para editar una noticia existente.
    public function edit($id)
    {
        $news = News::findOrFail($id);
        return view('news.edit', compact('news'));
    }

    // Actualiza una noticia existente en la base de datos.
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $news = News::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('image')) {
            // Si hay una imagen nueva, elimina la antigua.
            if ($news->image) {
                Storage::disk('public')->delete($news->image);
            }
            $data['image'] = $request->file('image')->store('news_images', 'public');
        }

        $news->update($data);

        return redirect()->route('news.index')->with('success', 'Noticia actualizada exitosamente.');
    }

    // Elimina una noticia de la base de datos.
    public function destroy($id)
    {
        $news = News::findOrFail($id);

        // Elimina la imagen del almacenamiento.
        if ($news->image) {
            Storage::disk('public')->delete($news->image);
        }

        $news->delete();

        return redirect()->route('news.index')->with('success', 'Noticia eliminada exitosamente.');
    }
}
```

### 3.5. Enlazando el Almacenamiento
Para que las imágenes guardadas en `storage/app/public` sean accesibles desde la web, necesitas crear un enlace simbólico.

```bash
php artisan storage:link
```

---

## Parte 4: Vistas del Frontend (Plantillas Blade)

Las vistas son los archivos HTML que ve el usuario. Usan la sintaxis de Blade de Laravel.

### 4.1. Vistas Públicas

**Listado de Noticias:**
Crea el archivo `resources/views/public/news/index.blade.php`.

```html
<!-- resources/views/public/news/index.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tiquisate News</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <main class="container mx-auto mt-8 p-4">
        <h2 class="text-3xl font-bold mb-6 text-center">Noticias Recientes</h2>
        @if($news->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($news as $item)
                    <a href="{{ route('public.news.show', $item->id) }}" class="block bg-white rounded-lg shadow-lg hover:shadow-2xl">
                        <img src="{{ asset('storage/' . $item->image) }}" class="w-full h-48 object-cover">
                        <div class="p-6">
                            <h3 class="text-xl font-bold mb-2">{{ $item->title }}</h3>
                            <p class="text-gray-700 line-clamp-3">{{ $item->description }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
            <div class="mt-8">{{ $news->links() }}</div>
        @else
            <p>No hay noticias.</p>
        @endif
    </main>
</body>
</html>
```

**Detalle de Noticia:**
Crea el archivo `resources/views/public/news/show.blade.php`.

```html
<!-- resources/views/public/news/show.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>{{ $news->title }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <main class="container mx-auto mt-8 p-4 bg-white rounded-lg shadow-lg">
        <h1 class="text-4xl font-bold mb-4">{{ $news->title }}</h1>
        <img src="{{ asset('storage/' . $news->image) }}" class="w-full rounded-lg mb-6">
        <div class="prose max-w-none text-lg">
            <p>{{ $news->description }}</p>
        </div>
    </main>
</body>
</html>
```

### 4.2. Vistas de Administración

**Plantilla Base del Admin:**
Crea el archivo `resources/views/layouts/admin.blade.php`.

```html
<!-- resources/views/layouts/admin.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <title>@yield('title', 'Admin')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-200">
    <div class="container mx-auto mt-10 p-6 bg-white rounded-lg shadow-xl">
        <h1 class="text-3xl font-bold mb-6">@yield('title')</h1>
        @if (session('success'))
            <div class="bg-green-500 text-white p-4 rounded mb-4">{{ session('success') }}</div>
        @endif
        @yield('content')
    </div>
</body>
</html>
```

**Listado de Noticias (Admin):**
Crea el archivo `resources/views/news/index.blade.php`.

```html
<!-- resources/views/news/index.blade.php -->
@extends('layouts.admin')
@section('title', 'Administrar Noticias')
@section('content')
    <a href="{{ route('news.create') }}" class="bg-blue-500 text-white py-2 px-4 rounded">Crear Noticia</a>
    <table class="min-w-full bg-white mt-6">
        <thead>
            <tr>
                <th>Título</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($news as $item)
                <tr>
                    <td>{{ $item->title }}</td>
                    <td>
                        <a href="{{ route('news.edit', $item->id) }}">Editar</a>
                        <form action="{{ route('news.destroy', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
```

**Formulario de Creación:**
Crea el archivo `resources/views/news/create.blade.php`.

```html
<!-- resources/views/news/create.blade.php -->
@extends('layouts.admin')
@section('title', 'Crear Noticia')
@section('content')
    <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="title" placeholder="Título" required>
        <textarea name="description" placeholder="Descripción" required></textarea>
        <input type="file" name="image">
        <button type="submit">Guardar</button>
    </form>
@endsection
```

**Formulario de Edición:**
Crea el archivo `resources/views/news/edit.blade.php`.

```html
<!-- resources/views/news/edit.blade.php -->
@extends('layouts.admin')
@section('title', 'Editar Noticia')
@section('content')
    <form action="{{ route('news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="text" name="title" value="{{ $news->title }}" required>
        <textarea name="description" required>{{ $news->description }}</textarea>
        <input type="file" name="image">
        <button type="submit">Actualizar</button>
    </form>
@endsection
```

---

## Parte 5: Ejecución del Proyecto

Para ver tu aplicación en funcionamiento, inicia el servidor de desarrollo de Laravel:

```bash
php artisan serve
```

-   **Parte Pública:** `http://127.0.0.1:8000/`
-   **Panel de Administración:** `http://127.0.0.1:8000/admin/news`

¡Felicidades! Has construido una aplicación de noticias completamente funcional con Laravel.
