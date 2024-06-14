<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //vai exibir a tabela com todos os produtos
        $produtos = Produto::all();
        return view("produto.index", compact('produtos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Mostrar formulário de cadastro do produto
        //Método Get
        return view('produto.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Produto::create([
            'nome' => $request->input('nome'),
            'preco' => $request->input('preco'),
            'categoria' => $request->input('categoria')
        ]);
        $data = $request->all();
        // dd($data);

        return redirect()->route('produtos.index')->with('success', 'Produto criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $produtos = Produto::findorFail($id);
        return view("produto.edit", compact('produtos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $produtos = Produto::findorFail($id);
        $produtos->update([
            'nome' => $request->input('nome'),
            'preco' => $request->input('preco'),
            'categoria'=> $request->input('categoria')
        ]);
        return redirect()->route('produtos.index')->with('success', 'Registro alterado com sucesso');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $produtos = Produto::findorFail($id);
        $produtos->delete();
        return redirect()->route('produtos.index')->with('success', 'Registro excluído com sucesso');
    }

    public function delete(string $id) {
        $produtos = Produto::findorFail($id);
        return view("produto.delete", compact('produtos'));

    }

}
