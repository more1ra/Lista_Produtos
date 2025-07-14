@extends('welcome')
@section('title', 'Novo Produto')

@section('content')
    <h3>Novo Produto</h3>
    <form action="{{  route('produtos.store')  }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nome do Produto</label>
            <input type="text" nome="nome" class="form-control shadow-none" placeholder="Nome" required>
        </div>
        <div class="mb-3">
            <label>Preço do Produto</label>
            <input type="number" nome="preco" step="0.01" class="form-control shadow-none" placeholder="Preço" required>
        </div>
        <div class="mb-3">
            <label>Categoria</label>
            <select name="categoria_id" class="form-control" required>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-outline-secondary">Adicionar Produto</button>
        <a href="{{ route('produtos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
