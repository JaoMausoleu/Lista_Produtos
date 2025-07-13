@extends('layouts.app')

@section('title', 'Novo Produto')

@section('content')
<div class="container mt-4">
    <h1>Novo Produto</h1>
    
    <form action="{{ route('produtos.store') }}" method="POST">
        @csrf
        
        <div class="mb-3">
            <label>Nome do Produto</label>
            <input type="text" name="nome" class="form-control" required>
        </div>
        
        <div class="mb-3">
            <label>Preço (R$)</label>
            <input type="number" step="0.01" name="preco" class="form-control" required>
        </div>
        
        <div class="mb-3">
            <label>Categoria</label>
            <select name="categoria_id" class="form-control" required>
                @foreach($categorias as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->nome }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="mt-3">
            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="{{ route('produtos.index') }}" class="btn btn-light">Voltar</a>
        </div>
    </form>
</div>
@endsection