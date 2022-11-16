<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

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
        if ((Auth::check()) && (Auth::user()->isAdmin())) {
            $clientes = Cliente::all();
            return view('mensalidade.create',['clientes'=>$clientes]);
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
        $PRAZO_MENSALIDADE = 30;
        if ((Auth::check()) && (Auth::user()->isAdmin())) {
            $this->validate($request,[
                'nome_pessoa' => 'required|min:3',
                'situacao' => 'required',
            ]);
        $mensalidade = new Mensalidade();
        $mensalidade->nome_pessoa = $request->input('cliente_id');
        $mensalidade->situacao = \Carbon\Carbon::createFromFormat('d/m/Y H:i:s', $request->input('datahora'));
        $mensalidade->fimmensalidade = null;
        $mensalidade->created_at = \Carbon\Carbon::now();
        $mensalidade->updated_at =null;

        if($mensalidade->save()) {
            return redirect('mensalidade');
        }
    }
    else {
        return redirect('login');
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
        if ((Auth::check()) && (Auth::user()->isAdmin())) {
    $mensalidade = Mensalidade::find($id);
    $mensalidade->updated_at = \Carbon\Carbon::now();
    $mensalidade->save();
        if($mensalidade->save()) {
            Session::flash('mensagem','Mensalidade atualizada');
            return redirect('mensalidade');
        }
    }
    else {
        return redirect('login');
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
    public function destroy($id)
    {
        if ((Auth::check()) && (Auth::user()->isAdmin())) {
        $mensalidade = Mensalidade::find($id);

        $mensalidade->delete();
        Session::flash('mensagem','Mensalidade Excluída com Sucesso');
        return redirect(url('mensalidade/'));
    }
    else {
        return redirect('login');
    }
    }
}
