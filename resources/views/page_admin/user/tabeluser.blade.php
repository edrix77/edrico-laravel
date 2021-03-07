@extends('layout/main')

@section('title', 'DAFTAR USER')
{{-- <div style="padding-top: 50px"></div> --}}
@section('container')
    <div class="container" style="padding-top: 50px;padding-bottom: 100px">
        <form hidden id="searching" action="/user_management" method="GET">
        </form>
        <div class="col-12">
            
                <div class="row">
                    <h1 class="ml-3 mb-3">Manage User</h1>
                </div>
                <div class="row mb-3">
                    
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
                <!-- Button trigger modal -->

            @if (session('status'))
                <div class="alert bg-success" style="color:white">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ session('status') }}
                </div>
            @endif

                <table class="table table-hover mt-3" id="UserDataTable">
                <thead class="thead-light">
                <tr>
                    <th style="text-align: center" scope="col">#</th>
                    <th hidden>Id</th>
                    <th style="text-align: center" scope="col">Nama</th>
                    <th hidden style="text-align: center" scope="col">Email</th>
                    <th style="text-align: center" scope="col">Nomor Telepon</th>
                    <th hidden>Password</th>
                    <th style="text-align: center" scope="col">Tipe User</th>
                    <th style="text-align: center" scope="col">Broker Agen</th>
                    <th style="text-align: center" scope="col">Aksi</th>
                </tr>
                </thead>
                <tbody>
                   @foreach($users as $user)
                    <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td hidden>{{$user->id}}</td>
                    <td style="text-align: center">{{$user->nama_user}}</td>
                    <td hidden style="text-align: center">{{$user->email}}</td>
                    <td style="text-align: center">{{$user->no_telepon}}</td>
                    <td hidden>{{$user->password}}</td>
                    <td style="text-align: center">{{$user->user_tipe}}</td>
                    <td style="text-align: center">{{$user->broker_agen}}</td>
                    <td style="text-align: center">
                    <a href="/user_management/{{$user->id}}/edit" class="btn btn-secondary btn-sm" style="width: 60px">View</a>
                    {{-- <button class="btn btn-secondary edit_user" data-toggle="modal" data-target="#EditModal">View</button> --}}
                    {{-- <a href="/user_management/{{$user->id}}/edit" class="btn btn-secondary btn-sm" style="width: 60px">View</a> --}}
                    {{-- <form action="/user_management/{{$user->id}}" method="POST" class="d-inline">
                        @method('delete')
                        @csrf
                        <button type="submit" onclick="return confirm('Anda Ingin menghapus {{$user->nama_user}} ?')" class="btn btn-danger btn-sm float-right" style="width: 60px">Delete</button> 
                    </td>
                    </form> --}}
                    </tr>
                    @endforeach
                </tbody>
                </table>
            
        </div>
    </div>
    
    <!-- Modal -->
                <div class="modal fade" id="modalAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color: rgb(137, 216, 64)">
                        <h5 class="modal-title" id="exampleModalLabel" style="color: white">Tambah Data Admin</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                        <form method="POST" action="{{route('user_create')}}">
                                @csrf
                                <div class="form-group">
                                  <label for="nama_user">Nama User</label>
                                  <input type="text" class="form-control @error('nama_user') is-invalid @enderror" id="nama_user" placeholder="Masukkan nama akun baru" name="nama_user" value="{{ old('nama_user') }}">
                                </div>
                                @error('nama_user')<div class="text-danger mb-3">{{ $message }}</div>@enderror

                                <div class="form-group">
                                    <label for="email">Alamat Email</label>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Masukkan email" name="email" value="{{ old('email') }}">
                                </div>
                                @error('email')<div class="text-danger mb-3">{{ $message }}</div>@enderror

                                <div class="form-group">
                                    <label for="password">Password User</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Masukkan password akun baru" name="password" value="{{ old('password') }}">
                                </div>
                                @error('password')<div class="text-danger mb-3">{{ $message }}</div>@enderror

                                <div class="form-group">
                                    <label for="no_telepon">Nomor Telepon</label>
                                    <input type="text" class="form-control @error('no_telepon') is-invalid @enderror" id="no_telepon" placeholder="Masukkan Nomor Telepon " name="no_telepon" value="{{ old('no_telepon') }}">
                                </div>
                                @error('no_telepon')<div class="text-danger mb-3">{{ $message }}</div>@enderror

                                <div class="form-group">
                                   <label for="user_tipe">Role User</label>
                                   <select id="user_tipe" name="user_tipe" value="{{ old('user_tipe') }}">
                                       <option value="Admin">Admin</option>
                                   </select>
                                </div>
                                
                                
                        </div>
                        <div class="modal-footer">
                        <a class="btn btn-secondary" data-dismiss="modal">Close</a>
                        <button type="submit" onclick="return confirm('Konfirmasi')" class="btn btn-success"> Submit</button>
                        </form>   
                        </div>
                   
                    </div>
                    </div>
                </div>

    <!--View Modal-->
    {{-- <div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: rgb(137, 216, 64)">
                    <h5 class="modal-title" id="exampleModalLabel" style="color: white">View</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form method="post" action="/user_management/{{$user->id}}" id="viewUser">
                    @method('patch')
                    @csrf
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="nama_user" class="col-sm-4 col-form-label">Nama User</label>
                            <div class="col-sm-8">
                                <input readonly type="text" class="form-control" id="nama" name="nama_user">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label">Email</label>
                            <div class="col-sm-8">
                                <input required type="text" class="form-control" id="email1" name="email">
                                @error('email1')<div class="text-danger mb-3">{{ $message }}</div>@enderror
                            </div>
                            
                        </div>
                        
                        <div class="form-group row">
                            <label for="password" class="col-sm-4 col-form-label">Password User</label>
                            <div class="col-sm-8">
                                <input readonly type="password" class="form-control" id="pass" name="password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="no_telepon" class="col-sm-4 col-form-label">Nomor Telepon</label>
                            <div class="col-sm-8">
                                <input readonly type="text" class="form-control" id="telepon" name="no_telepon">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="user_tipe" class="col-sm-4 col-form-label">Role User</label>
                            <div class="col-sm-8">
                                <select id="tipe" required name="user_tipe">
                                    <option value="User">User</option>
                                    <option value="Agen">Agen</option>
                                    <option value="Admin">Admin</option>
                                </select>
                                @error('tipe')<div class="text-danger mb-3">{{ $message }}</div>@enderror
                                {{-- <input type="text" class="form-control" id="tipe" name="user_tipe"> --}}
                            {{-- </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        {{-- <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-secondary" data-dismiss="modal">Close</a>
                        <button class="btn btn-success" type="submit" onclick="return confirm('Apakah data sudah benar ?')">Update</button> 
                        {{-- <button type="submit" class="btn btn-primary"> Submit</button> 
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
{{-- <script type="text/javascript">
    $(document).ready(function (){
        var table = $('#UserDataTable').DataTable();

        //Start Edit Record
        table.on('click', '.edit_user', function (){
            $tr = $(this).closest('tr');
            if ($($tr).hasClass('child')){
                $tr = $tr.prev('parent');
            }
            var data = table.row($tr).data();
            console.log(data);
            $('#nama').val(data[2]);
            $('#email1').val(data[3]);
            $('#telepon').val(data[4]);
            $('#pass').val(data[5]);
            $('#tipe').val(data[6]);

            $('#editUser').attr('action', '/user_management/'+data[1]+'');
            $('#EditModal').modal('show');
        });
        //End Edit Record

    });
</script> --}}

<script type="text/javascript">
    $(document).ready(function (){
        var table = $('#UserDataTable').DataTable();

        var data = table.row($tr).data();
            console.log(data);
    });

</script>