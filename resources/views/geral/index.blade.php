@extends("layout.app")
@section("titleweb", "Lobby clientes")
@section("motivation")
<h1 class="display-3">Seja forte - No pain no gain</h1>
@endsection
@section("content")
    <div class="productpromo">
        <img src="..." class="card-img-top" alt="...">
        <div class="price">
            <h1 class="display-6">R${{ $produtopromo->preco }}</h1>
        </div>
        <div class="description">
            <h1 class="display-6">
                    {{ $produtopromo->nome }}
            </h1>
            {{ $produtopromo->funcao }}
        </div>
        <div class="buttonbuy">
            add ao carrinho
        </div>
    </div>
    <div class="productstop">
        <div class="nameredproductstop">
            ...
        </div>

        <div class="row">
            @foreach($produtos as $produto)
            <div class="card" style="width: 18rem; margin:30px;">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{ $produto->nome }}</h5>
                <p class="card-text">{{ $produto->funcao }}</p>
                <a href="#" class="btn btn-primary">{{ $produto->preco }}</a>
            </div>
            </div>
            @endforeach
        </div>

    </div>
@endsection