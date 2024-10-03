<?php

namespace App\Http\Controllers;

use App\Models\Personal;
use App\Models\Roles;
use App\Models\Tareas;
use App\Models\Medio;
use App\Models\User;
use Illuminate\Support\Facades\DB;
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
        // Filtramos los IDs de personal que queremos obtener
        $personalIds = [1, 3];

        // Obtener los registros de personal filtrados por ID
        $personal = Personal::whereIn('rol_id', $personalIds)->get();
        $roles =    Roles::all();
        $users =    User::all();
        


        // Combina los resultados para pasarlos a la vista
        return view('backend.personal', compact('personal', 'roles', 'users'));
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

    public function verRoles(Request $request)
    {
        $roles = Roles::all();

        return view('backend.roles', compact('roles'));
    }

    public function verGestionUsuarios(Request $request)
    {
         // Filtramos los IDs de personal que queremos obtener

         // Obtener los registros de personal filtrados por ID
         $personal = Personal::all();
         $roles =    Roles::all();
         $users =    User::all();
         
 
 
         // Combina los resultados para pasarlos a la vista
         return view('backend.gestionusuarios', compact('personal', 'roles', 'users'));
    }
}
