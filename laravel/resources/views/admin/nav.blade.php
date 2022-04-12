<nav class="navbar p-0 fixed-top d-flex flex-row">
          <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
            <a class="navbar-brand brand-logo-mini" href="{{url('redirect')}}"><img src="img/icon2.png" alt="logo" /></a>
          </div>
          <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
          <a href="{{url('redirect')}}" class="navbar-brand mt-3 ms-4 h1">Admin</a>
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <span class="mdi mdi-menu"></span>
            </button>
            <ul class="navbar-nav w-100">
              <li class="nav-item w-100">
                <form action="{{url('search-menu')}}" method="get" class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
                  <input type="text" name="search" class="form-control text-light" placeholder="Cari menu...">
                </form>
              </li>
            </ul>
            <ul class="navbar-nav navbar-nav-right">
            <div class="btn-group">
                
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <li><button type="submit" class="dropdown-item bg-danger" href="{{ route('logout') }}">Keluar</button></li>    
                    </form>

            </div>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
              <span class="mdi mdi-format-line-spacing"></span>
            </button>
          </div>
</nav>