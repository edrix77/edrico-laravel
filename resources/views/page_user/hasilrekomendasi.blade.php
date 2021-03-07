@extends('layout/main')

@section('title', 'Hasil Rekomendasi')
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
<div style="padding-top: 100px"></div>
@auth
@if(Auth::user()->user_tipe == 'User')
<a href="/user-recommendation" class="btn btn-secondary" style="margin-left: 100px;margin-bottom:20px">&larr; Kembali ke rekomendasi</a>
@endif
@if(Auth::user()->user_tipe == 'Agen')
<a href="/agen-recommendation" class="btn btn-secondary" style="margin-left: 100px;margin-bottom:20px">&larr; Kembali ke rekomendasi</a>
@endif
@endauth
    <div class="container" style="background-color: #4599ca">
    
    <h1 class="mb-5 text-center" style="color: white">Rekomendasi untuk Anda yang paling mendekati</h1>

    @php($i = 0)
    @if ($listings->count()!=0)
    
    @foreach ($alternatif_end as $alternatif)

    
    @foreach ($listings as $listing)

        @if($alternatif['0'] == $listing->id && ($i < 5))
        <!-- Blog Post -->
        <div class="card mb-4">
            <div class="card-body">
              <div class="row">
                <div class="col-lg-6">
                  <a>
                    <img class="img-fluid rounded" style="margin-left: auto; margin-right: auto; display:block;max-height: 300px;max-width: 450px;background-size: contain" style="align-items: center" src="{{ ($listing->multigambar->count()!=0)  ? \Illuminate\Support\Facades\Storage::url($listing->multigambar->first()->nama_file) :  url('assets/images/register4.jpg') }}" alt="Card image cap">
                  </a>
                </div>
                <div class="col-lg-6">
                  @foreach ($districts as $district)
                  @if($listing->kabId == $district->kabId) 
                  <h3 class="card-title">Kota {{$district->kabNama}}, {{$district->kabKodepos}}</h3>
                  @else
                  @endif
                  @endforeach
                <p class="card-text" style="font-size: 22px">{{$listing->nama_listing}}</p>
                <div class="row">
                  <div class="ex1 ml-3 mb-2" style="font-size: 12px;color:#00a2ff;padding-left: 5px; padding-right: 5px">{{$listing->tipe_listing}}</div>
                  <div class="ex1 ml-3 mb-2" style="font-size: 12px;color:#00a2ff;padding-left: 5px; padding-right: 5px">{{$listing->tipe_hunian}}</div>
                </div>
                  <div class="row">
                    <div class="col-6">
                      LT : {{$listing->kriteria->luas_bangunan}}
                    </div>
                    <div class="col-6">
                      LB : {{$listing->kriteria->luas_tanah}}
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-6">
                      KT : @if  ($listing->kriteria->jlh_kmr_tidur == 0) Studio @else {{$listing->kriteria->jlh_kmr_tidur}} @endif
                    </div>
                    <div class="col-6">
                      KM : {{$listing->kriteria->jlh_kmr_mandi}}
                    </div>
                  </div>  

                  <div class="row">
                    <div class="col-3">
                      Jumlah Lantai
                    </div>
                    <div class="col-3">
                      : {{$listing->kriteria->jlh_lantai}}
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-3">
                      Daya Listrik
                    </div>
                    <div class="col-3">
                      : {{$listing->kriteria->daya_listrik}}
                    </div>
                  </div>

                <p class="card-text" style="font-size: 28px">Rp {{number_format($listing->kriteria->harga)}}</p>
                Perolehan Skor : {{$alternatif[1]}}
                @if(Auth::user()->user_tipe == 'User')
                  <a href="/detail/{{$listing->id}}/list" class="btn btn-primary">Lihat Detailnya &rarr;</a>
                @endif
                @if(Auth::user()->user_tipe == 'Agen')
                  <a href="/detail/{{$listing->id}}/" class="btn btn-primary">Lihat Detailnya &rarr;</a>
                @endif

                
                </div>
              </div>
            </div>
            <div class="card-footer text-muted">
            </div>
          </div>
          @php($i += 1)
          @else

          @endif
    
    @endforeach
    @endforeach

    @else
    <div class="col-12 card">
      <img style="margin-left: auto; margin-right: auto; display:block;max-width: 600px;max-height: 400px;background-size: contain" style="align-items: center" src="{{url('assets/images/nodatafound.webp')}}">
    </div>

    @endif
    
    </div> 
@endsection