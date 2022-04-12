
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style_daftar.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="icon" href="{{ url('img/icon2.png') }}" type="image/x-icon">
    <title>Pesen Aja</title>
</head>

<body>

    <main>
        <div class="container">
            <div class="container-left">
                <img class="img" src="{{ url('img/icon2.png') }}">
            </div>
            <div class="container-right">
                <h2>Daftar</h2>

                <x-jet-validation-errors class="mb-4 text-danger" />


                <form action="{{ route('register') }}"  method="POST">
                @csrf

                    <div class="input">
                        <p class="text2">Daftar dengan data diri anda sebelum masuk ke aplikasi website ini.</p>
                        <input type="text" class="form-control" id="nama" placeholder="Nama"
                            name="nama" :value="old('nama')" required>
                    </div>
                    <div class="input">
                        <input type="email" class="form-control" id="email" placeholder="Email"
                            name="email" :value="old('email')" required>
                    </div>
                    <div class="input">
                        <input type="password" class="form-control" id="password" placeholder="Password"
                            name="password" :value="old('password')" required>
                    </div>
                    <div class="input">
                        <p class="mb-0">Password harus terdiri dari 8 karakter</p>
                        <input type="number" class="form-control" id="no_telepon" placeholder="No Telepon"
                            name="no_telepon" :value="old('no_telepon')" required>
                    </div>
                    <button>Daftar</button>
                    <p class="mt-2">Apakah sudah memiliki akun? <a href="{{ route('login') }}"><u>Masuk</u></a> </p>
                </form>
            </div>
        </div>



        <main>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>