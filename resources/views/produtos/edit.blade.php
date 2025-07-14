@extends('welcome')

@section('content')
<form action="{{ route('produtos.update', $produto) }}" method="POST" class="space-y-4">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="nome" class="form-label">Nome do Produto</label>
        <input type="text" class="form-control" name="nome" value="{{ ($produto->nome) }}" required>
    </div>

    <div class="mb-3">
        <label for="preco" class="form-label">Preço</label>
        <input type="number" step="0.01" class="form-control" name="preco" value="{{ ($produto->preco) }}" required>
    </div>

    <div class="mb-3">
        <label>Categoria</label>
        <select name="categoria_id" class="form-control" required>
            @foreach($categorias as $categoria)
                <option value="{{ $categoria->id }}" {{ $categoria->id == $produto->categoria_id ? 'selected' : '' }}>{{ $categoria->nome }}</option>
            @endforeach
        </select>
    </div>
    <button class="btn btn-success">Atualizar</button>
    <a href="{{ route('produtos.index') }}" class="btn btn-danger">Cancelar</a>



</from>

@endsection