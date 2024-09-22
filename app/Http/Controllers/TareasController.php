<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest; // Importa el Form Request
use Illuminate\Support\Facades\Auth;
use App\Models\Tareas; // Importa el modelo Task

use Illuminate\Http\Request;

class TareasController extends Controller
{
    public function crearTarea()
    {
        return view('backend.nuevatarea'); // Asegúrate de que esta vista exista
    }

    public function store(Request $request)
    {
        // Validación de los datos
        $validatedData = $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'fecha' => 'required|date',
            'estado' => 'required|string',
            'categoria' => 'required|string',
            'creado_por' => 'required|string|max:255',
            'actualizado_por' => 'nullable|string|max:255',

        ]);

        // Lógica para crear la tarea
        Tareas::create($validatedData);
        return redirect()->to('/panel/cuadrante-tareas')->with('success', 'Tarea creada exitosamente.');
    }

    //Eliminar tarea
    public function destroy($id)
    {
        $task = Tareas::findOrFail($id);
        $task->delete();

        return redirect()->to('/panel/cuadrante-tareas')->with('success', 'Tarea eliminada exitosamente.');
    }

    //Cambio a estado en proceso
    public function updateEstado($id)
    {
        $task = Tareas::findOrFail($id);
        $task->estado = 2; // Cambia el estado a 2
        $task->actualizado_por = Auth::user()->name; // Registra quién actualiza el estado
        $task->save();

        return redirect()->to('/panel/cuadrante-tareas')->with('success', 'Estado actualizado a "En proceso" exitosamente.');
    }

    //Cambio a estado en proceso
    public function cerrarTarea($id)
    {
        $task = Tareas::findOrFail($id);
        $task->estado = 3; // Cambia el estado a 2
        $task->actualizado_por = Auth::user()->name; // Registra quién actualiza el estado
        $task->save();

        return redirect()->to('/panel/cuadrante-tareas')->with('success', 'Estado actualizado a "Terminada" exitosamente.');
    }
}
