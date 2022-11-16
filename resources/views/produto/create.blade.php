@extends('layout.app')
@section('titleweb','Criar novo produto')
@section('motivation')
<h1 class="display-4">Cadastro de novo produto</h1>
@endsection
@section('content')
<br>
<br>
<br>
<div class="alert container">
    
    <h1 class="display-4">Novo produto: </h1>
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
    {!! Form::open(['route' => 'produto.store', 'method' => 'POST', 'enctype'=>'multipart/form-data']) !!}
    {!! Form::label('nome', 'Nome') !!}
    {!! Form::text('nome', '', ['class'=>'form-control', 'required', 'placeholder' =>'Nome do produto']) !!}
    
    {!! Form::label('funcao', 'Função/Descrição') !!}
    {!! Form::text('funcao', '', ['class'=>'form-control', 'required', 'placeholder' =>'Descrição curta do produto']) !!}
    
    {!! Form::label('preco', 'Preço') !!}
    {!! Form::text('preco', '', ['class'=>'form-control', 'required', 'placeholder' =>'Preço de venda']) !!}
    
    {!! Form::label('foto', 'foto') !!}
    {!! Form::file('foto', ['class'=>'form-control', 'id'=>'foto']) !!}

    {!! Form::label('nome_categoria', 'Categoria (selecione)') !!}
    {!! Form::text('nome_categoria', '', ['class'=>'form-control', 'required', 'placeholder' =>'Categoria de venda','list'=>'listcategorias']) !!}
    <datalist id='listcategorias'>
        @foreach($categorias as $categoria)
            <option value="{{$categoria->nome}}"></option>
        @endforeach
    </datalist>
    <hr>
    {!! Form::submit('Salvar',['class'=>'btn shadow', 'style' =>'background:#c21a01;
        color:white;']) !!} |
    {!!Form::button('Cancelar',['onclick'=>'javascript:history.go(-1)', 'class'=>'btn btn-secondary shadow'])!!}
    {!! Form::close() !!}
</div>
@endsection