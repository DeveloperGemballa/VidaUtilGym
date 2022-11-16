@extends("layout.app")
@section("titleweb", "Vida útil gym")
@section("motivation")
<h1 class="display-3">Vida Útil Academia</h1>
@endsection
@section("content")
<style>
    .personal {
        position:absolute;
        top:110vh;
        background:#D9D9D9;
        border-radius:32px;
        left:14.5%;
    }
</style>
<br>
    <div id="carouselExampleCaptions" class="carousel slide container" data-bs-ride="false">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
        {{Html::image(asset('img/gym/academia1.webp'),'Foto de academia',["class"=>"d-block", "style"=>"width:100%;height:80vh;border-radius:20px;" ])}}
        <div class="carousel-caption d-none d-md-block shadow">
            <h5>Objetivo</h5>
            <p>Academia com intuito de formar gigantes no fisiculturismo!</p>
        </div>
        </div>
        <div class="carousel-item">
        {{Html::image(asset('img/gym/academia2.webp'),'Foto de academia',["class"=>"d-block" , "style"=>"width:100%;height:80vh;border-radius:20px;" ])}}
        <div class="carousel-caption d-none d-md-block shadow">
            <h5>Equipamentos</h5>
            <p>Equipamentos de qualidade e diversificados para melhor experiência.</p>
        </div>
        </div>
        <div class="carousel-item">
        {{Html::image(asset('img/gym/academia3.webp'),'Foto de academia',["class"=>"d-block" , "style"=>"width:100%;height:80vh;border-radius:20px;" ])}}
        <div class="carousel-caption d-none d-md-block shadow">
            <h5>Profissionais</h5>
            <p>Zelamos por profissionais de qualidade e requisitamos o melhor. (Veja abaixo nossos personais)</p>
        </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
    </div>

    <div class="personal shadow container" align="center">
        <div class="nameredproductstop">
            <h6 class="display-5">Personais disponíveis:</h6>
        </div>

        <div class="row">
            @foreach($produtos as $produto)
            @if($produto->nome_categoria == "Personal")
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
                <div class="card shadow-sm" style="width: 18rem; margin:20px;background: #e8e8e8;">
                <br>
                {{Html::image(asset($nomeimagem),'Foto de '.$produto->nome,["class"=>"img shadow" , "style"=>"width:28vh;height:20vh;border-radius:30px;"])}}
                <div class="card-body">
                    <h5 class="card-title">{{ $produto->nome }}</h5>
                    <p class="card-text">{{ $produto->funcao }}</p>
                </div>
                </div>
            @endif
            @endforeach
        </div>

    </div>
@endsection