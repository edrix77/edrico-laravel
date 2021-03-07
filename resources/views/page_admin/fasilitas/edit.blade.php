@extends('layout/main')

@section('title', 'FORM UBAH DATA FASILITAS')
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

@section('container')
    <div class="container" style="padding-top: 150px;padding-bottom:100px">
      <div class="w3-card-4" style="max-width:500px;margin:auto">
        
          <div class="w3-container w3-teal mb-3">
            
              <h1 class="text-center">Edit Form Fasilitas</h1>
              <button form="editFacility" type="submit" class="btn btn-success float-right"> Update</button>
              <a href="/fasilitas" class="btn btn-secondary float-right"> Back</a>
            
          </div>

        
            <form class="w3-container" id="editFacility" method="POST" action="/fasilitas/{{$id->fasilitas_id}}">
                @method('patch')
                @csrf
                <div class="row mt-3 mb-5">
                    <div class="col-3">
                        <label for="nama_fasilitas">Nama Fasilitas</label>
                    </div>
                    <div class="col-9">
                        <input form="editFacility" type="text" class="form-control @error('nama_fasilitas') is-invalid @enderror" id="nama_fasilitas" placeholder="Masukkan fasilitas" name="nama_fasilitas" value="{{$id->nama_fasilitas}}">
                    </div>
                </div>
                @error('nama_fasilitas')<div class="text-danger mb-3">{{ $message }}</div>@enderror

                
              </form>

      </div>
    </div>
    
@endsection