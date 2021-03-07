@extends('layout/main')

@section('title', 'Detail Listing')

<!-- Bootstrap core CSS -->
<link href="{{asset('backendmodern/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
{{-- <link href="{{asset('backendshop/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet"> --}}

<!-- Custom styles for this template -->
<link href="{{asset('backendmodern/css/modern-business.css')}}" rel="stylesheet">
{{-- <link href="{{asset('backendshop/css/shop-homepage.css')}}" rel="stylesheet"> --}}


<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<style>
.carousel{
    background: #d1cccc;
    margin-top: 20px;
}
.carousel-item{
    text-align: center;
    min-height: 280px; /* Prevent carousel from being distorted if for some reason image doesn't load */
}

.ex1 {
      border: 2px solid #01ccff;
      border-radius: 8px;
      /* text-indent: 5px; */
    }
</style>


<div class="container-lg my-3" style="padding-top:1px">
  <hr style="height:3px;border-width:0;color:gray;background-color:rgb(42, 218, 174)">
  

  @if (session('status'))
  <div class="alert bg-success" style="color:white">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    {{ session('status') }}
  </div>
  @endif

  <h1>{{$listing->nama_listing}} @if ($listing->Status == 'Tidak Aktif') (Tidak Aktif) @endif</h1>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
      
      <!-- Wrapper for carousel items -->
      <div class="carousel-inner">
        @foreach ($images as $item)
      <div class="carousel-item @if($loop->iteration==1) active @endif">
            <img style="height:440px;background-size: contain" src="{{ \Illuminate\Support\Facades\Storage::url($item->nama_file)}}" alt="Card image cap">
          </div>
          @endforeach
      </div>
      <!-- Carousel controls -->
      <a class="carousel-control-prev" style="width:60px" href="#myCarousel" data-slide="prev">
          <span class="carousel-control-prev-icon"></span>
      </a>
      <a class="carousel-control-next" style="width:60px" href="#myCarousel" data-slide="next">
          <span class="carousel-control-next-icon"></span>
      </a>
  </div>
</div>

