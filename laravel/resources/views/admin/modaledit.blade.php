<!DOCTYPE html>
<html>
<title>W3.CSS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>

<style>
    p{
        color: #242424;
    }

    #id02{
        margin-top:20px !important; 
    }

    #modal{
        padding:20px !important; 
    }

    input[type=text] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border-radius: 4px;
    }

    #form-menu{
        max-width:50%;
        color: #242424;
    }


    
</style>


  <div id="id02{{ $menu->id }}" class="w3-modal">
    <div class="w3-modal-content w3-animate-top w3-card-4">
      <header class="w3-container w3-deep-orange"> 
        <span onclick="document.getElementById('id02{{ $menu->id }}').style.display='none'" 
        class="w3-button w3-display-topright">&times;</span>
        <h2>Edit Menu</h2>
      </header>
      <div id="modal" class="w3-container">
        <form id="form-menu" action="{{url('editmenu', $menu->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
            <label for="nama" class="form-label align-start" align="start">Nama</label>
                <input type="text" class="form-control bg-light text-dark" id="nama" placeholder="Nama Menu" value="{{($menu->nama_menu)}}" name="nama_menu" required>
            </div>

            <div class="mb-3">
                <label for="deskripsi" class="form-label align-start" align="start">Deskrpsi</label>
                <input type="text" class="form-control bg-light text-dark" id="deskripsi" placeholder="Deskripsi" name="deskripsi" value="{{($menu->deskripsi)}}" required>
            </div>

            <div class="mb-3">
                <label for="harga" class="form-label align-start" align="start">Harga</label>
                <input type="number" class="form-control bg-light text-dark" id="harga" placeholder="Harga" name="harga" value="{{($menu->harga)}}" required>
            </div>

            <div style="padding:15px;">
                <img style="margin-bottom:20px; max-width:50%;" src="image/{{$menu->image}}">
                <input type="file" name="gambar"/>
            </div>

            <button type="submit" class="btn w3-teal">Simpan</button>
        <button type="button" class="btn w3-red" onclick="document.getElementById('id02{{ $menu->id }}').style.display='none'">Batal</button>
        </form>
              
      </div>
    </div>
  </div>

          
</body>
</html>
