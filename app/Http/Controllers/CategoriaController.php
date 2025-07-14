<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    public function index()
        {
            $categorias = Categoria::all();
            return view('categorias.index', compact('categorias'));
        }

        public function create()
        {
            
            return view('categorias.create');
        }

        public function store(Request $request)
        {
            $request->validate([
                'nome' => 'required|string',
            ]);

            Categoria::create($request->all());
            return redirect()->route('categorias.index')->with('success', 'Categoria criada com sucesso!');
        }

        public function edit($id)
        {
            $categoria = Categoria::findOrFail($id);
            return view('categorias.edit', compact('categoria'));
        }

        public function update(Request $request, $id)
        {
            $request->validate([
                'nome' => 'required|string',
            ]);

            $categoria = Categoria::findOrFail($id);
            $categoria->update($request->all());

            return redirect()->route('categorias.index')->with('success', 'Categoria atualizada com sucesso!');
        }

        public function destroy($id)
        {
            Categoria::destroy($id);
            return redirect()->route('categorias.index')->with('success', 'Categoria excluída com sucesso!');
        }

}

