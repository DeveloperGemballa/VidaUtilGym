<style>
    .contentshow {
        position:absolute;
        width:50vh;
        height:50vh;
        left:75vh;
        top:20vh;

        border-radius:30px;
        background-color:red;
    }
    .titleshow {
        width:50vh;
        height:10vh;
        background-color:gray;
        text-align:center;
    }
    .listashow {
        background-color:white;
        margin:1vh;
        width:48vh;
        height:20vh;
    }
</style>
@extends("layout.app")
@section("titleweb", "OLA")
@section("motivation")
<h1 class="display-3">modo SHOW - {{ $cliente->nome }}</h1>
@endsection
@section("content")

<div class="contentshow">
    <div class="titleshow">
        <h1 class="display-1">{{ $cliente->nome }}</h1>
    </div>
    <div class="listashow">
        <ul>
            <li>{{ $cliente->nome }}</li>
            <li>{{ $cliente->cpf }}</li>
            <li>{{ $cliente->endereco }}</li>
            <li>{{ $cliente->telefone }}</li>
            <li>{{ $cliente->email }}</li>
            <li>Mensalidade: {{ $cliente->situacao }}</li>
        </ul>
        {!! Form::open(["route" => ['admin.destroy', $cliente->id], 'method' => "DELETE"]) !!}
        <a href="{{url('admin/'.$cliente->id.'/edit')}}" class="btn btn-warning shadow">Alterar</a> |
        {!! Form::submit('Excluir',['class'=>'btn btn-danger shadow']) !!} |
        <a href="{{url('admin')}}" class="btn btn-info shadow">Voltar</a>
        {!! Form::close() !!}
    </div>
</div>

@endsection