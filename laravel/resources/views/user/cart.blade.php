<!doctype html>
<html lang="en">

<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="icon" href="img/icon2.png">
    <title>Pesen Aja</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="css/style_keranjang.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>



<body>
    
    <div class="card">
    @if(session()->has('message'))
    <div class="alert alert-danger">
        {{session()->get('message')}}
        <button style="color:black;" type="button" class="btn btn-outline-danger" data-bs-dismiss="alert">X</button>
    </div>
        @endif
        <div class="row">
            <div class="col-md-8 cart">
                <div class="title">
                    <div class="row">
                        <div class="col">
                            <h4><b>Keranjang</b></h4>
                        </div>
                        <div class="col align-self-center text-right text-muted">{{$count}} Pesanan</div>
                    </div>
                </div>
                <form action="{{url('order')}}" method="POST">
                    @csrf
                @foreach($carts as $cart)
                <div class="row border-top border-bottom">
                    <div class="row main align-items-center">
                        <div class="col-2">
                            <input type="text" name="gambarmenu[]" value="{{$cart->gambar}}" hidden="true">
                            <img class="img-fluid" src="{{url('image')}}/{{$cart -> gambar}}"></div>
                        <div class="col">
                            <input type="text" name="namamenu[]" value="{{$cart->nama_menu}}" hidden="true">
                            <div class="row">{{$cart -> nama_menu}}</div>
                        </div>
                        <input type="text" name="jumlahmenu[]" value="{{$cart->jumlah}}" hidden="true">
                        <div class="col"><a class="border">{{$cart -> jumlah}}</a></div>
                        <input type="text" name="hargamenu[]" value="{{$cart->total_harga}}" hidden="true">
                        <div class="col">Rp {{number_format($cart -> total_harga)}}
                            <a class="close" href="{{url('deletecart', $cart -> id)}}">&#10005;</a>
                        </div>
                    </div>
                </div>
                @endforeach
                <a href="{{url('redirect')}}">
                    <div class="back-to-shop">
                        <i class="bi bi-arrow-left-circle-fill"></i><span class="text-black" > Back to shop</span></div>
                </a>
            </div>
            <div class="col-md-4 summary">
                <div>
                    <h5><b>Pembayaran</b></h5>
                </div>
                <hr>
                    <p>Metode Pembayaran</p> 
                    <div class="card-bank bg-white p-2 mt-3 card-2 px-4 text-black py-4">
                        <div class="card-bank info d-flex justify-content-between align-items-center">
                            <img src="img/cashier.png" alt="" width="14px" />
                            <div class="group d-flex flex-column text-black"> <span class="font-weight-bold me-2">Bayar
                                    Dikasir</span> </div>
                        </div>
                    </div>
                    <div class="card-bank bg-white p-2 mt-3 card-2 px-4 text-black py-4">
                        <div class="card-bank info d-flex justify-content-between align-items-center">
                            <img src="img/BRI.png" alt="" width="14px" />
                            <div class="group d-flex flex-column text-black"> <span class="font-weight-bold">A.n Satya
                                    Nurhutama</span> <small>1214 12125 2567</small> </div>
                        </div>
                    </div>
                    
                
                <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0">
                    <button type="submit" class="btn btn-light font-weight-bold">Konfirmasi Pembayaran</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>