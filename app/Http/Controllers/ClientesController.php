<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Mensalidade;
use Session;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Cliente::all();
        return view("cliente.index", array('clientes' => $clientes));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mensalidade = Mensalidade::all();
        return view('cliente.create',['mensalidade'=>$mensalidade]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Cliente = new Cliente();
        $Cliente->nome = $request->input('nome');
        $Cliente->cpf = $request->input('cpf');
        $Cliente->endereco = $request->input('endereco');
        $Cliente->telefone = $request->input('telefone');
        $Cliente->email = $request->input('email');
        $Cliente->situacao = $request->input('situacao');
        if($Cliente->save())
        {
            return redirect('admin');
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
        $cliente = Cliente::find($id);
        return view('cliente.show',array('cliente'=>$cliente));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente = Cliente::find($id);
        return view("cliente.edit",array("cliente"=>$cliente));
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
        $Cliente = Cliente::find($id);
        $Cliente->nome = $request->input('nome');
        $Cliente->cpf = $request->input('cpf');
        $Cliente->endereco = $request->input('endereco');
        $Cliente->telefone = $request->input('telefone');
        $Cliente->email = $request->input('email');
        $Cliente->situacao = $request->input('situacao');
        if($Cliente->save())
        {
            Session::flash('mensagem','Contato alterado com sucesso');
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
        $cliente = Cliente::find($id);

        $cliente->delete();
        Session::flash('mensagem','Cliente Excluído com Sucesso');
        return redirect(url('admin/'));
    }
}
