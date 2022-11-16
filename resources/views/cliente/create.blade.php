@extends('layout.app')
@section('title','Criar novo Contato')
@section('content')
<br>
<br>
<br>
<div class="alert container">
    
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

    <hr>
    {!! Form::submit('Salvar',['class'=>'btn shadow', 'style' =>'background:#c21a01;
        color:white;']) !!} |
    {!!Form::button('Cancelar',['onclick'=>'javascript:history.go(-1)', 'class'=>'btn btn-secondary shadow'])!!}
    {!! Form::close() !!}
</div>
@endsection