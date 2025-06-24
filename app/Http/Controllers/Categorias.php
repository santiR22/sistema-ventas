<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Auth;
use Illuminate\Http\Request;

class Categorias extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $titulo = 'Administrar Categorias';
        $items = Categoria::all();
        return view('modules.categorias.index', compact('titulo', 'items'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $titulo = 'Crear Categoria';
        return view('modules.categorias.create', compact('titulo'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $item = new Categoria(); // Crear una nueva instancia del modelo Categoria
        $item->user_id = Auth::user()->id;// Asignar el ID del usuario autenticado
        $item->nombre = $request->input('nombre');// Obtener el nombre de la categoría del formulario
        $item->save(); // Guardar la categoría en la base de datos
        return to_route("categorias");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $titulo = "Detalles de la Categoría";
        $item = Categoria::find($id); // Buscar la categoría por ID
        return view('modules.categorias.show', compact('item', 'titulo')); // Pasar la categoría a la vista
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $titulo = 'Editar Categoria';
        $item = Categoria::find($id); // Buscar la categoría por ID
        return view('modules.categorias.edit', compact('titulo', 'item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $item = Categoria::find($id);
        $item->nombre = $request->input('nombre');
        $item->save(); // Guardar los cambios en la categoría
        return to_route('categorias');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Categoria::find($id);
        $item->delete();
        return to_route('categorias');
    }
}
