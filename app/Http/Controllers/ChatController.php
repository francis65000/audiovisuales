<?php

namespace App\Http\Controllers;
use App\Models\Chat;
use Carbon\Carbon;

use Illuminate\Http\Request;

class ChatController extends Controller
{
    //insertar registro en la BD
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validatedData = $request->validate([
            'mensaje' => 'required|string',
        ]);

        // Crear un nuevo chat en la base de datos
        Chat::create([
            'nombre_usuario' => $request->nombre_usuario,
            'fecha' => $request->fecha,
            'hora' => Carbon::now()->format('H:i:s'), // Hora actual,
            'mensaje' => $request->mensaje,
        ]);

        // Redireccionar o mostrar un mensaje de éxito
        return redirect()->back()->with('success', 'Chat enviado correctamente.');
    }

    //eliminar registro en la BD
    public function destroy()
{
    // Vaciar la tabla de mensajes de chat
    Chat::truncate();

    // Redireccionar o mostrar un mensaje de éxito
    return redirect()->back()->with('success', 'Todos los mensajes de chat han sido eliminados correctamente.');
}

}
