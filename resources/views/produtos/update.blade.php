@extends('layouts.app')

@section('title', 'Editar Produto')

@section('content')
<div class="container mt-4">
    <h1>Editar Produto</h1>
    
    <form action="{{ route('produtos.update', $produto->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label>Nome do Produto</label>
            <input type="text" name="nome" class="form-control" 
                   value="{{ old('nome', $produto->nome) }}" required>
        </div>
        
        <div class="mb-3">
            <label>Preço (R$)</label>
            <input type="number" step="0.01" name="preco" class="form-control"
                   value="{{ old('preco', $produto->preco) }}" required>
        </div>
        
        <div class="mb-3">
            <label>Categoria</label>
            <select name="categoria_id" class="form-control" required>
                @foreach($categorias as $cat)
                    <option value="{{ $cat->id }}" 
                        {{ $produto->categoria_id == $cat->id ? 'selected' : '' }}>
                        {{ $cat->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mt-3">
            <button type="submit" class="btn btn-primary">Atualizar</button>
            <a href="{{ route('produtos.index') }}" class="btn btn-light">Cancelar</a>
        </div>
    </form>
</div>
@endsection