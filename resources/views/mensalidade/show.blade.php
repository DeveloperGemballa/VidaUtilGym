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
<h1 class="display-3">modo SHOW - {{ $mensalidade->nome_pessoa }}</h1>
@endsection
@section("content")

<div class="contentshow">
    <div class="titleshow">
        <h1 class="display-1">{{ $mensalidade->nome_pessoa }}</h1>
    </div>
    <div class="listashow">
        <ul>
            <li>{{ $mensalidade->nome_pessoa }}</li>
            <li>{{ $mensalidade->situacao }}</li>
        </ul>
        {!! Form::open(["route" => ['mensalidade.destroy', $mensalidade->id], 'method' => "DELETE"]) !!}
        <a href="{{url('mensalidade/'.$mensalidade->id.'/edit')}}" class="btn btn-warning shadow">Alterar</a> |
        {!! Form::submit('Excluir',['class'=>'btn btn-danger shadow']) !!} |
        <a href="{{url('mensalidade')}}" class="btn btn-info shadow">Voltar</a>
        {!! Form::close() !!}
                        @if($mensalidade->fimmensalidade == null)
                            {{Form::open(['route'=>['mensalidade.pagar',$mensalidade->id],'method'=>'PUT'])}}
                            {{form::submit('pagar',['class'=>'btn btn-success','onclick'=>'return confim("Confirma devolução?")'])}}
                            {{Form::close()}}
                        @endif
    </div>
</div>

@endsection