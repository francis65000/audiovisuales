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

    /**
     * Muestra el formulario para crear un nuevo recurso.
     *
     * @return \Illuminate\View\View
     */
    public function crearMedio()
    {
        return view('backend.nuevodrive');
    }

    /**
     * Almacena un recurso recién creado en el almacenamiento.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Valida los datos del formulario y verifica si 'anio' ya existe
        $request->validate([
            'anio' => 'required|string|max:255|unique:medios,anio',
            'url' => 'required|string|max:255',
        ], [
            'anio.unique' => 'El curso con este año ya existe en la base de datos.',
        ]);

        // Si pasa la validación, crea un nuevo medio con los datos del formulario
        Medio::create($request->all());

        // Redirige a la página anterior con un mensaje de éxito
        return redirect()->to('/panel/medios-drive')->with('success', 'El medio ha sido creado correctamente.');
    }
}
