<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Produto;
use App\Models\Mensalidade;
use App\Models\User;
use Illuminate\Http\Request;
use Session;

class MensalidadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mensalidade = Mensalidade::all();
        return view('mensalidade.index',array('mensalidade' => $mensalidade,'busca'=>null));
    }

    public function buscar(Request $request) {
        $mensalidades = Mensalidade::join('mensalidades','mensalidades.id','=','mensalidades.contato_id')
                    ->join('cliente','cliente.id','=','mensalidades.cliente_id')
                    ->select('mensalidades.*','cliente.nome','produto.nome')
                    ->where('cliente_id','=',$request->input('busca'))
                    ->orwhere('produto_id','=',$request->input('busca'))
                    ->orwhere('situacao','LIKE','%'.$request->input('busca').'%')->orwhere('cliente.nome','LIKE','%'.$request->input('busca').'%')
                    ->orwhere('produto.nome','LIKE','%'.$request->input('busca').'%');
        return view('mensalidade.index',array('mensalidades' => $mensalidades,'busca'=>$request->input('busca')));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes = Cliente::all();
        $produtos = Produto::all();
        return view('mensalidade.create',['clientes'=>$clientes,'produtos'=>$produtos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mensalidade = new Mensalidade();
        $mensalidade->nome_pessoa = $request->input('cliente_id');
        $mensalidade->situacao = $request->input('situacao');
        $mensalidade->fimmensalidade = null;

        if($mensalidade->save()) {
            return redirect('mensalidade');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mensalidade  $mensalidade
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mensalidade = mensalidade::find($id);
        return view('mensalidade.show',array('mensalidade' => $mensalidade,'busca'=>null));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mensalidade  $mensalidade
     * @return \Illuminate\Http\Response
     */

    public function pagar(Request $request, $id)
    {
    $mensalidade = Mensalidade::find($id);
    $mensalidade->created_at = \Carbon\Carbon::now();
    $mensalidade->fimmensalidade = \Carbon\Carbon::toDateTime(30);
    $mensalidade->save();

    if($mensalidade->save()) {
        Session::flash('mensagem','Mensalidade atualizada');
        return redirect('mensalidade');
    }}

    public function edit(Mensalidade $mensalidade)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mensalidade  $mensalidade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mensalidade $mensalidade)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mensalidade  $mensalidade
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mensalidade $mensalidade)
    {
        $mensalidade = Mensalidade::find($id);

        $mensalidade->delete();
        Session::flash('mensagem','Mensalidade Excluída com Sucesso');
        return redirect(url('mensalidade/'));
    }
}
