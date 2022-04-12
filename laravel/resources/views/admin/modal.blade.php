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

    #id01{
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

<div class="w3-container">
  <button class="btn btn-success my-2" onclick="document.getElementById('id01').style.display='block'">Tambah Menu</button>
  <div id="id01" class="w3-modal">
    <div class="w3-modal-content w3-animate-top w3-card-4">
      <header class="w3-container w3-deep-orange"> 
        <span onclick="document.getElementById('id01').style.display='none'" 
        class="w3-button w3-display-topright">&times;</span>
        <h2>Tambah Menu</h2>
      </header>
      <div id="modal" class="w3-container">
        <form id="form-menu" action="{{url('uploadmenu')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
            <label for="nama" class="form-label align-start" align="start">Nama</label>
                <input type="text" class="form-control bg-light text-dark" id="nama" placeholder="Nama Menu" name="nama_menu" required>
            </div>

            <div class="mb-3">
                <label for="deskripsi" class="form-label align-start" align="start">Deskrpsi</label>
                <input type="text" class="form-control bg-light text-dark" id="deskripsi" placeholder="Deskripsi" name="deskripsi" required>
            </div>

            <div class="mb-3">
                <label for="harga" class="form-label align-start" align="start">Harga</label>
                <input type="number" class="form-control bg-light text-dark" id="harga" placeholder="Harga" name="harga" required>
            </div>

            <div style="padding:15px;">
                <input type="file" name="gambar" required  />
            </div>

            <button type="submit" class="btn w3-teal">Tambah</button>
            <button type="button" class="btn w3-red" onclick="document.getElementById('id01').style.display='none'">Batal</button>
        </form>
              
      </div>
    </div>
  </div>
</div>
          
</body>
</html>
