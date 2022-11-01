@extends("layout.app")
@section("titleweb", "Lobby ADMS")
@section("motivation")
<h1 class="display-3">modo ADM de mensalidades</h1>
@endsection
@section("content")
    <table class="table table-hover">
        <th>ID</th>
        <th>Nome</th>
        <th>Situação pgmto</th>
        @foreach($mensalidade as $mensalidade)
        <tr>
            <td><a href="{{url('mensalidade/'. $mensalidade->id )}}">{{ $mensalidade->id }}</a></td>
            <td>{{$mensalidade->nome_pessoa}}</td>
            <td>{{ $mensalidade->situacao }}
                </td><td>
            {!!\Carbon\Carbon::create($mensalidade->fimmensalidade)->format('d/m/Y H:i:s')!!}
            </td>
            <td>@if($mensalidade->fimmensalidade != null)
                            <strong> <mark class="bg-success">notpago</mark> </strong>
                        @endif{!! $mensalidade->notpago !!}</td>
        </tr>
        @endforeach
                
    </table>
@endsection
