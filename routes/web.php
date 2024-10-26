<?php

use App\Http\Controllers\BackController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TareasController;
use App\Http\Controllers\MedioController;
use App\Http\Controllers\UsuariosController;
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
Route::get('/panel/personal/gestion-usuarios', [BackController::class, 'verGestionUsuarios'])->name('personal.gestion');
Route::get('/panel/personal/crear', [UsuariosController::class, 'crearPersonal'])->name('personal.crear');
Route::post('/panel/personal/insertar', [UsuariosController::class, 'store'])->name('personal.store');

Route::get('/panel/personal/editar/{id}', [UsuariosController::class, 'editarPersonal'])->name('personal.editar');
Route::post('/panel/personal/actualizar/{id}', [UsuariosController::class, 'update'])->name('personal.update');
Route::delete('/panel/personal/eliminar/{id}', [UsuariosController::class, 'destroy'])->name('personal.destroy');





/*ROLES===========================================================*/
Route::get('/panel/roles', [BackController::class, 'verRoles'])->name('roles.show');



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
Route::get('/panel/medios-drive/crear', [MedioController::class, 'crearMedio'])->name('medios.crear');
Route::post('/panel/medios-drive', [MedioController::class, 'store'])->name('medios.store');
Route::delete('/panel/medios-drive/{id}', [MedioController::class, 'destroy'])->name('medios.destroy');

/*CUADRANTE TURNOS SEMANA CULTURAL============================================================*/
Route::get('/panel/cuadrante-turnos', [BackController::class, 'verCuadroTurnos'])->name('cuadranteTurnos.show');


/*CHAT============================================================*/
Route::get('/panel/chat', [BackController::class, 'verChat'])->name('chat.show');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
