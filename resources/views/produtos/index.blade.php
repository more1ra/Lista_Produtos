@extends('welcome')
@section('content')
<body>

    <div class="container mt-5">
        <h1>Nossos Produtos</h1>

        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Produto</th>
                    <th scope="col">Preço</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($produtos as $produto)
                    <tr>
                        <td>{{$produto->id}}</td>
                        <td>{{$produto->nome}}</td>
                        <td>{{number_format($produto->preco, 2, ',', '.')}}</td>
                        <td>{{$produto->categoria?->nome}}</td>
                        <td>
                            <a href="{{ route('produtos.edit', $produto->id) }}" class="btn btn-sm btn-primary">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <form action="{{ route('produtos.destroy', $produto->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Tem certeza que deseja excluir?')">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5"> Nenhum produto cadastrado.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <a href="{{ route('produtos.create') }}" class="btn btn-outline-secondary">
            <i class="bi bi-plus-lg"></i> Adicionar
        </a>
    </div>

</body>
@endsection