@extends("layout.app")
@section("titleweb", "Lobby clientes")
@section("motivation")
<h1 class="display-3">Seja forte - No pain no gain</h1>
@endsection
@section("content")
<?php
            $nomeimagem = "";
            if(file_exists("./img/produtos/".md5($produtopromo->id).".jpg")) {
                $nomeimagem = "./img/produtos/".md5($produtopromo->id).".jpg";
            } elseif (file_exists("./img/produtos/".md5($produtopromo->id).".png")) {
                $nomeimagem = "./img/produtos/".md5($produtopromo->id).".png";
            } elseif (file_exists("./img/produtos/".md5($produtopromo->id).".gif")) {
                $nomeimagem =  "./img/produtos/".md5($produtopromo->id).".gif";
            } elseif (file_exists("./img/produtos/".md5($produtopromo->id).".webp")) {
                $nomeimagem = "./img/produtos/".md5($produtopromo->id).".webp";
            } elseif (file_exists("./img/produtos/".md5($produtopromo->id).".jpeg")) {
                $nomeimagem = "./img/produtos/".md5($produtopromo->id).".jpeg";
            } else {
                $nomeimagem = "./img/produtos/image.webp";
            }
            ?>
            
    
    <div class="productpromo shadow">
        {{Html::image(asset($nomeimagem),'Foto de '.$produtopromo->nome,["align"=>"center", "class"=>"card-img-top" , "style"=>"width:80vh;height:45vh;border-radius:30px;position:absolute;left:20%;top:5%;"])}}
        <div class="price">
            <h1 class="display-6">R${{ $produtopromo->preco }}</h1>
        </div>
        <div class="description">
            <h1 class="display-6">
                    {{ $produtopromo->nome }}
            </h1>
            {{ $produtopromo->funcao }}
        </div>
        <a href="{{url('produto/'. $produtopromo->id )}}" class="btn btn-danger">
            <div class="buttonbuy shadow" style="border-radius:50%;">
                <h1 class="display-6" style="margin:20px;">BUY</h1>
            </div>
        </a>
    </div>
    <div class="productstop shadow">
        <div class="nameredproductstop">
            <h6 class="display-5">Catálogo de produtos</h6>
        </div>

        <div class="row">
            @foreach($produtos as $produto)
            <?php
            $nomeimagem = "";
            if(file_exists("./img/produtos/".md5($produto->id).".jpg")) {
                $nomeimagem = "./img/produtos/".md5($produto->id).".jpg";
            } elseif (file_exists("./img/produtos/".md5($produto->id).".png")) {
                $nomeimagem = "./img/produtos/".md5($produto->id).".png";
            } elseif (file_exists("./img/produtos/".md5($produto->id).".gif")) {
                $nomeimagem =  "./img/produtos/".md5($produto->id).".gif";
            } elseif (file_exists("./img/produtos/".md5($produto->id).".webp")) {
                $nomeimagem = "./img/produtos/".md5($produto->id).".webp";
            } elseif (file_exists("./img/produtos/".md5($produto->id).".jpeg")) {
                $nomeimagem = "./img/produtos/".md5($produto->id).".jpeg";
            } else {
                $nomeimagem = "./img/produtos/image.webp";
            }
            ?>
            <div class="card shadow-sm" style="width: 18rem; margin:30px;background: #e8e8e8;">
            <br>
            {{Html::image(asset($nomeimagem),'Foto de '.$produto->nome,["class"=>"img shadow" , "style"=>"width:28vh;height:20vh;border-radius:30px;"])}}
            <div class="card-body">
                <h5 class="card-title">{{ $produto->nome }}</h5>
                <p class="card-text">{{ $produto->nome_categoria }}</p>
                <p class="card-text">{{ $produto->funcao }}</p>
                <a class="btn btn-danger shadow-sm" href="{{url('produto/'. $produto->id )}}">{{ $produto->preco }}</a>
            </div>
            </div>
            @endforeach
        </div>

    </div>
@endsection