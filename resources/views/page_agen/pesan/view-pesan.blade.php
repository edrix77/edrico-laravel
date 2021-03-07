@extends('layout/main')

@section('title', 'Cek Pesan')
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

@section('container')
    <div class="container" style="padding-top: 50px;padding-bottom: 100px">
        <div class="w3-card-4" style="max-width:500px;margin:auto">
            
            <div class="w3-container w3-green mb-3">
            
                <h1 class="text-center">Pesan</h1>
                
            </div>
        
            
        <div class="w3-container">
                
                <div class="row mt-3">
                    <div class="col-3">
                        <label for="nama_user">Nama Konsumen</label>
                    </div>
                    <div class="col-6">
                        <input readonly type="text" class="form-control" id="nama_user" placeholder="" name="nama_user" value="{{ $message->user->nama_user }}">
                        
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-3">
                        <label for="email">Alamat Email</label>
                    </div>
                    <div class="col-6">
                        <input readonly type="text" class="form-control" id="email" placeholder="" name="email" value="{{ $message->user->email }}">
                        
                    </div>
                </div>
                
                <div class="row mt-3">
                    <div class="col-3">
                        <label for="no_telepon">Nomor Telepon</label>
                    </div>
                    <div class="col-6">
                        <input readonly type="text" class="form-control" id="no_telepon" placeholder="" name="no_telepon" value="{{ $message->user->no_telepon }}">
                    </div>
                </div>

                <div class="row mt-3 mb-5">
                    <div class="col-3">
                        <label for="isi_pesan">Iklan yang ditunjuk</label>
                        <a  href="/detail/{{$message->listing->id}}" target="_blank"><i class="fa fa-search">view</i></a>
                    </div>
                    <div class="col-6">
                        <textarea readonly rows="3" style="width: 300px" type="text" class="form-control" id="isi_pesan" placeholder="" name="isi_pesan" value="{{ $message->listing->nama_listing }}">{{ $message->listing->nama_listing }}</textarea>
                        
                    </div>
                </div>

                <div class="row mt-3 mb-5">
                    <div class="col-3">
                        <label for="isi_pesan">Pesan</label>
                    </div>
                    <div class="col-6">
                        <textarea readonly rows="5" style="width: 300px" type="text" class="form-control" id="isi_pesan" placeholder="Konsumen Anda tertarik dengan iklan Anda, segera hubungi konsumen Anda segera " name="isi_pesan" value="{{ $message->isi_pesan }}">{{ $message->isi_pesan }}</textarea>
                        
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-6">
                        <a href="/pesan" class="btn btn-secondary" style="width: 100px;height:100%"> Back</a>
                    </div>
                    <div class="col-6">
                    <form action="/pesan/{{$message->id}}" id="hapuspesan{{$message->id}}" method="POST" class="d-inline">
                        @method('delete')
                        @csrf
                        <button form="hapuspesan{{$message->id}}" type="submit" onclick="return confirm('Anda Ingin menghapus pesan ini ?')" class="btn btn-danger btn-sm float-right" style="width: 100px">Delete Message</button>
                    </form>
                    </div>
                </div>
                
                
            </div>

        </div>
    </div>

    
    
    <h4 class="text-center">Anda mendapat pesan, silahkan hubungi calon pembeli Anda dengan nomor telepon yang ada dan alamat email</h4>
    
   
@endsection

<script src="{{asset('backendmodern/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('backendblog/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>