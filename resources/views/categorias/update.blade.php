@extends('layouts.app')

@section('title', 'Nova Categoria')

@section('content')
<form action="{{ route('categorias.update', $categoria->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label>Nome da Categoria</label>
        <input type="text" name="nome" class="form-control" 
               value="{{ old('nome', $categoria->nome) }}" required>
    </div>
    <button type="submit" class="btn btn-primary">Atualizar</button>
</form>
@endsection