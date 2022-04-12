<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style_daftar.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="icon" href="../img/icon2.png">
    <title>Pesen Aja</title>
</head>

<body>

    <main>
        <div class="container">
            <div class="container-left">
                <img src="../img/icon2.png">
            </div>
            <div class="container-right">
                <h2>Lupa Kata Sandi?</h2>

                <x-jet-validation-errors class="mb-4" />

                <form method="POST" action="{{ route('password.update') }}">
                
                @csrf

                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <div class="input">
                        <input type="email" class="form-control" id="email" placeholder="Alamat Email"
                        name="email" :value="old('email, $request->email')" required>

                    </div>

                    <div class="input"> 
                        <input type="password" class="form-control" id="password" placeholder="Kata Sandi"
                            name="password" required autocomplete="new-password">
                    </div>

                    <div class="input"> 
                    <input type="password" class="form-control" id="password_confirmation" placeholder="Konfirmasi Kata Sandi"
                        name="password_confirmation" required autocomplete="new-password">
                    </div>
                    <button>Kirim</button>
                </form>
            </div>
        </div>



        <main>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>


