@extends('layouts.app')

@section('title', 'Categorias')

@section('content')
<div class="container mt-4">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Lista de Categorias</h1>
        <a href="{{ route('categorias.create') }}" class="btn btn-success">
            <i class="fas fa-plus"></i> Nova Categoria
        </a>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th width="10%">ID</th>
                    <th>Nome</th>
                    <th width="20%" class="text-end">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($categorias as $categoria)
                    <tr>
                        <td>{{ $categoria->id }}</td>
                        <td>
                            <form action="{{ route('categorias.update', $categoria->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PUT')
                                <div class="input-group">
                                    <input type="text" name="nome" value="{{ $categoria->nome }}" 
                                           class="form-control form-control-sm" required>
                                    <button type="submit" class="btn btn-sm btn-primary">
                                        <i class="fas fa-check"></i>
                                    </button>
                                </div>
                            </form>
                        </td>
                        <td class="text-end">
                            <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" 
                                        onclick="return confirm('Tem certeza?')">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">Nenhuma categoria cadastrada.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection