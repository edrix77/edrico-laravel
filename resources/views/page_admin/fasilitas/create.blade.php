@extends('layout/main')

@section('title', 'FORM ADD DATA FASILITAS')

@section('container')
    <div class="container">
        <div class="row">
            <div class="col-6">
            <h1 class="mt-5 my-3 mb-5">Form Tambah Fasilitas</h1>

            <form method="POST" action="/fasilitas">
                @csrf
                <div class="form-group">
                  <label for="nama_fasilitas">Nama Fasilitas</label>
                  <input type="text" class="form-control @error('nama_fasilitas') is-invalid @enderror" id="nama_fasilitas" placeholder="Masukkan fasilitas" name="nama_fasilitas" value="{{ old('nama_fasilitas') }}">
                </div>
                @error('nama_fasilitas')<div class="text-danger mb-3">{{ $message }}</div>@enderror
                <button type="submit" class="btn btn-primary"> Submit</button>
                <a href="/fasilitas" class="btn btn-secondary float-right"> Back</a>
              </form>

            </div>
        </div>
    </div>
@endsection