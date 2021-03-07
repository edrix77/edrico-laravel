@extends('layout/main')

@section('title', 'Home')
<!-- Bootstrap core CSS -->
<link href="{{asset('backendmodern/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="{{asset('backendmodern/css/modern-business.css')}}" rel="stylesheet">
{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"> --}}
<link rel="stylesheet" href="{{asset('font-awesomecoba/css/font-awesome.min.css')}}">
<style>
    .center {
        margin: auto;
        width: 50%;
        
    }
    .img-notuser1{
        background-image: url('assets/images/facility1.jpg');
        /* Set a specific height */
        width:100%;
        height: 600px;

        /* Create the parallax scrolling effect */
        /* background-attachment: fixed; */

        background-repeat: no-repeat;
        background-size:cover;
    }

    .img-notuser3{
        background-image: url('assets/images/imgnotuser4.jpg');
        /* Set a specific height */
        width:100%;
        height: 600px;

        /* Create the parallax scrolling effect */
        /* background-attachment: fixed; */

        background-repeat: no-repeat;
        background-size:cover;
    }

    .img-notuser2{
        background-image: url('assets/images/imgnotuser2.png');
        /* Set a specific height */
        width:100%;
        height: 600px;
        /* padding: 500px 200px; */

        /* Create the parallax scrolling effect */
        background-attachment: fixed;

        background-repeat: no-repeat;
        background-size:cover;
    }

    .img-user1{
        background-image: url('assets/images/imguser1.jpg');
        /* Set a specific height */
        width:100%;
        height: 600px;
        /* padding: 500px 200px; */

        /* Create the parallax scrolling effect */
        background-attachment: fixed;

        background-repeat: no-repeat;
        background-size:cover;
    }

    .img-user2{
        background-image: url('assets/images/imguser2.jpg');
        /* Set a specific height */
        width:100%;
        height: 600px;
        /* padding: 500px 200px; */

        /* Create the parallax scrolling effect */
        background-attachment: fixed;

        background-repeat: no-repeat;
        background-size:cover;
    }

    .img-agen1{
        background-image: url('assets/images/imgagen1.jpg');
        /* Set a specific height */
        width:100%;
        height: 600px;
        /* padding: 500px 200px; */

        /* Create the parallax scrolling effect */
        background-attachment: fixed;

        background-repeat: no-repeat;
        background-size:cover;
    }

    .img-agen2{
        background-image: url('assets/images/imgagen2.jpg');
        /* Set a specific height */
        width:100%;
        height: 600px;
        /* padding: 500px 200px; */

        /* Create the parallax scrolling effect */
        background-attachment: fixed;

        background-repeat: no-repeat;
        background-size:cover;
    }

    .img-agen3{
        background-image: url('assets/images/imgagen3.jpg');
        /* Set a specific height */
        width:100%;
        height: 600px;
        /* padding: 500px 200px; */

        /* Create the parallax scrolling effect */
        background-attachment: fixed;

        background-repeat: no-repeat;
        background-size:cover;
    }

    .img-agen5{
        background-image: url('assets/images/imgagen5.jpg');
        /* Set a specific height */
        width:100%;
        height: 600px;
        /* padding: 500px 200px; */

        /* Create the parallax scrolling effect */
        background-attachment: fixed;

        background-repeat: no-repeat;
        background-size:cover;
    }

    .img-admin1{
        background-image: url('assets/images/imgadmin1.jpg');
        /* Set a specific height */
        width:100%;
        height: 600px;
        /* padding: 500px 200px; */

        /* Create the parallax scrolling effect */
        background-attachment: fixed;

        background-repeat: no-repeat;
        background-size:cover;
    }

    .img-admin2{
        background-image: url('assets/images/imgadmin2.jpg');
        /* Set a specific height */
        width:100%;
        height: 600px;
        /* padding: 500px 200px; */

        /* Create the parallax scrolling effect */
        background-attachment: fixed;

        background-repeat: no-repeat;
        background-size:cover;
    }

    .img-list1{
        background-image: url('assets/images/imglist1.jpg');
        /* Set a specific height */
        width:100%;
        height: 600px;
        /* padding: 500px 200px; */

        /* Create the parallax scrolling effect */
        background-attachment: fixed;

        background-repeat: no-repeat;
        background-size:cover;
    }
    
    </style>


@section('container')
    @auth

    @if(Auth::user()->user_tipe == 'Agen')
        <div class="img-notuser3" style="padding-top: 20%">
            <div class="center text-center">
            <div style="font-size: 50px; font-weight:bold; color:white">Selamat Datang <br> Agen {{Auth::user()->nama_user}}</div>
            </div>
        </div>
        <a href="{{ url('/cari-listing')}}">
        <div class="img-list1 mt-5" style="padding-top: 15%">
            
            <div class="center text-center">
                <div style="font-size: 50px; font-weight:bold; color:white">Cari Listing</div>
                {{-- <a href="{{url('/signin')}}" class="btn" style="color: orangered; background-color:white; font-size: 35px">Sign In</a>
                <a href="{{url('/signup')}}" class="btn" style="color: orchid; background-color:white; margin-left:10%" >Register</a> --}}
            </div>
        </div>
        </a>

        <a href="{{ url('/about')}}">
            <div class="img-agen1 mt-5" style="padding-top: 15%">
                
                <div class="center text-center">
                    <div style="font-size: 80px; font-weight:bold; color:white">About</div>
                    {{-- <a href="{{url('/signin')}}" class="btn" style="color: orangered; background-color:white; font-size: 35px">Sign In</a>
                    <a href="{{url('/signup')}}" class="btn" style="color: orchid; background-color:white; margin-left:10%" >Register</a> --}}
                </div>
            </div>
        </a>
        
        <a href="{{ url('/listing')}}">
            <div class="img-agen2 mt-5" style="padding-top: 15%">
                
                <div class="center text-center">
                    <div style="font-size: 80px; font-weight:bold; color:white">Edit Listing</div>
                    {{-- <a href="{{url('/signin')}}" class="btn" style="color: orangered; background-color:white; font-size: 35px">Sign In</a>
                    <a href="{{url('/signup')}}" class="btn" style="color: orchid; background-color:white; margin-left:10%" >Register</a> --}}
                </div>
            </div>
        </a>

        <a href="{{ url('/pesan')}}">
            <div class="img-agen3 mt-5" style="padding-top: 15%">
                
                <div class="center text-center">
                    <div style="font-size: 80px; font-weight:bold; color:white">Pesan</div>
                    {{-- <a href="{{url('/signin')}}" class="btn" style="color: orangered; background-color:white; font-size: 35px">Sign In</a>
                    <a href="{{url('/signup')}}" class="btn" style="color: orchid; background-color:white; margin-left:10%" >Register</a> --}}
                </div>
            </div>
        </a>

        <a href="{{ url('/pengunjung')}}">
            <div class="img-agen5 mt-5" style="padding-top: 15%">
                
                <div class="center text-center">
                    <div style="font-size: 80px; font-weight:bold; color:white">Data Pengunjung</div>
                    {{-- <a href="{{url('/signin')}}" class="btn" style="color: orangered; background-color:white; font-size: 35px">Sign In</a>
                    <a href="{{url('/signup')}}" class="btn" style="color: orchid; background-color:white; margin-left:10%" >Register</a> --}}
                </div>
            </div>
        </a>
    @endif

    @if(Auth::user()->user_tipe == 'User')
        <div class="img-notuser3" style="padding-top: 20%">
            <div class="center text-center">
            <div style="font-size: 50px; font-weight:bold; color:white">Selamat Datang {{Auth::user()->nama_user}}</div>
            </div>
        </div>
        <a href="{{ url('/carilisting')}}">
        <div class="img-list1 mt-5" style="padding-top: 15%">
            
            <div class="center text-center">
                <div style="font-size: 80px; font-weight:bold; color:white">Cari Listing</div>
                {{-- <a href="{{url('/signin')}}" class="btn" style="color: orangered; background-color:white; font-size: 35px">Sign In</a>
                <a href="{{url('/signup')}}" class="btn" style="color: orchid; background-color:white; margin-left:10%" >Register</a> --}}
            </div>
        </div>
        </a>

        <a href="{{ url('/about')}}">
            <div class="img-agen1 mt-5" style="padding-top: 15%">
                
                <div class="center text-center">
                    <div style="font-size: 80px; font-weight:bold; color:white">About</div>
                    {{-- <a href="{{url('/signin')}}" class="btn" style="color: orangered; background-color:white; font-size: 35px">Sign In</a>
                    <a href="{{url('/signup')}}" class="btn" style="color: orchid; background-color:white; margin-left:10%" >Register</a> --}}
                </div>
            </div>
        </a>

        <a href="{{ url('/user-recommendation')}}">
            <div class="img-user2 mt-5" style="padding-top: 15%">
                
                <div class="center text-center">
                    <div style="font-size: 80px; font-weight:bold; color:white">Rekomendasi</div>
                    {{-- <a href="{{url('/signin')}}" class="btn" style="color: orangered; background-color:white; font-size: 35px">Sign In</a>
                    <a href="{{url('/signup')}}" class="btn" style="color: orchid; background-color:white; margin-left:10%" >Register</a> --}}
                </div>
            </div>
            </a>
    @endif

    @if(Auth::user()->user_tipe == 'Admin')
        <div class="img-notuser3" style="padding-top: 20%">
            <div class="center text-center">
            <div style="font-size: 50px; font-weight:bold; color:white">Selamat Datang Admin</div>
            </div>
        </div>
        <a href="{{ url('/user_management')}}">
        <div class="img-admin1 mt-5" style="padding-top: 15%">
            
            <div class="center text-center">
                <div style="font-size: 80px; font-weight:bold; color:white">Manage User</div>
                {{-- <a href="{{url('/signin')}}" class="btn" style="color: orangered; background-color:white; font-size: 35px">Sign In</a>
                <a href="{{url('/signup')}}" class="btn" style="color: orchid; background-color:white; margin-left:10%" >Register</a> --}}
            </div>
        </div>
        </a>

        <a href="{{ url('/fasilitas')}}">
            <div class="img-admin2 mt-5" style="padding-top: 15%">
                
                <div class="center text-center">
                    <div style="font-size: 80px; font-weight:bold; color:white">Edit Facilities</div>
                    {{-- <a href="{{url('/signin')}}" class="btn" style="color: orangered; background-color:white; font-size: 35px">Sign In</a>
                    <a href="{{url('/signup')}}" class="btn" style="color: orchid; background-color:white; margin-left:10%" >Register</a> --}}
                </div>
            </div>
        </a>
    @endif
        
    

    @else
    <div class="img-notuser1" style="padding-top: 20%">
        <div class="center text-center">
            <div style="font-size: 50px; font-weight:bold; color:white">Selamat Datang</div>
        </div>
    </div>
    <a href="{{url('/signin')}}">
    <div class="img-notuser2 mt-5" style="padding-top: 15%">
        
        <div class="center text-center">
            <div style="font-size: 50px; font-weight:bold; color:white">Log Your Account</div>
            <div style="font-size: 50px; font-weight:bold; color:white">Klik untuk Sign In</div>
            {{-- <a href="{{url('/signin')}}" class="btn" style="color: orangered; background-color:white; font-size: 35px">Sign In</a>
            <a href="{{url('/signup')}}" class="btn" style="color: orchid; background-color:white; margin-left:10%" >Register</a> --}}
        </div>
    </div>
    </a>
    @endauth
    @endsection

    <script src="{{asset('backendmodern/vendor/jquery/jquery.min.js')}}"></script>
  {{-- <script src="{{asset('backendblog/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script> --}}