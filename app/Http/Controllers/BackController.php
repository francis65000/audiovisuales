<?php

namespace App\Http\Controllers;

use App\Models\Personal;
use App\Models\Roles;
use Illuminate\Http\Request;

class BackController extends Controller
{
    //INICIO BACK
    public function verHome(Request $request)
    {
        //PARTE PARA LAS ESTADISTICAS


        //PASAMOS LOS DATOS A LA VISTA


        //PASAR ELEMENTOS PARA EL SLIDER


        return view('backend.home');
    }

    public function verPersonal(Request $request)
    {
        // Suponiendo que el ID del rol 'lector' es 1, ajústalo según tu base de datos
        $lectorRolId = 1; // Cambia este valor al ID correcto del rol 'lector'

        // Filtramos los usuarios cuyo rol no sea 'lector' y cuyo ID no sea 5
        $personal = Personal::where('rol_id', '!=', $lectorRolId)
            ->where('id', '!=', 5)
            ->get();
        $roles = Roles::all();

        // PASAR ELEMENTOS PARA EL SLIDER
        return view('backend.personal', compact('personal', 'roles'));
    }
}
