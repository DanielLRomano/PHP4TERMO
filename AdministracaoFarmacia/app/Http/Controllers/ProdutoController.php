<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produto;

class ProdutoController extends Controller
{
    //lista todos os produtos
    public function index()
    {
        $produtos = Produto::all();
        return view('produtos.index',compact('produtos'));

    }

    //abre o formulario de cadastro
    public function create()
    {
        return view('produtos.create');
    }

    // envia o formulario de cadastro
    public function store(Request $request)
    {
        $request->validate([
            'nome'=> 'required|string|max:255',
            'descricao'=> 'required',
            'categoria'=> 'required',
            'quantidade'=> 'required|numeric',
            'preco'=> 'required|numeric',
        ]);

        Produto::create($request->all());

        return redirect()->route('produtos.index')->
        with('success','Produto Criado com Sucesso');
    }

    public function edit(Produto $produto)
    {
        return view('produtos.edit',compact('produto'));
    }

    public function update(Request $request, Produto $produto)
    {
        $request->validate([
            'nome'=> 'required|string|max:255',
            'descricao'=> 'required',
            'categoria'=> 'required',
            'quantidade'=> 'required|numeric',
            'preco'=> 'required|numeric',
        ]);

        $produto->update($request->all());

        return redirect()->route('produtos.index')->
        with('success','Produto Atualizado com Sucesso');
    }

    public function destroy(Produto $produto)
    {
        $produto->delete();

        return redirect()->route('produtos.index')->
        with('success','Produto Deletado com Sucesso');
    }

    //mostrar os produtos
    public function show(Produto $produto){
        return view('produtos.show', compact('produto'));
    }

}