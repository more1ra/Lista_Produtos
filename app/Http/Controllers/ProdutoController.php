<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Categoria;

class ProdutoController extends Controller
{
    public function index(){
        $produtos = Produto::with('categoria')->get();

        return view('produtos.index', compact('produtos'));
    }

    public function create(){
        $categorias = \App\Models\Categoria::all();
        return view('produtos.create', compact('categorias'));
    }

    public function store(Request $request){
        $request->validate([
            'nome' => 'required',
            'preco' => 'required|numeric',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        Produto::create($request->all());

        
        return redirect()->route('produtos.index');
    }

    public function edit($id){
        $produto = Produto::findOrFail($id);
        $categorias = Categoria::all();
        return view('produtos.edit', compact('produto', 'categorias'));
    }

    public function update(Request $request, $id){
        $produto = Produto::findOrFail($id);
        $request->validate([
            'nome' => 'required',
            'preco' => 'required|numeric',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        $produto->update($request->all());
        return redirect()->route('produtos.index');
    }

    public function destroy($id){
        Produto::findOrFail($id)->delete();
        return redirect()->route('produtos.index');
    }
}