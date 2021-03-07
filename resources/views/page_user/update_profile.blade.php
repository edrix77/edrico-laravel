@extends('layout/main')

@section('title', 'Edit Profile')
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">


@section('container')
    <div class="container" style="padding-top: 100px">
        <div class="w3-card-4" style="max-width: 500px;margin:auto">

            <div class="w3-container w3-teal">
                <h2 class="text-center">Edit Profile</h2>
                
                <button form="updateeditprofile" type="submit" class="btn btn-warning float-right">Update</button>
                <a href="/editprofile" class="btn btn-secondary float-right"> Back</a>
                
            </div>

        <form method="POST" action="/editprofile/{{$user->id}}/goedit" id="updateeditprofile">
            @method('patch')
            @csrf
            
            <div class="row mt-5 mb-3">
                <div class="col-4">
                    <label for="nama_user">Nama User</label>
                </div>
                <div class="col-6">
                    <input form="updateeditprofile" type="text" class="form-control @error('nama_user') is-invalid @enderror" id="nama_user" placeholder="Masukkan nama Anda" name="nama_user" value="{{ old('nama_user',$user->nama_user) }}">
                    @error('nama_user')<div class="text-danger mb-3">{{ $message }}</div>@enderror
                </div>
            </div>
            

            <div class="row mb-3">
                <div class="col-4">
                    <label for="email">Email</label>
                </div>
                <div class="col-6">
                    <input form="updateeditprofile" type="text" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Masukkan Email (abc@defgh.xyz)" name="email" value="{{ old('email',$user->email) }}">
                    @error('email')<div class="text-danger mb-3">{{ $message }}</div>@enderror
                </div>
            </div>
            

            <div class="row mb-3">
                <div class="col-4">
                    <label for="no_telepon">Nomor Telepon</label>
                </div>
                <div class="col-6">
                    <input form="updateeditprofile" type="text" class="form-control @error('no_telepon') is-invalid @enderror" id="no_telepon" placeholder="Masukkan Nomor Telepon (081xxxxxxx)" name="no_telepon" value="{{ old('no_telepon',$user->no_telepon) }}">
                    @error('no_telepon')<div class="text-danger mb-3">{{ $message }}</div>@enderror
                </div>
            </div>
            

            @auth
            {{-- @if(Auth::user()->user_tipe == 'Agen') --}}
            @if($user->user_tipe == 'Agen')
            <div class="row">
                <div class="col-4">
                    <label for="broker_agen">Broker Agen</label>
                </div>
                <div class="col-6">
                    <input required form="updateeditprofile" type="text" class="form-control @error('broker_agen') is-invalid @enderror" id="broker_agen" placeholder="Masukkan Broker Properti Anda" name="broker_agen" value="{{ old('broker_agen',$user->broker_agen) }}">
                    @error('broker_agen')<div class="text-danger mb-3">{{ $message }}</div>@enderror
                </div>
            </div>
            
            @endif
            @endauth

        </form>
        <div style="padding-top: 30px"></div>
        </div>
    </div>
    <div style="padding-bottom: 100px"></div>
@endsection
    
        
        