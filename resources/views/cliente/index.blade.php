@extends("layout.app")
@section("titleweb", "Lobby ADMS")
@section("motivation")
<h1 class="display-3">modo ADM de clientes</h1>
@endsection
@section("content")
    <table class="table table-hover">
        <th>ID</th>
        <th>Nome</th>
        <th>CPF</th>
        <th>Endereço</th>
        <th>Telefone</th>
        <th>E-mail</th>
        <th>Situação pgmto</th>
        @foreach($clientes as $cliente)
        <tr>
            <td><a href="{{url('admin/'. $cliente->id )}}">{{ $cliente->id }}</a></td>
            <td>{{ $cliente->nome }}</td>
            <td>{{ $cliente->cpf }}</td>
            <td>{{ $cliente->endereco }}</td>
            <td>{{ $cliente->telefone }}</td>
            <td><a href="mailto:{{ $cliente->email }}">{{ $cliente->email }}</a></td>
            <td>{{ $cliente->situacao }}</td>
        </tr>
        @endforeach
                
    </table>
@endsection