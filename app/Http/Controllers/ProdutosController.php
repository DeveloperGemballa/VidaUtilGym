<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

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
        $produtopromo = Produto::find(9);
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
        if ((Auth::check()) && (Auth::user()->isAdmin())) {
        $categorias = Categoria::all();
        return view('produto.create',['categorias'=>$categorias]);
    }
    else {
        return redirect('login');
    }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ((Auth::check()) && (Auth::user()->isAdmin())) {
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
    else {
        return redirect('login');
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
        if ((Auth::check()) && (Auth::user()->isAdmin())) {
        $categorias = Categoria::all();
        $produto = Produto::find($id);
        return view("produto.edit",array("produto"=>$produto,'categorias'=>$categorias));
    }
    else {
        return redirect('login');
    }
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
        if ((Auth::check()) && (Auth::user()->isAdmin())) {
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
        else {
            return redirect('login');
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
