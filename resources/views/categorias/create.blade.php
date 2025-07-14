@extends('welcome')
@section('title', 'Nova Categoria')

@section('content')
<div class="conteiner mg-4">
    <h3>Nova Categoria</h3>
        <form action="{{  route('categorias.store')  }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>Nome do Categoria</label>
                <input type="text" nome="nome" id="nome" class="form-control shadow-none" placeholder="Categoria" required>
            </div>
            <button type="submit" class="btn btn-success">Adicionar Categoria</button>
            <a href="{{ route('categorias.index') }}" class="btn btn-danger">Cancelar</a>    
        </form>
</div>
@endsection