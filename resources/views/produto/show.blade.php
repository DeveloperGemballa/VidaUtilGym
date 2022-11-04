@extends("layout.app")
@section("titleweb", "Lobby clientes")
@section("motivation")
<h1 class="display-3">Seja forte - No pain no gain</h1>
@endsection
@section("content")

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
    <br>
    <div class="container">
        <div style="background:#D9D9D9;border-radius:20px;">
        <div style="background:#F0BDBD;border-radius:20px;">
            <h1 class="display-5" style="margin:10px;" align="center">{{ $produto->nome }}</h1>
        </div>
        {{Html::image(asset($nomeimagem),'Foto de '.$produto->nome,["class"=>"img shadow" , "style"=>"width:28vh;height:20vh;border-radius:30px;margin:20px;"])}}
            <ul>
                <li><p>ID: {{ $produto->id }}</p></li>
                <li><p>Nome: {{ $produto->nome }}</p></li>
            <li><div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingOne">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                    Descrição (<mark>clique sobre</mark>)
                </button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body"><ul><li>{{ $produto->funcao }}</li></ul></div>
                </div>
            </div></li>
            <br>
                <li><p>Preço: R${{ $produto->preco }}</p></li>
            </ul>
            <hr style="width:60vh;position:relative;left:40vh;">
            <a href="{{url('produto/'.$produto->id.'/edit')}}" class="btn btn-warning shadow" style="margin:20px;">Alterar</a> |
            <a href="{{url('produto')}}" class="btn btn-info shadow" style="margin:20px;">Voltar</a>
            <div class="accordion accordion-flush" id="accordionFlushExample">
  
        </div>
    </div>

@endsection