<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(Request $request): View
    {
        $users = User::paginate();

        return view('user.index', compact('users'))
            ->with('i', ($request->input('page', 1) - 1) * $users->perPage());
    }

    //Función que crea una nueva variable para nuestro Usuario
    public function create(): View
    {
        $user = new User();  //variable

        return view('user.create', compact('user')); //Vista de crear nuevo usuario
    }

    //Función que guarda el usuario si los datos son correctos
    public function store(UserRequest $request): RedirectResponse
    {
        User::create($request->validated());    //valida los campos

        return Redirect::route('users.index')   //Lo redirige a la tabla de usuarios
            ->with('success', 'User created successfully.');
    }

    //Función que busca a un usuario por medio del ID pa mostrarlo
    public function show($id): View
    {
        $user = User::find($id);

        return view('user.show', compact('user')); //Vista que hacer el método Read
    }

    //Función para poder editar a un usuario
    public function edit($id): View
    {
        $user = User::find($id);    //Busca al usuario seleccionado...

        return view('user.edit', compact('user'));  //Lo manda a la vista de Editar
    }

    //Función para realizar la modificación
    public function update(UserRequest $request, User $user): RedirectResponse
    {
        $user->update($request->validated());   //Valida los campos...

        return Redirect::route('users.index')   //Lo devuelve a la tabla de usuarios si todo esta correcto
            ->with('success', 'User updated successfully');
    }

    //Función que elimina un usuario seleccionado
    public function destroy($id): RedirectResponse
    {
        User::find($id)->delete();

        return Redirect::route('users.index')
            ->with('success', 'User deleted successfully');
    }
}
