<?php

use App\Http\Controllers\BackController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TareasController;
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
Route::get('/panel/tareas/crear', [TareasController::class, 'crearTarea'])->name('tareas.crear');
Route::post('/panel/tareas/tasks', [TareasController::class, 'store'])->name('tasks.store');
Route::delete('/panel/tareas/tasks/{id}', [TareasController::class, 'destroy'])->name('tasks.destroy');
//CAMBIAR A EN PROCESO
Route::patch('/panel/tareas/tasks/{id}/estado', [TareasController::class, 'updateEstado'])->name('tasks.updateEstado');
//CERRAR TAREA
Route::patch('/panel/tareas/tasks/{id}/cerrar', [TareasController::class, 'cerrarTarea'])->name('tasks.cerrarTarea');

/*DRIVE=============================================================*/
Route::get('/panel/medios-drive', [BackController::class, 'verDrive'])->name('drive.show');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
