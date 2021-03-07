@extends('layout/main')

@section('title', 'FORM ADD LISTING')
<link rel="icon" href="http://example.com/favicon.png">
            
@section('container')
<form hidden id="searching" action="/listing" method="GET">
</form>
    <div class="container">
        <div class="col-12">
            
                <div class="row ml-3" style="padding-top: 50px">
                    <div>
                        <h1>Daftar Listing</h1>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-4">
                        {{-- <input form="searching" name="search" type="text" class="form-control" placeholder="Search for..."> --}}
                    </div>
                    <div class="col-4">
                        <span class="input-group-append">
                            {{-- <button form="searching" class="btn btn-secondary" type="submit">Go!</button> --}}
                        </span>
                    </div>
                    <div class="col-4">
                        <a href="{{route('listing_create')}}" class="btn btn-primary mb-3 float-right">Add Listing</a>
                    </div>
                </div>
            
                @if (session('status'))
                <div class="alert bg-success" style="color:white">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ session('status') }}
                  </div>
                @endif

                <table class="table table-hover" id="ListingDataTable">
                <thead class="thead-light">
                <tr>
                    <th scope="col" style="text-align: center">#</th>
                    <th scope="col" style="text-align: center">Nama Listing</th>
                    <th scope="col" style="text-align: center">Tipe Listing</th>
                    <th scope="col" style="text-align: center">Tipe Hunian</th>
                    <th scope="col" style="text-align: center">Alamat</th>
                    <th scope="col" style="text-align: center">Harga (Rp.)</th>
                    <th scope="col" style="text-align: center">Views</th>
                    <th scope="col" style="text-align: center">Status</th>
                    <th scope="col" style="text-align: center; width:15%">Aksi</th>
                </tr>
                </thead>
                <tbody>
                   @foreach($listings as $listing)
                    <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td style="font-size: 14px;text-align: center">{{$listing->nama_listing}}</td>
                    <td style="font-size: 14px;text-align: center">{{$listing->tipe_listing}}</td>
                    <td style="font-size: 14px;text-align: center">{{$listing->tipe_hunian}}</td>
                    {{-- <td style="font-size: 14px;text-align: center">{{$listing->user['email']}}</td> --}}
                    <td style="font-size: 14px;text-align: center">{{$listing->alamat}}</td>
                    <td style="font-size: 14px;text-align: center">{{number_format($listing->kriteria->harga)}}</td>
                    <td style="font-size: 14px;text-align: center">{{$listing->views}}</td>
                    <td style="font-size: 14px;text-align: center">{{$listing->Status}}</td>
                    <td>
                        <a href="/listing/{{$listing->id}}/edit" class="btn btn-success btn-sm" style="width: 60px">Edit</a>
                    <form id="delete_listing{{$listing->id}}" action="/listing/{{$listing->id}}" method="POST" class="d-inline">
                        @method('delete')
                        @csrf
                    <button form="delete_listing{{$listing->id}}" type="submit" onclick="return confirm('Anda Ingin menghapus {{$listing->nama_listing}} ?')" class="btn btn-danger btn-sm float-right" style="width: 60px">Delete</button> 
                    </td>
                    </form>
                    </td>
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
        var table = $('#ListingDataTable').DataTable();

        var data = table.row($tr).data();
        console.log(data);
    });
        //End Edit Record
</script>