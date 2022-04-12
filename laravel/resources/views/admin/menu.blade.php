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
              @if(session()->has('message'))
                <div class="alert alert-success">
                  {{session()->get('message')}}
                  <button style="color:black;" type="button" class="btn btn-primary" data-bs-dismiss="alert">X</button>
                </div>
              @endif
          
              <h1 style="color:white; padding-top: 25px; font-size:35px;">Menu</h1>

              @include('admin/modal')
              <div class="row mt-3">
              @foreach($data as $menu)
                <div class="col-md-3 mb-3">
                  <div class="card" style="background-color:white;">
                      <img class="card-img-top" src="image/{{$menu->image}}">
                      <div class="card-body">
                        <h5 class="text-dark font-weight-bold" align="start">{{$menu->nama_menu}}</h5>
                        <p align="start" style=" 
                            white-space: nowrap;
                            overflow: hidden;
                            text-overflow: ellipsis;" class="card-text" id="card-description">{{$menu -> deskripsi}}</p>
                        <h6 align="start" class="text-dark">Rp. {{number_format($menu->harga)}}</h6>
                      </div>
                      <div class="card-footer text-dark">
                        <div class="btn-group" align="center">
                          @include('admin.modaledit')
                          <a class="btn btn-md btn-outline-primary" onclick="document.getElementById('id02{{ $menu->id }}').style.display='block'" >Edit</button>
                          <a class="btn btn-md btn-outline-danger" href="{{url('deletemenu', $menu->id)}}">Hapus</a>
                        </div>
                      </div>
                  </div>     
                </div>
              @endforeach
              @if(method_exists($data, 'links'))
                <div class="d-flex justify-content-center m-4">
                    {!! $data->links() !!}
                </div>
              @endif   
        </div>
    </div>
    @include('admin.script')
  </body>
</html>