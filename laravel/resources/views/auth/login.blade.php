<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style_daftar.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="icon" href="img/icon2.png">
    <title>Pesen Aja</title>
</head>

<body>

    <main>
        <div class="container">
            <div class="container-left">
                <img src="img/icon2.png">
            </div>
            <div class="container-right">
                <h2>Masuk</h2>

                <x-jet-validation-errors class="mb-4 text-danger" />

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="input">
                        <p class="text2">Masuk dengan data diri anda sebelum masuk ke aplikasi website ini.</p>
                        <input type="email" class="form-control" id="email" placeholder="Email"
                            name="email" :value="old('email')" required>
                    </div>
                    <div class="input">
                        <input type="password" class="form-control" id="password" placeholder="Kata sandi"
                            name="password" :value="old('password')" required>

                            @if (Route::has('password.request'))
                                <p class="mt-2 mb-0"><a href="{{ route('password.request') }}">Lupa Password?</a></p>
                            @endif
                    </div>
                    <button>Masuk</button>
                    <p class="mt-2">Tidak memiliki akun? <a href="{{ route('register') }}"><u>Daftar</u></a> </p>
                </form>
            </div>
        </div>

        <main>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>
