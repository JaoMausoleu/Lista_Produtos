@extends('layouts.app')

@section('title', 'Nova Categoria')

@section('content')
<div class="container mt-4">
    <h1>Adicionar Categoria</h1>
    
    <form action="{{ route('categorias.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Nome da Categoria</label>
            <input type="text" name="nome" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Salvar</button>
    </form>
</div>
@endsection