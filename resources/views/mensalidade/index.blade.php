@extends("layout.app")
@section("titleweb", "Lobby ADMS")
@section("motivation")
<h1 class="display-3">modo ADM de mensalidades</h1>
@endsection
@section("content")
<br>
<br>
<br>

    <table class="table table-hover container">
        <th>ID</th>
        <th>Nome</th>
        <th>Situação pgmto</th>
        <th>Data de criação</th>
        <th>Aviso</th>
        <th>Vencimento(prazo)</th>
        <th>Ações</th>
        @foreach($mensalidade as $mensalidade)
        <tr>
            <td>
                <a href="{{url('mensalidade/'. $mensalidade->id )}}" class="btn btn-info">{{ $mensalidade->id }}</a>
            </td>
            <td>
                {{$mensalidade->nome_pessoa}}
            </td>
            <td>
                <!--{{ $mensalidade->situacao }}-->
            </td>
            <td>
                <!--{!!\Carbon\Carbon::create($mensalidade->created_at)->format('d/m/Y H:i:s')!!}-->
                {!!\Carbon\Carbon::create($mensalidade->situacao)->format('d/m/Y H:i:s')!!}
            </td>
            <td>
                @if($mensalidade->fimmensalidade != 'NULL')
                    <strong> <mark class="bg-success">Vencido</mark> </strong>
                @endif
            </td>
            <td>
                {!! $mensalidade->fimmensalidade !!}
            </td>
            <td>
                {!! Form::open(["route" => ['mensalidade.destroy', $mensalidade->id], 'method' => "DELETE"]) !!}
                {!! Form::submit('Excluir',['class'=>'btn btn-danger shadow']) !!}
                {!! Form::close() !!}
            </td>
        </tr>
        @endforeach
                
    </table>
@endsection
