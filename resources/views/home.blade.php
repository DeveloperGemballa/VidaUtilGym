@extends('layout.app')
@section("motivation")
<h1 class="display-3">Log-in com sucesso</h1>
@endsection
@section('content')
<br>
<br>
<br>
<div class="container">
    <table class="table table-hover" style="background:#D9D9D9;border-radius:10px;">
        <th><h1 class="display-6">Status</h1></th>
        <tr>
            <td>
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div> 
                @endif
                {{ __('You are logged in!') }}
                <h1 class="display-6">Seu status:<mark>logged</mark></h1>
            </td>
        </tr>
    </table>
</div>
@endsection
