<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="assets/images/homeicon1.jpg" />
    <!-- Bootstrap core CSS -->
  <link href="{{asset('backendmodern/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="{{asset('backendmodern/css/modern-business.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">

    <title>@yield('title')</title>
  </head>
  <body>


    @auth
    @if(Auth::user()->user_tipe == 'Agen')
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark fixed-top" style="background-color: #21bbcf">
    @endif
    @if(Auth::user()->user_tipe == 'User')
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark fixed-top" style="background-color: #21bbcf">
    @endif
    @if(Auth::user()->user_tipe == 'Admin')
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark fixed-top" style="background-color: #21bbcf">
    @endif
    @else
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark fixed-top" style="background-color: #3cca94">
    @endauth
      <div class="container">
        <a class="navbar-brand" style="font-size:30px; color:rgb(248, 255, 249); font-family: 'Garamond'" href="{{ url('/')}}">rumahPilihan</a>
        
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            {{-- <li class="nav-item">
              <a class="nav-link" href="{{ url('/')}}">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('/about')}}">Tentang Web</a>
            </li> --}}
            @auth
            {{-- Agen --}}
            @if(Auth::user()->user_tipe == 'Agen')
            <li class="nav-item">
              <a class="nav-link" style="color:white" href="{{ url('/')}}">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" style="color:white" href="{{ url('/cari-listing')}}">Cari Listing</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" style="color:white" href="{{url('/about')}}">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" style="color:white" href="{{url('/agen-recommendation')}}">Recommendation</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" style="color:white" href="{{url('/listing')}}">Edit Listing</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" style="color:white" href="{{url('/pesan')}}">Pesan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" style="color:white" href="{{url('/pengunjung')}}">Data Pengunjung</a>
            </li>
            {{-- <div class="collapse navbar-collapse" id="navbarResponsive">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownEditAgen" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Data Agen
                  </a>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownEditAgen">
                    <a class="dropdown-item" href="{{ url('/listing')}}">Edit Listing</a>
                  </div>
                </li>  
              </ul>
            </div> --}}
        @endif

            {{-- Admin --}}
            @if(Auth::user()->user_tipe == 'Admin')
            <li class="nav-item">
              <a class="nav-link" style="color:white" href="{{ url('/')}}">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" style="color:white" href="{{ url('/user_management')}}">Manage User</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" style="color:white" href="{{ url('/fasilitas')}}">Edit Facilities</a>
            </li>
            {{-- <div class="collapse navbar-collapse" id="navbarResponsive">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownEditAdmin" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Data Admin
                  </a>  
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownEditAdmin">
                    <a class="dropdown-item" href="{{ url('/user_management')}}">Edit User</a>
                    <a class="dropdown-item" href="{{ url('/fasilitas')}}">Edit Fasilitas</a>
                  </div>
                </li>
              </ul>
            </div> --}}
            @endif

            {{-- User Biasa --}}
        @if(Auth::user()->user_tipe == 'User')
        <li class="nav-item">
          <a class="nav-link" style="color:white" href="{{ url('/')}}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" style="color:white" href="{{ url('/carilisting')}}">Cari Listing</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" style="color:white" href="{{url('/about')}}">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" style="color:white" href="{{url('/user-recommendation')}}">Recommendation</a>
        </li>
        @endif

            {{-- Edit Profile / Logout --}}
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" style="color: white" href="#" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{Auth::user()->nama_user}}
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                <a class="dropdown-item" href="{{ url('/editprofile')}}">Profile</a>
                <a class="dropdown-item" href="{{ url('/signout')}}">Logout</a>
              </div>
            </li>

          {{-- Belum login --}}
        @else
            <li class="nav-item">
              <a class="nav-link" style="color:white" href="{{ url('/')}}">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" style="color:white" href="{{url('/about')}}">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" style="color:white" href="{{url('/signin')}}">Signin</a>
            </li>
          </ul>
        </div>

        @endauth

      </div>
    </nav>
    

    @yield('container')

    <!-- Footer -->
    <footer class="py-5" style="background-color: #51aeda; width:auto">
      <div class="container">
        <p class="m-2 text-center text-white" style="font-size:xx-large; font-family: 'Garamond'">rumahPilihan</p>
        <p class="m-0 text-center text-white">Edrico Alroy Dipawinata</p>
        <p class="m-0 text-center text-white">Pembimbing Utama      : Bagus Mulyawan, S.Kom., MM</p>
        <p class="m-0 text-center text-white">Pembimbing Pendamping : Manatap Dolok Lauro, S.Kom., MMSI</p>
      </div>
      <!-- /.container -->
    </footer>



    
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js" ></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js" ></script>
    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
  </body>
</html>