@extends("layout.app")
@section("titleweb", "Lobby ADMS")
@section("motivation")
<h1 class="display-3">modo ADM de clientes</h1>
@endsection
@section("content")
<br>
<br>
<br>
    <table class="table table-hover container">
        <th>ID</th>
        <th>Nome</th>
        <th>CPF</th>
        <th>Endereço</th>
        <th>Telefone</th>
        <th>E-mail</th>
        @foreach($clientes as $cliente)
        <tr>
            <td><a href="{{url('admin/'. $cliente->id )}}" class="btn btn-info">{{ $cliente->id }}</a></td>
            <td>{{ $cliente->nome }}</td>
            <td>{{ $cliente->cpf }}</td>
            <td>{{ $cliente->endereco }}</td>
            <td>{{ $cliente->telefone }}</td>
            <td><a href="mailto:{{ $cliente->email }}">{{ $cliente->email }}</a></td>
        </tr>
        @endforeach
                
    </table>
@endsection