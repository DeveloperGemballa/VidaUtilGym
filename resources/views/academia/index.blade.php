@extends("layout.app")
@section("titleweb", "Vida útil gym")
@section("motivation")
<h1 class="display-3">Vida Útil Academia</h1>
@endsection
@section("content")
<br>
    <div id="carouselExampleCaptions" class="carousel slide container" data-bs-ride="false">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
        {{Html::image(asset('img/gym/academia1.webp'),'Foto de academia',["class"=>"d-block w-100", "style"=>"height:80vh;border-radius:20px;" ])}}
        <div class="carousel-caption d-none d-md-block shadow">
            <h5>First slide label</h5>
            <p>Some representative placeholder content for the first slide.</p>
        </div>
        </div>
        <div class="carousel-item">
        {{Html::image(asset('img/gym/academia2.webp'),'Foto de academia',["class"=>"d-block w-100" , "style"=>"height:80vh;border-radius:20px;" ])}}
        <div class="carousel-caption d-none d-md-block shadow">
            <h5>Second slide label</h5>
            <p>Some representative placeholder content for the second slide.</p>
        </div>
        </div>
        <div class="carousel-item">
        {{Html::image(asset('img/gym/academia3.webp'),'Foto de academia',["class"=>"d-block w-100" , "style"=>"height:80vh;border-radius:20px;" ])}}
        <div class="carousel-caption d-none d-md-block shadow">
            <h5>Third slide label</h5>
            <p>Some representative placeholder content for the third slide.</p>
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
@endsection