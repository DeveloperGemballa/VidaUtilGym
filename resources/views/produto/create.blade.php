@extends('layout.app')
@section('title','Criar novo produto')
@section('content')
<div class="shadow alert">
    
    <h1 class="display-4">novo produto: </h1>
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
    {!! Form::open(['route' => 'produto.store', 'method' => 'POST']) !!}
    {!! Form::label('nome', 'Nome') !!}
    {!! Form::text('nome', '', ['class'=>'form-control', 'required', 'placeholder' =>'Nome completo']) !!}
    
    {!! Form::label('funcao', 'Função/Descrição') !!}
    {!! Form::text('funcao', '', ['class'=>'form-control', 'required', 'placeholder' =>'Cpf completo']) !!}
    
    {!! Form::label('preco', 'Preço') !!}
    {!! Form::text('preco', '', ['class'=>'form-control', 'required', 'placeholder' =>'Endereço residencial']) !!}
    
    {!! Form::label('nome_categoria', 'nome_categoria') !!}
    {!! Form::text('nome_categoria', '', ['class'=>'form-control', 'required', 'placeholder' =>'Telefone para contato','list'=>'listcategorias']) !!}
    <datalist id='listcategorias'>
        @foreach($categorias as $categoria)
            <option value="{{$categoria->nome}}"></option>
        @endforeach
    </datalist>
    <hr>
    {!! Form::submit('Salvar',['class'=>'btn btn-primary shadow']) !!} |
    {!!Form::button('Cancelar',['onclick'=>'javascript:history.go(-1)', 'class'=>'btn btn-secondary shadow'])!!}
    {!! Form::close() !!}
</div>
@endsection