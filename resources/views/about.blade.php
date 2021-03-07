@extends('layout/main')

@section('title', 'Tentang Web')
<!-- Bootstrap core CSS -->
<link href="{{asset('backendmodern/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="{{asset('backendmodern/css/modern-business.css')}}" rel="stylesheet">

@section('container')
    <div class="container">
        {{-- tes ini about --}}
        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3">About
        </h1>

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="/">Home</a>
            </li>
            <li class="breadcrumb-item active">About</li>
          </ol>

            <!-- Intro Content -->
        <div class="row">
            <div class="col-lg-6 text-center">
            <img class="img-fluid rounded mb-4" src="{{asset('assets/images/login1.jpg')}}" alt="">
            </div>
        <div class="col-lg-6">
          <h2>Tentang website</h2>
          <p>Aplikasi web ini menampilkan data hunian atau tempat tinggal yang dijual oleh agen, lokasi berada di Kota Jakarta. 
            Untuk melihatnya, klik tombol Cari Listing.
            Di tiap-tiap data listing pada Cari Listing, dapat di klik untuk melihat detail listing yang dipilih. 
            Disediakan deskripsi , spesifikasi , dan kontak agen.</p>
          <p>Tombol Rekomendasi, digunakan sebagai memberikan rekomendasi pilihan hunian atau tempat tinggal 
            dari kriteria input yang diinginkan pengguna. Metode yang digunakan yaitu Profile 
            Matching, output yang dihasilkan berupa perangkingan rekomendasi  .</p>
          <p>Untuk menggunakannya, isi kriteria-kriteria yang tersedia, kemudian klik tombol
            Proses.</p>
        </div>
        </div>

        <div style="padding-bottom: 30px"></div>
        <hr style="height:3px;border-width:0;color:gray;background-color:rgb(42, 218, 174)">
        <div style="padding-bottom: 30px"></div>

        <div class="row">
        <div class="col-lg-6">
          <h2>Biodata Mahasiswa</h2>
          <p>Saya Edrico Alroy Dipawinata, mahasiswa Universitas Tarumanagara Jurusan Teknik Informatika Semester akhir. Saat ini saya mengerjakan tugas akhir saya yaitu membuat aplikasi berbasis web dengan sistem pendukung keputusan pemilihan tempat tinggal menggunakan metode profile matching. </p>
          <p>Dibimbing oleh :</p>
          <p>Pembimbing Utama      : Bagus Mulyawan, S.Kom., MM</p>
          <p>Pembimbing Pendamping : Manatap Dolok Lauro, S.Kom., MMSI</p>
        </div>
            <div class="col-lg-6">
            <img class="img-fluid rounded ml-5 mb-4" style="max-height: 300px" src="{{asset('assets/images/3x4a.jpg')}}" alt="">
            </div>
        </div>
    </div>
    
@endsection

<script src="{{asset('backendmodern/vendor/jquery/jquery.min.js')}}"></script>
{{-- <script src="{{asset('backendmodern/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script> --}}