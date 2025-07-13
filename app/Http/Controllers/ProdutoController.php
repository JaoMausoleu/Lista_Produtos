<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Categoria;
use App\Http\Controllers\Controller;

class ProdutoController extends Controller
{
    public function index(){
        $produtos = Produto::with('categoria')->paginate(10);
        return view('produtos.index', compact('produtos'));
    }

   public function create()
    {
        $categorias = Categoria::all();
        return view('produtos.create', compact('categorias'));
    }

    public function store(Request $request)
    {
    $request->validate([
        'nome' => 'required|max:255',
        'preco' => 'required|numeric',
        'categoria_id' => 'required|exists:categorias,id'
    ]);

    Produto::create($request->all());

    return redirect()->route('produtos.index')->with('success', 'Produto criado com sucesso!');
    }
    
    public function edit($id)
    {   
        $produto = Produto::findOrFail($id);
        $categorias = Categoria::all();
        return view('produtos.update', compact('produto', 'categorias'));
    }

    public function update(Request $request, Produto $produto)
    {
    $validated = $request->validate([
        'nome' => 'required|string|max:255',
        'preco' => 'required|numeric|min:0',
        'categoria_id' => 'required|exists:categorias,id'
    ]);

    $produto->update($validated);

    return redirect()->route('produtos.index')->with('success', 'Produto atualizado com sucesso!');
    }

    public function destroy(Produto $produto)
    {
        $produto->delete();
        return back()->with('success', 'Produto excluído!');
    }
}


