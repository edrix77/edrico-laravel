@extends('layout/main')

@section('title', 'Edit User')
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

@section('container')
    <div class="container" style="padding-top: 50px;padding-bottom: 100px">
        <div class="w3-card-4" style="max-width:500px;margin:auto">
            
            <div class="w3-container w3-green mb-3">
            
                <h1 class="text-center">View User</h1>
                <button form="editUser" type="submit" class="btn btn-warning float-right"> Update</button>
                <a href="/user_management" class="btn btn-secondary float-right"> Back</a>
            </div>
        
            
        <form class="w3-container" id="editUser" method="POST" action="/user_management/{{$id->id}}">
                @method('patch')
                @csrf

                <div class="row mt-3">
                    <div class="col-3">
                        <label for="nama_user">Nama User</label>
                    </div>
                    <div class="col-6">
                        <input readonly form="editUser" type="text" class="form-control @error('nama_user') is-invalid @enderror" id="nama_user" placeholder="Masukkan nama akun baru" name="nama_user" value="{{ $id->nama_user }}">
                        @error('nama_user')<div class="text-danger mb-3">{{ $message }}</div>@enderror
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-3">
                        <label for="email">Alamat Email</label>
                    </div>
                    <div class="col-6">
                        <input readonly form="editUser" type="text" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Masukkan email" name="email" value="{{$id->email}}">
                        @error('email')<div class="text-danger mb-3">{{ $message }}</div>@enderror
                    </div>
                </div>

                {{-- <div class="row mt-3">
                    <div class="col-3">
                        <label for="password">Password User</label>
                    </div>
                    <div class="col-6">
                        <input readonly form="editUser" type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Masukkan password akun baru" name="password" value="{{ $id->password }}">
                        @error('password')<div class="text-danger mb-3">{{ $message }}</div>@enderror
                    </div>
                </div> --}}
                
                <div class="row mt-3">
                    <div class="col-3">
                        <label for="no_telepon">Nomor Telepon</label>
                    </div>
                    <div class="col-6">
                        <input readonly form="editUser" type="text" class="form-control @error('no_telepon') is-invalid @enderror" id="no_telepon" placeholder="Masukkan Nomor Telepon " name="no_telepon" value="{{ $id->no_telepon }}">
                        @error('no_telepon')<div class="text-danger mb-3">{{ $message }}</div>@enderror
                    </div>
                </div>

                <div class="row mt-3 mb-5">
                    <div class="col-3">
                        <label for="user_tipe">Role User</label>
                    </div>
                    <div class="col-6">
                        <select form="editUser" id="user_tipe" name="user_tipe" style="width: 220px">
                            <option value="Admin"@if ($id->user_tipe == 'Admin') selected @endif >Admin</option>
                        </select>
                        
                    </div>
                </div>
                
                
              </form>
        </div>
    </div>
    
   
@endsection