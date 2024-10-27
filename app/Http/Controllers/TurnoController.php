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

        return redirect()->route('cuadranteTurnos.show')->with('success', 'Turnos actualizados correctamente');
    }
}
