<?php

namespace App\Http\Controllers;

use App\Models\Recetum;
use App\Models\Cliente;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\RecetumRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class RecetumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $receta = Recetum::paginate();

        return view('recetum.index', compact('receta'))
            ->with('i', ($request->input('page', 1) - 1) * $receta->perPage());
    }

    //Función que nos manda a la vista de crear una receta
    public function create(): View
    {
        $recetum = new Recetum();   //crea una variable

        //Variable que muestra todos los clientes de nuestra tabla Clientes para la asignación de la llave foranea
        $clientes = Cliente::all();
        return view('recetum.create', compact('recetum', 'clientes'));
    }

    //Función que guarda nuestra Receta una vez que valida los datos
    public function store(RecetumRequest $request): RedirectResponse
    {
        Recetum::create($request->validated());

        return Redirect::route('receta.index')
            ->with('success', 'Recetum created successfully.');
    }

    //Funcón que muestra las recetas en una tabla
    public function show($id): View
    {
        $recetum = Recetum::find($id);

        return view('recetum.show', compact('recetum'));
    }

    //Función que nos manda a la vista Editar cuando seleccionamos un cliente
    public function edit($id): View
    {
        $recetum = Recetum::find($id);
        $clientes = Cliente::all();
        return view('recetum.edit', compact('recetum', 'clientes'));
    }

    //Función que realiza la modificación de nuestra receta
    public function update(RecetumRequest $request, Recetum $recetum): RedirectResponse
    {
        $recetum->update($request->validated());

        return Redirect::route('receta.index')
            ->with('success', 'Recetum updated successfully');
    }

    //Función que elimina la receta seleccionada
    public function destroy($id): RedirectResponse
    {
        Recetum::find($id)->delete();

        return Redirect::route('receta.index')
            ->with('success', 'Recetum deleted successfully');
    }
}
