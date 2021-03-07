@extends('layout/main')

@section('title', 'Cari Listing')
<!-- Bootstrap core CSS -->
<link href="{{asset('backendmodern/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="{{asset('backendmodern/css/modern-business.css')}}" rel="stylesheet">
{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"> --}}
<link rel="stylesheet" href="{{asset('font-awesomecoba/css/font-awesome.min.css')}}">
<style>
    .ex1 {
      border: 2px solid #01ccff;
      border-radius: 8px;
      
    }

    .img-list1{
        background-image: url('assets/images/nodatafound.webp');
        /* Set a specific height */
        width: 530px;
        height: 400px;
        /* padding: 500px 200px; */


        background-repeat: no-repeat;
        background-size:contain;
    }
    
    </style>


@section('container')
<div style="padding-bottom: 50px"></div>
    <div class="container" style="padding-bottom: 300px">
        
        <div class="row">

                <!-- Blog Entries Column -->
                <div class="col-md-7">
          
                  <!-- Blog Post -->
                  
                      
                  @if ($listings->count()!=0)
                  @foreach ($listings as $listing)
                  @auth

                  <div class="card mb-4">
                    @if(Auth::user()->user_tipe == 'User')
                        <a  href="/detail/{{$listing->id}}/list">
                    @endif
                    @if(Auth::user()->user_tipe == 'Agen')
                        <a  href="/detail/{{$listing->id}}">
                    @endif
                            <img style="margin-left: auto; margin-right: auto; display:block;max-width: 600px;max-height: 400px;background-size: contain" style="align-items: center" class="card-img-top" src="{{ ($listing->multigambar->count()!=0)  ? \Illuminate\Support\Facades\Storage::url($listing->multigambar->first()->nama_file) :  url('assets/images/register4.jpg') }}" alt="Card image cap">
                            {{-- <img class="card-img-top" src="{{ \Illuminate\Support\Facades\Storage::url($gambar->multigambar)}}" alt="Card image cap"> --}}
                      </a>
                            <div class="card-body">
                                <i class="fa fa-eye">   {{$listing->views}}</i>
                            <h1 class="mb-3">Rp {{number_format($listing->kriteria->harga)}} @if ($listing->tipe_listing == 'Disewa') / Tahun @endif</h1>

                                <h2 class="card-title"> {{$listing->nama_listing}}</h2>

                                <div class="row mb-5">
                                    <div class="col-12">
                                        {{$listing->alamat}}
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    {{-- <div class="card-text"> --}}
                                        <div class="col-3">
                                            <i class="fa fa-bed"></i> KT : @if  ($listing->kriteria->jlh_kmr_tidur == 0) Studio @else {{$listing->kriteria->jlh_kmr_tidur}} @endif
                                        </div>
                                        <div class="col-3">
                                           <i class="fa fa-bath"></i> KM : {{$listing->kriteria->jlh_kmr_mandi}}
                                        </div>
                                    {{-- </div> --}}
                                </div>

                                <div class="row mb-3">
                                    {{-- <div class="col-4"> --}}
                                        <div class="ex1 text-center ml-3" style="font-size: 12px;color:#00a2ff;padding-left: 5px; padding-right: 5px">
                                        {{$listing->sertifikat}}
                                        </div>
                                    {{-- </div> --}}
                                </div>
                                @if(Auth::user()->user_tipe == 'User')
                                    <a href="/detail/{{$listing->id}}/list" class="btn" style="background-color: #dbee35">Go to Detail &rarr;</a>
                                @endif
                                @if(Auth::user()->user_tipe == 'Agen')
                                    <a href="/detail/{{$listing->id}}" class="btn" style="background-color: #dbee35">Go to Detail &rarr;</a>
                                @endif
                            </div> 
                            
                      <div class="card-footer text-muted">
                          Posted by {{$listing->user->nama_user}}
                          {{-- <a href="#">Start Bootstrap</a> --}}
                      </div>
                  @endauth
                  </div> 
                  @endforeach
                @else
                <div class="img-list1 card">
                </div>
                  
                @endif


                  <div class="text-center mb-5">
                      {{-- {{$listings->links()}} --}}

                  </div>
                  
                  
                  
                </div>
                <!-- Sidebar Widgets Column -->
                @if(Auth::user()->user_tipe == 'Agen')
                    <form hidden id="searching" action="/cari-listing" method="GET">
                @endif
                @if(Auth::user()->user_tipe == 'User')
                    <form hidden id="searching" action="/carilisting" method="GET">
                @endif
                </form>
                <div class="col-md-4" style="position: fixed; margin-left: 700px">
                    <h5 class="card-header">Search</h5>
                    <div class="card-body">
                    <!-- Search Widget -->
                    <div class="input-group">
                        
                        <div class="input-group mb-3">
                            <div class="row">
                            <div class="col-6">
                                <h5 class="text-center">Tipe Hunian</h5>
                                <select style="width: 150px" form="searching" name="tipe_hunian">
                                    {{-- <option value="-"></option> --}}
                                    <option value="Apartemen" @if ($request->tipe_hunian == 'Apartemen') selected @endif>Apartemen</option>
                                    <option value="Rumah" @if ($request->tipe_hunian == 'Rumah') selected @endif>Rumah</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <h5 class="text-center">Tipe Listing</h5>
                                <select style="width: 150px" form="searching" name="tipe_listing">
                                    {{-- <option value="-"></option> --}}
                                    <option value="Dijual" @if ($request->tipe_listing == 'Dijual') selected @endif>Dijual</option>
                                    <option value="Disewa" @if ($request->tipe_listing == 'Disewa') selected @endif>Disewa</option>
                                </select>
                            </div>
                            </div>
                        </div>
                    
                        <div class="input-group">
                        <input form="searching" name="search" type="text" value="{{$request->search}}" class="form-control" placeholder="Search for...">
                        <span class="input-group-append">
                            <button form="searching" class="btn" style="background-color:#dbee35; color:red" type="submit">Go!</button>
                        </span>
                        
                        </div>
                    </div>
                    </div>


                    
                    <!-- Categories Widget -->
                    <div class="card my-4">
                    
                    </div>
                 
                </div>
        </div>
    </div>

    @endsection

    <script src="{{asset('backendmodern/vendor/jquery/jquery.min.js')}}"></script>
  {{-- <script src="{{asset('backendblog/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script> --}}