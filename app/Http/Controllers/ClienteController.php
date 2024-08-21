<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ClienteRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

//Controller de nuestro Cliente
class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $clientes = Cliente::paginate();

        return view('cliente.index', compact('clientes'))
            ->with('i', ($request->input('page', 1) - 1) * $clientes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */

     //Función para crear un nuevo Cliente
     //Primero crea una varible de cliente al ingresar a la vista "cliente.create"...
    public function create(): View
    {
        $cliente = new Cliente();

       return view('cliente.create', compact('cliente'));
    }

     //Guarda nuestro cliente si todo los campos han sido rellenados correctamente
    public function store(ClienteRequest $request): RedirectResponse
    {
        Cliente::create($request->validated());

        return Redirect::route('clientes.index')
            ->with('success', 'Cliente created successfully.');
    }


    //Muestra un listado de todos nuestro clientes
    public function show($id): View
    {
        $cliente = Cliente::find($id);

        return view('cliente.show', compact('cliente'));
    }

    //Función que nos manda a la vista de modificación del cliente que seleccionamos
    public function edit($id): View
    {
        $cliente = Cliente::find($id);

        return view('cliente.edit', compact('cliente'));
    }

    //Función que valida y realiza la modificación de nuestro cliente
    public function update(ClienteRequest $request, Cliente $cliente): RedirectResponse
    {
        $cliente->update($request->validated()); //Valida y modifica al cliente

        return Redirect::route('clientes.index')       //Y nos manda a la tabla de usuarios
            ->with('success', 'Cliente updated successfully');
    }

    //Función que elimina al cliente seleccionado
    public function destroy($id): RedirectResponse
    {
        Cliente::find($id)->delete();   //Busca y elimina el cliente

        return Redirect::route('clientes.index') //Y nos redirige a nuestra tabla de clientes
            ->with('success', 'Cliente deleted successfully');
    }
}
