@extends('layout.app')
@section('title','Criar novo Contato')
@section('content')
<div class="shadow alert">
    
    <h1 class="display-4">Criar nova mensalidade: </h1>
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
    {!! Form::open(['route' => 'mensalidade.store', 'method' => 'POST']) !!}
        {Form::label('cliente_id', 'Cliente')}}
        {{Form::text('cliente_id','',['class'=>'form-control','required','placeholder'=>'Selecione um cliente','list'=>'listclientes'])}}
        <datalist id='listclientes'>
            @foreach($clientes as $cliente)
                <option value="{{$cliente->nome}}"></option>
            @endforeach
        </datalist>

    {!! Form::label('situacao', 'Situação') !!}
    {!! Form::text('situacao', '', ['class'=>'form-control', 'required', 'placeholder' =>'Situação da mensalidade ','list'=>'listsituacao']) !!}
    <datalist id='listsituacao'>
                <option value="pago">pago</option>
                <option value="notpago">não pago</option>
        </datalist>
    <hr>
    {!! Form::submit('Salvar',['class'=>'btn btn-primary shadow']) !!} |
    {!!Form::button('Cancelar',['onclick'=>'javascript:history.go(-1)', 'class'=>'btn btn-secondary shadow'])!!}
    {!! Form::close() !!}
</div>
@endsection