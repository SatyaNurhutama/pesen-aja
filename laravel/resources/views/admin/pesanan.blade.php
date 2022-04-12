<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin/css')
  </head>
  
  <body>
    
      <!-- partial:partials/_sidebar.html -->
      @include('admin.side')
      <!-- partial -->
      @include('admin.nav')
      <div class="container-fluid page-body-wrapper">

        <div class="container" align="center"> 
        <h1 style="color:white; padding-top: 25px; font-size:35px;">Pesanan</h1>
        @if(session()->has('message'))
          <div class="alert alert-success">
            {{session()->get('message')}}
            <button style="color:black;" type="button" class="btn btn-primary" data-bs-dismiss="alert">X</button>
          </div>
        @endif
        <div style="overflow: scroll; overflow-y: hidden;" data-spy="scroll" class="scrollspy">
        <table class="table mt-2">
            <thead>
                <tr class="table-warning">
                <th scope="col">Id</th>
                <th scope="col">Nama</th>
                <th scope="col">No Telepon</th>
                <th scope="col">Menu</th>
                <th scope="col">Harga Menu</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
                <th scope="col">Hapus</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr class="table-light">
                <th scope="row">{{$order -> id}}</th>
                <td>{{$order-> nama}}</td>
                <td>{{$order-> no_telepon}}</td>
                <td>{{$order-> nama_menu}}</td>
                <td>Rp.{{number_format($order-> total_harga)}}</td>
                <td>{{$order-> jumlah}}</td>
                <td>{{$order-> status}}</td>
                <td><a type="button" class="btn btn-success text-dark" href="{{url('updatestatus', $order->id)}}">Selesai</a></td>
                <td><a type="button" class="btn btn-danger text-dark" href="{{url('deleteorder', $order->id)}}">Hapus</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
        </div>
    </div>
    @include('admin.script')
  </body>
</html>