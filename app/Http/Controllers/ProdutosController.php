<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Produto;
use App\Models\Categoria;
use Session;

class ProdutosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos = Produto::all();
        $produtopromo = Produto::find(8);
        $produtoscarousel = Produto::all();
        return view("produto.index", array('produtos' => $produtos,'produtopromo' => $produtopromo,'produtoscarousel' => $produtoscarousel));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::all();
        return view('produto.create',['categorias'=>$categorias]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $produto = new Produto();
        $produto->nome = $request->input('nome');
        $produto->funcao = $request->input('funcao');
        $produto->preco = $request->input('preco');
        $produto->nome_categoria = $request->input('nome_categoria');

        if($produto->save()) {
            if($request->hasFile('foto'))
            {
                $imagem = $request->file('foto');
                $nomearquivo = md5($produto->id).".".$imagem->getClientOriginalExtension();
                $request->file('foto')->move(public_path('.\img\produtos'),$nomearquivo);
            }
            return redirect('produto');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categorias = Categoria::all();
        $produto = Produto::find($id);
        return view("produto.show",["produto"=>$produto,'categorias'=>$categorias]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categorias = Categoria::all();
        $produto = Produto::find($id);
        return view("produto.edit",array("produto"=>$produto,'categorias'=>$categorias));
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
        if($request->hasFile('foto'))
            {
                $imagem = $request->file('foto');
                $nomearquivo = md5($produto->id).".".$imagem->getClientOriginalExtension();
                $request->file('foto')->move(public_path('.\img\produtos'),$nomearquivo);
            }
        $produto = Produto::find($id);
        $produto->nome = $request->input('nome');
        $produto->funcao = $request->input('funcao');
        $produto->preco = $request->input('preco');
        $produto->nome_categoria = $request->input('nome_categoria');
        if($produto->save()) {
            Session::flash('mensagem','Produto alterado com sucesso');
            return redirect()->back();
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
