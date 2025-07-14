@extends('welcome')

@section('content')
<body>
    <div class="container mt-5">
        <h1>Nossas Categorias</h1>

        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($categorias as $categoria)
                    <tr>
                        <td>{{$categoria->id}}</td>
                        <td>{{$categoria->nome}}</td>
                        <td>
                            <a href="{{ route('categorias.edit', $categoria->id) }}" class="btn btn-sm btn-primary">
                                <i class="bi bi-pencil"></i>
                            </a>

                            <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza?')">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </from>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4"> Nenhum produto cadastrado.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <a href="{{ route('categorias.create') }}" class="btn btn-outline-secondary">
            <i class="bi bi-plus-lg"></i> Adicionar
        </a>
</body>
@endsection