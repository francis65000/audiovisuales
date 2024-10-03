<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Roles;
use App\Models\User;
use App\Models\Personal;
use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller
{
    //
    public function crearPersonal(Request $request)
    {
         // Filtramos los IDs de personal que queremos obtener

         // Obtener los registros de personal filtrados por ID
         $roles = Roles::all();
         
         // Combina los resultados para pasarlos a la vista
         return view('backend.nuevopersonal', compact('roles'));
    }

    //añadir nuevo usuario a la tabla user y a la tabla personal
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required',
            'name' => 'required',
            'aula' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'rol_id' => 'required',
        ]);

        // Crear un nuevo usuario
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        // Crear un nuevo registro de personal
        $personal = new Personal();
        $personal->nombre = $request->nombre;
        $personal->apellido = "Por defecto";
        $personal->rol_id = $request->rol_id;
        $personal->aula = $request->aula;
        $personal->save();

        // Redirigir a la página de personal
        return redirect()->route('personal.gestion');
    }

    //editar usuario
    public function editarPersonal($id)
    {
        // Obtener el usuario a editar
        $personal = Personal::find($id);
        $user = User::where('name', $personal->nombre)->first();
        $roles = Roles::all();
        // Pasar el usuario a la vista
        return view('backend.editarpersonal', compact('personal', 'roles', 'user'));
    }
}
