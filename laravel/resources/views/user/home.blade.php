<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="icon" href="img/icon2.png">
    <title>Pesen Aja</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style_home.css" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<style>
    #btn_detail:hover {background-color: #e68225 !important;} 
</style>

<body>
    <header>
    <nav class="navbar navbar-expand-sm navbar-light bg-light">
        <a class="navbar-brand ms-4" href="{{url('redirect')}}">
            <img src="img/icon.png" alt="" width="50" height="54" class="d-inline-block align-text-top">
        </a>
        <a href="{{url('redirect')}}" class="navbar-brand mb-0 h1">Pesen Aja</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mynavbar">
            <ul class="navbar-nav me-auto">
            </ul>
            <form action="{{url('search')}}" method="get" class="hidden d-flex ms-2 me-2 mt-2 mb-2">
                <input class="form-control mr-sm-2 me-2" type="search" name="search" placeholder="cari menu..." aria-label="Search">
                <button type="submit" value="search" class="btn btn-outline-warning my-2 my-sm-0 me-2" type="submit">Cari</button>
            </form>
            <div class="hidden d-flex ms-2 me-2 mt-2 mb-2">
                <a class="btn btn-warning me-2" href="{{url('cart')}}"><i style="color: white;" class="fa fa-shopping-cart"></i></a>
                <div class="btn-group">
                <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i style="color: white;" class="fa fa-user"></i></button>
                <ul style="margin-right:20px !important;" class="dropdown-menu dropdown-menu-sm-end">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <li><button type="submit" class="dropdown-item" href="{{ route('logout') }}">Keluar</button></li>    
                    </form>
                </ul>
            </div>
        </div>
    </nav>
    </header>
    

    <section class="slider-section pb-4">
        <div class="container" style="padding-top: 2rem;">
            <div class="slider-inner">
                <div class="row">
                    <div class="col-md-12">
                        <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner shadow-sm rounded">
                                <div class="carousel-item active">
                                    <img class="d-block w-100" src="img/img1.png" alt="First slide">
                                    <div class="carousel-caption d-none d-md-block">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <main>
        <div class="container">
            <h1 class="jumbotron-heading" id="title-page"></h1>
            <div class="row" id="quote-items">
                @foreach($menus as $menu)
                <div class="col-md-4 quote-item" id="quote-item" >
                    <div class="card mb-4 box-shadow">
                        <img class="card-img-top" id="card-img" style="max-height:250px;" src="{{url('image')}}/{{$menu -> image}}" alt="Card image cap">
                        <div class="card-body">
                            <b class="card-title ms-2 me-2" id="card-title">{{$menu -> nama_menu}}</b><br>
                            <small class="text-muted ms-2 me-2" id="card-name">Rp. {{number_format($menu -> harga)}}</small>
                            <p align="start" style=" 
                            white-space: nowrap;
                            overflow: hidden;
                            text-overflow: ellipsis;" class="card-text ms-2 me-2" id="card-description">{{$menu -> deskripsi}}</p>   
                            <div class="row mt-2 ms-2 me-2">
                                <a id="btn_detail" href="{{url('detail', $menu->id)}}" style="background-color:#faaf69; " class="btn btn-block">Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @if(method_exists($menus, 'links'))
                <div class="d-flex justify-content-center">
                    {!! $menus->links() !!}
                </div>
                @endif
            </div>
        </div>
    </main>

    <footer class="text-center text-white" style="background-color: #f1f1f1;">

    <!-- Copyright -->
    <div class="text-center text-dark p-3" style="background-color:#faaf69;">
        © 2022 Copyright:
        <a class="text-dark" href="https://mdbootstrap.com/">PesenAja.com</a>
    </div>
    <!-- Copyright -->
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>