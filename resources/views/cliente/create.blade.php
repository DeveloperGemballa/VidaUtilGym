@extends('layout.app')
@section('title','Criar novo Contato')
@section('content')
<div class="shadow alert">
    
    <h1 class="display-4">Criar novo Cadastro: </h1>
    @if(count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>
                {{$error}}
            </li>
            @endforeach
        </ul>
    </div>
    @endif
    {!! Form::open(['route' => 'admin.store', 'method' => 'POST']) !!}
    {!! Form::label('nome', 'Nome') !!}
    {!! Form::text('nome', '', ['class'=>'form-control', 'required', 'placeholder' =>'Nome completo']) !!}
    
    {!! Form::label('cpf', 'CPF') !!}
    {!! Form::number('cpf', '', ['class'=>'form-control', 'required', 'placeholder' =>'Cpf completo']) !!}
    
    {!! Form::label('endereco', 'Endereço') !!}
    {!! Form::text('endereco', '', ['class'=>'form-control', 'required', 'placeholder' =>'Endereço residencial']) !!}
    
    {!! Form::label('telefone', 'Telefone') !!}
    {!! Form::tel('telefone', '', ['class'=>'form-control', 'required', 'placeholder' =>'Telefone para contato']) !!}
    
    {!! Form::label('email', 'E-mail') !!}
    {!! Form::email('email', '', ['class'=>'form-control', 'required', 'placeholder' =>'E-mail ']) !!}

    {!! Form::label('situacao', 'Situação') !!}
    {!! Form::text('situacao', '', ['class'=>'form-control', 'required', 'placeholder' =>'Situação da mensalidade ']) !!}
    <hr>
    {!! Form::submit('Salvar',['class'=>'btn btn-primary shadow']) !!} |
    {!!Form::button('Cancelar',['onclick'=>'javascript:history.go(-1)', 'class'=>'btn btn-secondary shadow'])!!}
    {!! Form::close() !!}
</div>
@endsection