<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="icon" href="img/icon2.png">
    <title>Pesen Aja</title>
</head>

<body>

    <header>
        <!--Navbar-->
        <nav class="navbar navbar-expand-sm navbar-light ">

            <a class="navbar-brand ms-4" href="#">
                <img src="img/icon.png" alt="" width="50" height="54" class="d-inline-block align-text-top">
            </a>
            <h1 class="navbar-brand mb-0 h1">PesenAja.com</h1>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mynavbar">
                <ul class="navbar-nav me-auto">
                </ul>
                @if(Route::has('login'))
                <form class="hidden d-flex ms-2 me-2 mt-2 mb-2">
                    @auth
                        <a href="{{ url('/redirect')}}" type="button" id="btn_masuk" class="btn btn-md ms-2">Masuk</a>
                    @else
                        <a href="{{ url('/login')}}" type="button" id="btn_masuk" class="btn btn-md me-2">Masuk</a>
                        <a href="{{ url('/register')}}" type="button" id="btn_daftar" class="btn btn-md me-2">Daftar</a>
                    @endauth
                </form>
                @endif
            </div>
        </nav>
    </header>

    <main>
        <div class="container ">
            <div class="container-left">
                <div id="text">
                    <h1>Pesen Aja</h1>
                    <p>PesanAja.com merupakan aplikasi web yang memudahkan pelanggan cafe untuk memesan menu secara online tanpa harus datang ke kasir</p>
                </div>
            </div>
            <div class="container-right">
                <img src="img/landing_page.png">
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>