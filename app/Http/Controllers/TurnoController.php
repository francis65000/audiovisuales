<?php

namespace App\Http\Controllers;

use App\Models\Turnos;
use App\Models\Diassemanacultural;

use Illuminate\Http\Request;

class TurnoController extends Controller
{
    public function editar($diaId)
    {

        $dia = Diassemanacultural::findOrFail($diaId); // Suponiendo que tienes un modelo Dia
        $turnos = Turnos::where('dia', $diaId)->get();

        // Para asegurarnos de que existan los turnos para las 6 horas, creamos un array base
        $horas = range(1, 6);
        $turnosPorHora = [];

        foreach ($horas as $hora) {
            $turnosPorHora[$hora] = $turnos->firstWhere('hora', $hora) ?? new Turnos(['hora' => $hora, 'dia' => $diaId]);
        }

        return view('backend.editaturnos', compact('dia', 'turnosPorHora'));
    }


    public function actualizar(Request $request, $diaId)
    {
        $turnosData = $request->input('turnos', []);

        foreach ($turnosData as $hora => $personal) {
            Turnos::updateOrCreate(
                ['dia' => $diaId, 'hora' => $hora],
                ['personal' => $personal]
            );
        }

        //actualizar el dia en la tabla dissemanacultural
        Diassemanacultural::where('id', $diaId)->update([
            'fecha' => $request->fecha,  // Almacena la fecha actual en formato 'YYYY-MM-DD'
            'dia' => $request->dia  // Usa el valor personalizado del día que pases en $dia
        ]);


        return redirect()->route('cuadranteTurnos.show')->with('success', 'Turnos actualizados correctamente');
    }

    public function vaciarPersonal()
    {
        // Vaciar la columna 'personal' estableciendo su valor a una cadena vacía
        Turnos::query()->update(['personal' => '']);

        return redirect()->back()->with('mensaje', 'Tabla turnos vaciada con éxito.');
    }

}
