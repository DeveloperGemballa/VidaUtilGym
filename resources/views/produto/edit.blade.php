@extends('layout.app')
@section('title','Alteração Cliente {{$produto->nome}}')
@section('content')
    <h1>Alteração produto {{$produto->nome}}</h1>
    @if(Session::has('mensagem'))
        <div class="alert alert-success">
            {{Session::get('mensagem')}}
        </div>
    @endif
    <br />
    {!! Form::open(['route' => ['produto.update', $produto->id],'method' => 'PUT']) !!}
    {!! Form::label('nome', 'Nome') !!}
    {!! Form::text('nome', $produto->nome, ['class'=>'form-control', 'required', 'placeholder' =>'Nome do produto']) !!}
    
    {!! Form::label('funcao', 'Descrição') !!}
    {!! Form::text('funcao', $produto->funcao, ['class'=>'form-control', 'required', 'placeholder' =>'Descrição completa']) !!}
    
    {!! Form::label('preco', 'Preço') !!}
    {!! Form::text('preco', $produto->preco, ['class'=>'form-control', 'required', 'placeholder' =>'Preço do produto']) !!}

    {!! Form::label('nome_categoria', 'Nome da categoria') !!}
    {!! Form::text('nome_categoria',"", ['class'=>'form-control', 'required', 'placeholder' =>'Categoria','list'=>'listcategorias']) !!}
    <datalist id='listcategorias'>
        @foreach($categorias as $categoria)
            <option value="{{$categoria->nome}}"></option>
        @endforeach
    </datalist>
    
    <hr>
    {!! Form::submit('Salvar alteração',['class'=>'btn btn-primary shadow']) !!} |
    {!!Form::button('UNDo',['onclick'=>'javascript:history.go(-1)', 'class'=>'btn btn-secondary shadow'])!!}
    <a href="/produto" class="btn btn-warning">voltar</a>
    {!! Form::close() !!}
@endsection