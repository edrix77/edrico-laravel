@extends('layout/main')

@section('title', 'Daftar Pengunjung')
<link rel="icon" href="http://example.com/favicon.png">
            
@section('container')
<form id="searching" action="/pesan" method="GET">
</form>
    <div class="container">
        <div class="col-12">
            
                <div class="row ml-3" style="padding-top: 50px">
                    <div>
                        <h1>Daftar Pengunjung</h1>
                    </div>
                </div>
                <div class="row mt-2 mb-3">
                    {{-- <div class="col-10">
                        <input form="searching" name="search" type="text" class="form-control" placeholder="Search for...">
                    </div> --}}
                    <div class="col-12">
                            <form action="/pengunjung/{{Auth::user()->id}}" method="POST" class="d-inline">
                                @method('delete')
                                @csrf
                                <button type="submit" onclick="return confirm('Anda Ingin menghapus semua data pengunjung?')" class="btn btn-danger float-right"> Delete All</button>
                            </form>
                    </div>
                </div>
            
                @if (session('status'))
                <div class="alert bg-success" style="color:white">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ session('status') }}
                  </div>
                @endif

                <table class="table table-hover" id="PengunjungDataTable">
                <thead class="thead-light">
                <tr>
                    <th scope="col" style="text-align: center">#</th>
                    <th scope="col" style="text-align: center">Tanggal</th>
                    <th scope="col" style="text-align: center">Nama User</th>
                    <th scope="col" style="text-align: center">Email User</th>
                    <th scope="col" style="text-align: center">Nomor Telepon</th>
                    <th scope="col" style="text-align: center">Nama Listing</th>
                    {{-- <th scope="col" style="text-align: center">Pesan</th> --}}
                    {{-- <th scope="col" style="text-align: center; width:15%">Aksi</th> --}}
                </tr>
                </thead>
                <tbody>
                   @foreach($visitors as $visitor)
                    <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td style="font-size: 14px;text-align: center">{{$visitor->tanggal}}</td>
                    <td style="font-size: 14px;text-align: center">{{$visitor->user['nama_user']}}</td>
                    <td style="font-size: 14px;text-align: center">{{$visitor->user['email']}}</td>
                    <td style="font-size: 14px;text-align: center">{{$visitor->user['no_telepon']}}</td>
                    <td style="font-size: 14px;text-align: center">{{$visitor->listing->nama_listing}}</td>
                    {{-- <td style="font-size: 14px;text-align: center">{{$message->isi_pesan}}</td> --}}
                    {{-- <td>
                    <a href="/pesan/{{$message->id}}/view" class="btn btn-success btn-sm" style="width: 60px">View</a>
                    <form id="delete_message{{$message->id}}" action="/pesan/{{$message->id}}" method="POST" class="d-inline">
                        @method('delete')
                        @csrf
                    <button form="delete_message{{$message->id}}" type="submit" onclick="return confirm('Anda Ingin menghapus pesan ini ?')" class="btn btn-danger btn-sm float-right" style="width: 60px">Delete</button> 
                    </td> 
                    </form>--}}
                    {{-- </td> --}}
                    </tr>
                    @endforeach
                </tbody>
                </table>
        </div>
    </div>

    <div style="padding-bottom: 300px"></div>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

<script type="text/javascript">
    $(document).ready(function (){
        var table = $('#PengunjungDataTable').DataTable();

        var data = table.row($tr).data();
    });
        //End Edit Record
</script>