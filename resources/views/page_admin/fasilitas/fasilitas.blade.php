@extends('layout/main')

@section('title', 'DAFTAR FASILITAS')


@section('container')
<form hidden id="searching" action="/fasilitas" method="GET">
</form>
    <div class="container" style="padding-top:50px">
        <div class="col-12">
            <div class="row">
                <h1 class="ml-3 mb-3">Edit Facilities</h1>
            </div>
            <div class="row mt-3 mb-3">
                <div class="col-4">
                    {{-- <input form="searching" name="search" type="text" class="form-control" placeholder="Search for..."> --}}
                </div>
                <div class="col-4">
                    {{-- <button form="searching" class="btn btn-secondary" type="submit">Go!</button> --}}
                </div>
                <div class="col-4">
                    <a class="btn btn-primary float-right mt-1" data-toggle="modal" data-target="#modalAdd" >
                        Add Data
                    </a>
                </div>
            </div>        
            


                @if (session('status'))
                    <div class="alert bg-success" style="color:white">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        {{ session('status') }}
                    </div>
                @endif

                <table class="table table-hover mt-3" id="FasilitasDataTable" style="">
                <thead class="thead-light">
                <tr>
                    <th class="text-center" scope="col">#</th>
                    <th hidden>Id</th>
                    <th class="text-center" scope="col">Nama Fasilitas</th>
                    <th class="text-center" scope="col">Aksi</th>
                </tr>
                </thead>
                <tbody>
                   @foreach($facilities as $facility)
                    <tr>
                    <th class="text-center" scope="row">{{$loop->iteration}}</th>
                    <td hidden>{{$facility->fasilitas_id}}</td>
                    <td class="text-center">{{$facility->nama_fasilitas}}</td>
                    <td class="text-center">
                    <a href="/fasilitas/{{$facility->fasilitas_id}}/edit" class="btn btn-warning" >
                            Edit
                    </a>
                    {{-- <button class="btn btn-warning edit_fasilitas" data-toggle="modal" data-target="#EditModal">Edit</button> --}}
                    <form action="/fasilitas/{{$facility->fasilitas_id}}" method="POST" class="d-inline">
                        @method('delete')
                        @csrf
                        <button type="submit" onclick="return confirm('Anda Ingin menghapus {{$facility->nama_fasilitas}} ?')" class="btn btn-danger"> Delete</button>
                    </form>
                    </td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
        </div>
    </div>

    <!-- Modal Add-->
    <div class="modal fade" id="modalAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #21c581">
            <h5 class="modal-title" style="color: #ffffff" id="exampleModalLabel">Tambah Fasilitas</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            <form method="POST" action="/fasilitas">
                    @csrf
                    <div class="form-group">
                        <label for="nama_fasilitas">Nama Fasilitas</label>
                        <input type="text" class="form-control @error('nama_fasilitas') is-invalid @enderror" id="nama_fasilitas" placeholder="Masukkan fasilitas" name="nama_fasilitas" value="{{ old('nama_fasilitas') }}">
                      </div>
                      @error('nama_fasilitas')<div class="text-danger mb-3">{{ $message }}</div>@enderror
                      
                    
                    
            </div>
            <div class="modal-footer">
            <a class="btn btn-secondary" data-dismiss="modal">Close</a>
            <button type="submit" class="btn btn-success"> Submit</button>
            </form>   
            </div>
       
        </div>
        </div>
    </div>


    <!--Edit Modal-->
    {{-- <div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Fasilitas</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form method="post" action="/fasilitas/{{$facility->fasilitas_id}}" id="editFacility">
                    @method('patch')
                    @csrf
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="name_fasilitas" class="col-sm-4 col-form-label">Nama Fasilitas</label>
                            <div class="col-sm-8">
                                <input required type="text" class="form-control" id="name_fasilitas" name="name_fasilitas">
                                @error('name_fasilitas')<div class="text-danger mb-3">{{ $message }}</div>@enderror
                            </div>
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" type="submit">Save</button>
                        <a class="btn btn-secondary" data-dismiss="modal">Close</a>
                        <button type="submit" class="btn btn-success"> Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div> --}}
    
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

{{--JS Table Chipset--}}
{{-- <script type="text/javascript">
    $(document).ready(function (){
        var table = $('#FasilitasDataTable').DataTable();
    });
</script> --}}

{{--JS Edit & Delete Modal Chipset--}}
<script type="text/javascript">
    $(document).ready(function (){
        var table = $('#FasilitasDataTable').DataTable();
        $tr = $(this).closest('tr');
            if ($($tr).hasClass('child')){
                $tr = $tr.prev('parent');
            }
        var data = table.row($tr).data();
            console.log(data);
        //Start Edit Record
        // table.on('click', '.edit_fasilitas', function (){
        //     $tr = $(this).closest('tr');
        //     if ($($tr).hasClass('child')){
        //         $tr = $tr.prev('parent');
        //     }
            
        //     $('#name_fasilitas').val(data[2]);
        //     $('#editFacility').attr('action', '/fasilitas/'+data[1]+'');
        //     $('#EditModal').modal('show');
        // });
        //End Edit Record

    });
</script>



