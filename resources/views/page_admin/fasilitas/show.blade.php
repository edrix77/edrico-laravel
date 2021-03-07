@extends('layout/main')

@section('title', 'DETAIL FASILITAS')

@section('container')
    <div class="container">
        <div class="row">
            <div class="col-6">
                <h1 class="mt-5">Detail Fasilitas</h1>

                <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Id Fasilitas : {{$id->fasilitas_id}}</h5>
                      <h5 class="card-title">Nama Fasilitas : {{$id->nama_fasilitas}}</h5>
                      <a href="{{ $id->fasilitas_id}}/edit" class="btn btn-primary"> Edit</a>
                      <form action="/fasilitas/{{$id->fasilitas_id}}" method="POST" class="d-inline">
                        @method('delete')
                        @csrf
                      <button type="submit" class="btn btn-danger"> Delete</button>
                      </form>
                      <p></p>
                      <a href="/fasilitas" class="card-link">Back</a>
                    </div>
                  </div>
            </div>
        </div>
    </div>
@endsection