<div class="container mb-5">
  
  <div class="row">
      <div class="col-8">
        <h1>Rp {{number_format($listing->kriteria->harga)}} @if ($listing->tipe_listing == 'Disewa') / Tahun @endif</h1>
        <div class="row mt-3 mb-3">
          <div class="ex1 ml-3 text-center" style="padding-left: 5px; padding-right: 5px">
              {{$listing->tipe_hunian}}
          </div>
          <div class="ex1 ml-3 text-center" style="padding-left: 5px; padding-right: 5px">
              {{$listing->tipe_listing}}
          </div>
          <div class="ex1 ml-3 text-center" style="padding-left: 5px; padding-right: 5px">
            {{$listing->sertifikat}}
        </div>
        </div>

        <div class="row mb-5">
          <div class="col-12">
            {{$listing->alamat}}
          </div>
        </div>

        <h2>Deskripsi</h2>

        <div class="row mt-3 mb-5">
          <div class="col-9" itemprop="description">
            {{$listing->deskripsi}}
          </div>
        </div>

        <h2>Spesifikasi</h2>

        <div class="row mt-3">
          <div class="col-6">
            Luas Tanah <br>
            {{$listing->kriteria->luas_tanah}} m²
            <hr style="height:2px;border-width:0;color:gray;background-color:rgb(90, 112, 107)">
          </div>
          <div class="col-6">
            Luas Bangunan <br>
            {{$listing->kriteria->luas_bangunan}} m²
            <hr style="height:2px;border-width:0;color:gray;background-color:rgb(42, 218, 174)">
          </div>
        </div>

        <div class="row mt-3">
          <div class="col-6">
            Kamar Tidur <br>
            <i class="fa fa-bed"></i>@if  ($listing->kriteria->jlh_kmr_tidur == 0) Studio @else {{$listing->kriteria->jlh_kmr_tidur}} @endif
            <hr style="height:2px;border-width:0;color:gray;background-color:rgb(42, 218, 174)">
          </div>
          <div class="col-6">
            Kamar Mandi <br>
            <i class="fa fa-bath"></i> {{$listing->kriteria->jlh_kmr_mandi}}
            <hr style="height:2px;border-width:0;color:gray;background-color:rgb(90, 112, 107)">
          </div>
        </div>
        
        <div class="row mt-3 mb-3">
          <div class="col-6">
            Jumlah Lantai <br>
            {{$listing->kriteria->jlh_lantai}}
            <hr style="height:2px;border-width:0;color:gray;background-color:rgb(90, 112, 107)">
          </div>
          <div class="col-6">
            Daya Listrik <br>
            {{$listing->kriteria->daya_listrik}} watt
            <hr style="height:2px;border-width:0;color:gray;background-color:rgb(42, 218, 174)">
          </div>
        </div>

        <h2>Fasilitas</h2>



        <div class="row mt-3">
          <div class="col-6">
             
             @foreach ($facilities as $facility)
             @foreach ($facilitieslistings as $facilitylisting)
             @if ($facilitylisting->fasilitas_id == $facility->fasilitas_id)
               <i class="fa fa-check"></i> {{$facility->nama_fasilitas}} <br>
             @endif
             @endforeach
             @endforeach
            <hr style="height:2px;border-width:0;color:gray;background-color:rgb(90, 112, 107)">
          </div>
          
        </div>

      </div>
      <div class="col-4">
        <div class="card my-4">
          <div class="card-body" style="background-color:#e0f0f0">
            <h2 class="text-center">{{$listing->user->nama_user}}</h2>  
            <div class="row text-center">
              <div class="col-12">
                {{$listing->user->broker_agen}}
              </div>
            </div>
            <div class="row text-center ">
              <div class="col-12">
                <label style="font-size:18px;color:rgb(50, 53, 53);border:2px solid #000000;border-radius:6px">Hubungi {{$listing->user->no_telepon}}</label>

              </div>
            </div>

            @if(Auth::user()->user_tipe == 'Agen')
              <form id="kirimPesan" method="POST" action="/pesan/detail/{{$listing->id}}">
                @csrf
            @endif
            @if(Auth::user()->user_tipe == 'User')
              <form id="kirimPesan" method="POST" action="/pesan/detail/{{$listing->id}}/list">
                @csrf
            @endif
              
              

            
            <hr style="height:2px;border-width:0;color:gray;background-color:rgb(42, 218, 174)">

            <h3 class="text-center">Kirim Permintaan</h3>

            <div class="row">
              <label for="">Nama</label>
            </div>
            <div class="row">
            <input form="kirimPesan" type="text" id="nama_user" name="nama_user" style="width:100%;border:1px solid #df8d2f;border-radius:4px " readonly value=" @if (is_object($user)) {{$user->nama_user}} @endif">
            </div>

            <div class="row">
              <label for="">Email</label>
            </div>
            <div class="row">
            <input form="kirimPesan" type="text" id="email" name="email" style="width:100%;;border:1px solid #2fdf2f;border-radius:4px " readonly value="@if (is_object($user)) {{$user->email}} @endif">
            </div>

            <div class="row">
              <label for="">Nomor Telepon</label>
            </div>
            <div class="row">
            <input form="kirimPesan" type="text" id="no_telepon" name="no_telepon" style="width:100%;border:1px solid #df8d2f;border-radius:4px" readonly value="@if (is_object($user)) {{$user->no_telepon}} @endif">
            </div>

            <div class="row">
              <label for="isi_pesan">Pesan</label>
            </div>
            <div class="row">
            <textarea form="kirimPesan" rows="3" type="text" class="@error('isi_pesan') is-invalid @enderror" id="isi_pesan" name="isi_pesan" style="width:100%;border:1px solid #2fdf2f;border-radius:4px" value="{{old('isi_pesan')}}"></textarea>
            @error('isi_pesan')<div class="text-danger mb-3">{{ $message }}</div>@enderror
            </div>

            <input type="text" hidden id="tanggal" name="tanggal">

            <button form="kirimPesan" class="mt-3" style=" height:50px;width: 100%; margin:auto; color:rgb(255, 255, 255); background-color:rgb(177, 224, 165)" @if (!is_object($user)) hidden @endif @if ($listing->user_id == $user->id) hidden @endif  type="submit"  onclick="return confirm('Kirim untuk booking ?')">Send</button>
          </form>
          </div>
          </div>
      </div>
  </div>
  
</div>
{{-- <div class="container">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      
      <div class="carousel-inner" role="listbox">
        <!-- Slide One - Set the background image for this slide in the line below -->
        @foreach ($images as $item)
        
            {{-- <img src="{{ \Illuminate\Support\Facades\Storage::url($item->nama_file) }}" alt=""> --}}
            {{-- <div class="carousel-item">
              <img src="{{ \Illuminate\Support\Facades\Storage::url($item->nama_file) }}" alt="asv">
                {{-- <div class="carousel-caption d-none d-md-block">
                    <h3>First Slide</h3>
                    <p>This is a description for the first slide.</p>
                </div> 
            </div> 
            <div class="carousel-item active">
              <img class="d-block img-fluid" src="{{ \Illuminate\Support\Facades\Storage::url($item->nama_file) }}" alt="First slide">
            </div>
            
        @endforeach
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
      </div>
    </div>

    
</div> --}}

  <script src="{{asset('backendmodern/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('backendmodern/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  {{-- <script src="{{asset('backendshop/vendor/jquery/jquery.min.js')}}"></script> --}}
  {{-- <script src="{{asset('backendshop/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script> --}}