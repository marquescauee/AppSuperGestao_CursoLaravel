<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\Produto;
use App\Models\PedidoProduto;

class PedidoProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Pedido $pedido)
    {
        $produtos = Produto::all();
        $pedido->produtos;

        return view('app.pedido_produto.create', ['pedido' => $pedido, 'produtos' => $produtos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Pedido $pedido)
    {
        $regras = [
            'produto_id' => 'exists:produtos,id',
            'quantidade' => 'required'
        ];

        $feedback = [
            'required' => 'O campo :attribute deve possui um valor válido',
            'produto_id.exists' => 'O produto informado nao existe'
        ];

        $request->validate($regras, $feedback);

        echo $pedido->id . ' - '. $request->get('produto_id');

        /*
            $pedidoProduto = new PedidoProduto();
            $pedidoProduto->pedido_id = $pedido->id;
            $pedidoProduto->produto_id = $request->get('produto_id');
            $pedidoProduto->quantidade = $request->get('quantidade');
            $pedidoProduto->save();
        */

        $pedido->produtos()->attach([
            $request->get('produto_id') => ['quantidade' => $request->get('quantidade')]
        ]);

        return redirect()->route('pedido-produto.create', ['pedido' => $pedido->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  PedidoProduto  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PedidoProduto $pedidoProduto, $pedido_id)
    {
        $pedidoProduto->delete();

        return redirect()->route('pedido-produto.create', ['pedido' => $pedido_id]);
    }
}
