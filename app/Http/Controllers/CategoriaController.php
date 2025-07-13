<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $categorias = Categoria::all();

        return view('categorias.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        {
        $request->validate(['nome' => 'required|string|max:255|unique:categorias']);

        Categoria::create($request->only('nome'));

        return redirect()->route('categorias.index')->with('success', 'Categoria criada com sucesso!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categoria $categoria)
    {
        return view('categorias.edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categoria $categoria)
    {
    $request->validate(['nome' => 'required|string|max:255|unique:categorias,nome,'.$categoria->id]);
    $categoria->update($request->only('nome'));
    return back()->with('success', 'Categoria atualizada!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categoria $categoria)
    {
    $categoria->delete();
    return back()->with('success', 'Categoria excluída!');
    }
}
