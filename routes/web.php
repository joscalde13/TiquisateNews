<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PublicNewsController;

// Página principal muestra todas las noticias públicas
Route::get('/', [PublicNewsController::class, 'index'])->name('public.news.index');

// Rutas protegidas (solo autenticados)
Route::middleware(['auth'])->group(function () {
    // Definir create antes para evitar conflicto
    Route::get('news/create', [NewsController::class, 'create'])->name('news.create');
    Route::resource('news', NewsController::class)->except(['create', 'show']);
    Route::redirect('settings', 'settings/profile');
    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

// Ruta pública de detalle de noticia (debe ir después de create)
Route::get('/news/{id}', [PublicNewsController::class, 'show'])->name('public.news.show');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

require __DIR__.'/auth.php';
