<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style_detail.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="../img/icon2.png">
    <title>Pesen Aja</title>
</head>

<body>

<header>
        <!--Navbar-->
        <nav class="navbar navbar-expand-sm navbar-light bg-light">
        <a class="navbar-brand ms-4" href="{{url('redirect')}}">
            <img src="../img/icon.png" alt="" width="50" height="54" class="d-inline-block align-text-top">
        </a>
        <a href="{{url('redirect')}}" class="navbar-brand mb-0 h1">Pesen Aja</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mynavbar">
            <ul class="navbar-nav me-auto">
            </ul>
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
            @if(session()->has('message'))
                    <div class="alert alert-success">
                            {{session()->get('message')}}
                    <button style="color:black;" type="button" class="btn btn-outline-danger" data-bs-dismiss="alert">X</button>
                    </div>
            @endif
            
        </nav>
        
    </header>

    <main>

    <div class="container">
            <div class="container-left">
                <img class="img" src="{{url('image')}}/{{$menu -> image}}">
            </div>
            <div class="container-right ms-2">
                <h5 class="">{{$menu->nama_menu}}</h5>
                <small class="text-muted" id="card-name">Harga : Rp. {{number_format($menu -> harga)}}</small>
                <small class="mt-2"id="card-name">Deskripsi :</small>
                <p style=" 
                    width: 300px;
                    white-space: normal;
                    word-wrap: break-word;" class="card-text">{{$menu->deskripsi}}</p>
                     
                <form  class="ms-6" method="post" action="{{url('addcart', $menu->id)}}">
                    @csrf
                    <label for="jumlah" class="form-label h6">Jumlah Pesan : </label>
                    <input  id="jumlah" type="number" class="form-control" value="1" name="jumlah" required>
                    <button align="center">Tambah ke keranjang</button>
                </form>
            </div>
        </div>
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>