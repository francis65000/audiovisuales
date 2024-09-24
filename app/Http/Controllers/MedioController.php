<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medio;

class MedioController extends Controller
{
    /**
     * Elimina un recurso específico.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        // Busca el medio por su ID
        $medio = Medio::findOrFail($id);

        // Elimina el medio
        $medio->delete();

        // Redirige a la página anterior con un mensaje de éxito
        return redirect()->back()->with('success', 'El medio ha sido eliminado correctamente.');
    }
}
