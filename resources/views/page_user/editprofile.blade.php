@extends('layout/main')

@section('title', 'Edit Profile')
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<div style="padding-top: 50px"></div>
@section('container')
    <div class="container">

        

        <div class="w3-card-4" style="max-width: 600px;margin:auto">

            <div class="w3-container w3-teal">
                <h2 class="text-center">Your Profile</h2>
                
                <a href="/editprofile/{{$user->id}}/edit" class="btn btn-warning float-right" style="width: 100px">Edit Profile</a>
                <a href="/editprofile/{{$user->id}}/editpass" class="btn btn-warning float-right" style="margin-right:10px">Change to new Password</a>
                
            </div>


            @if (session('status'))
                <div class="alert bg-success" style="color:white">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ session('status') }}
                </div>
            @endif
            
            <div class="form-group mt-5">
                <div class="row mb-3">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-4">
                                <label style="font-size: 18px">Nama User</label>
                            </div>
                            <div class="col-7">
                                <h4 style="border-style: ridge">{{$user->nama_user}}</h4>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-4">
                                <label style="font-size: 18px">Email</label>
                            </div>
                            <div class="col-7">
                                <h4 style="border-style: ridge">{{$user->email}}</h4>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-4">
                                <label style="font-size: 18px">Nomor Telepon</label>
                            </div>
                            <div class="col-7">
                                <h4 style="border-style: ridge">{{$user->no_telepon}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            @auth
            @if(Auth::user()->user_tipe == 'Agen')
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-4">
                                <label style="font-size: 18px">Broker Agen</label>
                            </div>
                            <div class="col-7">
                                <h4 style="border-style: ridge">{{$user->broker_agen}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            @endauth
            </div>

            

            <div style="padding-top: 75px"></div>
        </div>
    </div>
    <div style="padding-bottom: 75px"></div>
@endsection
