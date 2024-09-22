<?php

use App\Http\Controllers\BackController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('front.show'); // Redirige a /panel
});

Route::get('/panel', [BackController::class, 'verHome'])
    ->middleware('auth') // Protege la ruta con el middleware de autenticación si lo necesitas
    ->name('front.show');
    
/*Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');*/

/*PERSONAL================================================*/
Route::get('/panel/personal', [BackController::class, 'verPersonal'])->name('personal.show');


/*CUADRANTE TAREAS================================================*/
Route::get('/panel/cuadrante-tareas', [BackController::class, 'verCuadroTareas'])->name('cuadrante.show');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
