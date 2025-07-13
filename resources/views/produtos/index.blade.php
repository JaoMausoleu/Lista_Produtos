@extends('layouts.app')

@section('title', 'Produtos')

@section('content')
<div class="container mt-5">
    <!-- Cabeçalho e Botão de Adicionar -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Nossos Produtos</h1>
        <a href="{{ route('produtos.create') }}" class="btn btn-success">
            + Novo Produto
        </a>
    </div>

    <!-- Tabela de Produtos -->
    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Produto</th>
                <th scope="col">Preço</th>
                <th scope="col">Categoria</th>
                <th scope="col" class="text-center">Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse($produtos as $produto)
                <tr>
                    <td>{{ $produto->id }}</td>
                    <td>{{ $produto->nome }}</td>
                    <td>R$ {{ number_format($produto->preco, 2, ',', '.') }}</td>
                    <td>{{ $produto->categoria?->nome ?? '-' }}</td>
                    <td class="text-center">
                    
                        <a href="{{ route('produtos.edit', $produto->id) }}" 
                           class="btn btn-sm btn-warning" title="Editar">
                            Editar
                        </a>
                        
                       
                        <form action="{{ route('produtos.destroy', $produto->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" 
                                    title="Excluir"
                                    onclick="return confirm('Tem certeza que deseja excluir?')">
                                Excluir
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Nenhum produto cadastrado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection