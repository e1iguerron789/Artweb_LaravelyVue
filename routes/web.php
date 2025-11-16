<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserInteresesController;
use App\Http\Controllers\Admin\EtiquetaController;
use App\Http\Controllers\Admin\CategoriaInteresController;
use App\Http\Controllers\Admin\OpcionInteresController;


use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Auth/Login', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {

    if (auth()->user()->rol === 'admin') {
        return redirect()->route('admin.dashboard'); // Admin → Panel admin
    }

    return Inertia::render('Dashboard'); // Usuario normal → Dashboard normal

})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
   Route::get('/intereses', [UserInteresesController::class, 'index'])->name('intereses.index');
   Route::get('/intereses/create', [UserInteresesController::class, 'create'])->name('intereses.create');
Route::post('/intereses', [UserInteresesController::class, 'store'])->name('intereses.store');
Route::get('/intereses/{userIntereses}/edit', [UserInteresesController::class, 'edit'])->name('intereses.edit');
Route::patch('/intereses/{userIntereses}', [UserInteresesController::class, 'update'])->name('intereses.update');
Route::delete('/intereses/{userIntereses}', [UserInteresesController::class, 'destroy'])
    ->name('intereses.destroy');

});


Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        // Dashboard del admin
        Route::get('/dashboard', function() {
            return inertia('Admin/CategoriasInteres/Index');
        })->name('dashboard');

        // CRUD Categorías de Interés
        Route::resource('categorias-interes', CategoriaInteresController::class);

        // CRUD Opciones de Interés
        Route::resource('opciones-interes', OpcionInteresController::class);

        // CRUD Etiquetas
        Route::resource('etiquetas', EtiquetaController::class);
    });


Route::get('/api/opciones/{categoriaId}', function ($categoriaId) {
    return \App\Models\OpcionInteres::where('categoria_interes_id', $categoriaId)->get();
});



require __DIR__.'/auth.php';
