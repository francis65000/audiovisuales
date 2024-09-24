<?php

namespace App\Http\Controllers;

use App\Models\Personal;
use App\Models\Roles;
use App\Models\Tareas;
use App\Models\Medio;
use Illuminate\Http\Request;

class BackController extends Controller
{
    //INICIO BACK
    public function verHome(Request $request)
    {
        //PASAMOS LOS DATOS A LA VISTA
        $tareasPendientes = Tareas::where('estado', 1) // Cambia '1' por el valor correspondiente a "pendiente"
            ->orderBy('created_at', 'desc') // Ordenar por fecha de creación de forma descendente
            ->take(3) // Obtener solo las 3 últimas
            ->get();

        $conteoTareasPendientes = Tareas::where('estado', 1) // Cambia '1' por el valor correspondiente a "pendiente"
            ->count();

            $mediosDrive = Medio::orderBy('created_at', 'desc')->take(4)->get();

        return view('backend.home', compact('tareasPendientes', 'conteoTareasPendientes', 'mediosDrive'));
    }

    public function verPersonal(Request $request)
    {

        // Filtramos los usuarios cuyo rol no sea 'lector' y cuyo ID no sea 5
        $personal = Personal::whereIn('id', [1, 3])->get();
        $roles = Roles::all();

        return view('backend.personal', compact('personal', 'roles'));
    }

    public function verCuadroTareas(Request $request)
    {
        // Obtener las últimas tareas con estado 1, ordenadas por fecha
        $tareasPanificadas = Tareas::where('estado', 1)
            ->orderBy('fecha', 'desc') // Ordena por fecha de manera descendente
            ->get();

        // Obtener las últimas tareas con estado 2
        $tareasEnProceso = Tareas::where('estado', 2)
            ->orderBy('fecha', 'desc')
            ->get();

        // Obtener las últimas tareas con estado 3
        $tareasTerminadas = Tareas::where('estado', 3)
            ->orderBy('fecha', 'desc')
            ->get();


        return view('backend.cuadrantetareas', compact('tareasPanificadas', 'tareasEnProceso', 'tareasTerminadas'));
    }

    public function verDrive(Request $request)
    {

        $mediosDrive = Medio::orderBy('created_at', 'desc')->get(); 

        return view('backend.drive', compact('mediosDrive'));
    }
}
