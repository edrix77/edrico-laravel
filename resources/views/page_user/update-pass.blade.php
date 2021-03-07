@extends('layout/main')

@section('title', 'Edit Password')
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">


@section('container')
    <div class="container" style="padding-top: 100px; padding-bottom:150px">
        <div class="w3-card-4" style="max-width: 500px;margin:auto">

            <div class="w3-container w3-teal">
                <h2 class="text-center">Edit Password Profile</h2>
                
                <button form="updatepassprofile" type="submit" class="btn btn-warning float-right">Update</button>
                <a href="/editprofile" class="btn btn-secondary float-right"> Back</a>
                
            </div>


        <form method="POST" action="/editprofile/{{$user->id}}/gopass" id="updatepassprofile">
            @method('patch')
            @csrf
            
            <div class="row mt-5">
                <div class="col-4">
                    <label for="password">New Password</label>
                </div>
                <div class="col-6">
                    <input form="updatepassprofile" type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Masukkan password" name="password" value="{{ old('password') }}">
                </div>
            </div>
            @error('password')<div class="text-danger mb-3">{{ $message }}</div>@enderror

            <div class="row mt-3">
                <div class="col-4">
                    <label for="confirm">Confirm Password</label>
                </div>
                <div class="col-6">
                <input form="updatepassprofile" type="password" class="form-control @error('confirm') is-invalid @enderror" id="confirm" placeholder="Masukkan confirm password" name="confirm" value="{{ old('confirm') }}">
                </div>
            </div>
            @error('confirm')<div class="text-danger mb-3">{{ $message }}</div>@enderror

           

        </form>
        <div style="padding-top: 30px"></div>
        </div>
    </div>
@endsection