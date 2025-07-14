@extends('welcome')

@section('content')

    <div class="container mg-4">
        <h2>Editar Categoria</h2>

        <form action="{{ route('categorias.update', $categoria->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Nome</label>
                <input type="text" name="nome" class="form-control" value="{{ $categoria->nome }}" required>
            </div>

            <button class="btn btn-primary">Atualizar</button>
            <a href="{{ route('categorias.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>


@endsection