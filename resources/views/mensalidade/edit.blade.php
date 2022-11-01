@extends('layout.app')
@section('title','Alteração Cliente {{$cliente->nome}}')
@section('content')
    <h1>Alteração cliente {{$cliente->nome}}</h1>
    @if(Session::has('mensagem'))
        <div class="alert alert-success">
            {{Session::get('mensagem')}}
        </div>
    @endif
    <br />
    {!! Form::open(['route' => ['admin.update', $cliente->id],'method' => 'PUT']) !!}
    {!! Form::label('nome', 'Nome') !!}
    {!! Form::text('nome', $cliente->nome, ['class'=>'form-control', 'required', 'placeholder' =>'Nome completo']) !!}
    
    {!! Form::label('cpf', 'CPF') !!}
    {!! Form::number('cpf', $cliente->cpf, ['class'=>'form-control', 'required', 'placeholder' =>'Cpf completo']) !!}
    
    {!! Form::label('endereco', 'Endereço') !!}
    {!! Form::text('endereco', $cliente->endereco, ['class'=>'form-control', 'required', 'placeholder' =>'Endereço residencial']) !!}
    
    {!! Form::label('telefone', 'Telefone') !!}
    {!! Form::tel('telefone', $cliente->telefone, ['class'=>'form-control', 'required', 'placeholder' =>'Telefone para contato']) !!}
    
    {!! Form::label('email', 'E-mail') !!}
    {!! Form::email('email', $cliente->email, ['class'=>'form-control', 'required', 'placeholder' =>'E-mail ']) !!}

    {!! Form::label('situacao', 'Situação') !!}
    {!! Form::text('situacao', $cliente->situacao, ['class'=>'form-control', 'required', 'placeholder' =>'Situação da mensalidade ']) !!}
    <hr>
    {!! Form::submit('Salvar alteração',['class'=>'btn btn-primary shadow']) !!} |
    {!!Form::button('UNDo',['onclick'=>'javascript:history.go(-1)', 'class'=>'btn btn-secondary shadow'])!!}
    <a href="/admin" class="btn btn-warning">voltar</a>
    {!! Form::close() !!}
@endsection