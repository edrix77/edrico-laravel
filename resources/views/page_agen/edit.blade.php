@extends('layout/main')

@section('title', 'EDIT LISTING')

<!-- Bootstrap core CSS -->
<link href="{{asset('backendmodern/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="{{asset('backendmodern/css/modern-business.css')}}" rel="stylesheet">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<style>
    /* Popup container - can be anything you want */
    .popup {
      position: relative;
      display: inline-block;
      cursor: pointer;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }
    
    /* The actual popup */
    .popup .popuptext {
      visibility: hidden;
      width: 160px;
      background-color: #555;
      color: #fff;
      text-align: center;
      border-radius: 6px;
      padding: 8px 0;
      position: absolute;
      z-index: 1;
      bottom: 125%;
      left: 50%;
      margin-left: -80px;
    }
    
    /* Popup arrow */
    .popup .popuptext::after {
      content: "";
      position: absolute;
      top: 100%;
      left: 50%;
      margin-left: -5px;
      border-width: 5px;
      border-style: solid;
      border-color: #555 transparent transparent transparent;
    }
    
    /* Toggle this class - hide and show the popup */
    .popup .show {
      visibility: visible;
      -webkit-animation: fadeIn 1s;
      animation: fadeIn 1s;
    }
    
    /* Add animation (fade in the popup) */
    @-webkit-keyframes fadeIn {
      from {opacity: 0;} 
      to {opacity: 1;}
    }
    
    @keyframes fadeIn {
      from {opacity: 0;}
      to {opacity:1 ;}
    }
    </style>

<div style="padding-top: 50px"></div>
@section('container')
    <div class="container">
        <div class="w3-card-4" style="margin:auto">
            
            <div class="w3-container w3-teal mb-3">
                <div class="row" >
                    <h2 style="padding-left: 45%">Edit Listing</h2>
                </div>
            
                
                
                    <button form="edit_listing" type="submit" class="btn btn-success float-right" style="width:10%"> Update</button>
                    <a href="/listing" class="btn btn-secondary float-right mr-5" style="width:10%"> Back</a>
               
            </div>
            
            
            @if (session('status'))
            <div class="alert bg-success" style="color:white">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                {{ session('status') }}
            </div>
            @endif

        <form class="w3-container" id="edit_listing" method="POST" action="/listing/{{$listing->id}}" enctype="multipart/form-data">
                {{-- @method('patch') --}}
                @csrf
        

                
            
                {{-- <div class="control-group form-group"> --}}
                <div class="row mt-3">
                    <div class="col-3">
                        <label for="nama_listing">Nama Listing</label>
                    </div>
                    <div class="col-6">
                        <input form="edit_listing" type="text" class="form-control @error('nama_listing') is-invalid @enderror" id="nama_listing" placeholder="Masukkan Judul listing" name="nama_listing" value="{{ old('nama_listing', $listing->nama_listing)  }}">
                    </div>
                </div>
                @error('nama_listing')<div class="text-danger mb-3">{{ $message }}</div>@enderror

                <div class="row mt-3">
                    <div class="col-3">
                        <label for="tipe_listing">Tipe Listing</label>
                    </div>
                    <div class="col-6">
                        <select style="width: 300px" class="@error('tipe_listing') is-invalid @enderror" form="edit_listing" id="tipe_listing" name="tipe_listing">
                            <option></option>
                            <option value="Dijual" @if (old('tipe_listing', $listing->tipe_listing) == 'Dijual') selected @endif>Dijual</option>
                            <option value="Disewa" @if (old('tipe_listing', $listing->tipe_listing) == 'Disewa') selected @endif>Disewa</option>
                        </select>
                    </div>
                </div>
                @error('tipe_listing')<div class="text-danger mb-3">{{ $message }}</div>@enderror

                <div class="row mt-3">
                    <div class="col-3">
                        <label for="tipe_hunian">Tipe Hunian</label>
                    </div>
                    <div class="col-6">
                        <select style="width: 300px" class="@error('tipe_hunian') is-invalid @enderror" form="edit_listing" id="tipe_hunian" name="tipe_hunian">
                            <option></option>
                            <option value="Apartemen" @if (old('tipe_hunian', $listing->tipe_hunian)  == 'Apartemen') selected @endif>Apartemen</option>
                            <option value="Rumah" @if (old('tipe_hunian', $listing->tipe_hunian)  == 'Rumah') selected @endif >Rumah</option>
                        </select>
                    </div>
                </div>
                @error('tipe_hunian')<div class="text-danger mb-3">{{ $message }}</div>@enderror

                <div class="row mt-3">
                    <div class="col-3">
                        <label for="alamat">Alamat</label>
                    </div>
                    <div class="col-6">
                        <input form="edit_listing" type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" placeholder="Masukkan Alamat Listing" name="alamat" value="{{ old('alamat', $listing->alamat)  }}">
                    </div>
                </div>
                @error('alamat')<div class="text-danger mb-3">{{ $message }}</div>@enderror
                
                <div class="row mt-3">
                    <div class="col-3">
                        <label for="deskripsi">Deskripsi</label>
                    </div>
                    <div class="col-6">
                        <textarea rows="5" form="edit_listing" type="text" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" placeholder="Masukkan Deskripsi" name="deskripsi" value="{{ old('deskripsi', $listing->deskripsi)  }}">{{ old('deskripsi', $listing->deskripsi)  }}</textarea>
                    </div>
                </div>
                @error('deskripsi')<div class="text-danger mb-3">{{ $message }}</div>@enderror

                <div class="row mt-3">
                    <div class="col-3">
                        <label for="sertifikat">Sertifikat</label>
                    </div>
                    <div class="col-6">
                        <select style="width: 300px" form="edit_listing" class="form-control @error('sertifikat') is-invalid @enderror" id="sertifikat" name="sertifikat">
                            <option></option>
                            <option value="Sertifikat Hak Milik (SHM)" @if (old('sertifikat', $listing->sertifikat) == 'Sertifikat Hak Milik (SHM)') selected @endif>Sertifikat Hak Milik (SHM)</option>
                            <option value="Sertifikat Hak Guna Bangunan (SHGB)" @if (old('sertifikat', $listing->sertifikat) == 'Sertifikat Hak Guna Bangunan (SHGB)') selected @endif>Sertifikat Hak Guna Bangunan (SHGB)</option>
                            <option value="Sertifikat Unit (Strata)"@if (old('sertifikat', $listing->sertifikat) == 'Sertifikat Unit (Strata)') selected @endif >Sertifikat Unit (Strata)</option>
                            <option value="PPJB" @if (old('sertifikat', $listing->sertifikat) == 'PPJB') selected @endif>Perjanjian Pengikatan Jual Beli</option>
                            <option value="PJB" @if (old('sertifikat', $listing->sertifikat) == 'PJB') selected @endif>Pengikatan Jual Beli</option>
                            <option value="AJB" @if (old('sertifikat', $listing->sertifikat) == 'AJB') selected @endif>Akta Jual Beli</option>
                        </select>
                    </div>
                </div>
                @error('sertifikat')<div class="text-danger mb-3">{{ $message }}</div>@enderror
                

                <div class="row mt-3">
                    <div class="col-3">
                        <label for="kabId">Kabupaten / Kota</label>
                    </div>
                    <div class="col-6">
                        <select form="edit_listing" style="width: 300px" class="form-control @error('kabId') is-invalid @enderror" id="kabId" name="kabId">
                            <option></option>
                            @foreach ($kabupaten as $kbptn)
                                <option value="{{$kbptn->kabId}}" @if (old('kabId', $listing->kabId) == $kbptn->kabId) selected @endif>{{$kbptn->kabNama}}</option>
                            @endforeach   
                        </select>
                    </div>
                </div>
                @error('kabId')<div class="text-danger mb-3">{{ $message }}</div>@enderror

                <div class="row mt-3">
                    <div class="col-3">
                        <label for="status">Status</label>
                    </div>
                    <div class="col-6">
                        <select style="width: 300px" form="edit_listing" class="@error('status') is-invalid @enderror" id="status" name="status">
                            <option value="Aktif" @if (old('status', $listing->Status) == 'Aktif') selected @endif>Aktif</option>
                            <option value="Tidak Aktif" @if (old('status', $listing->Status) == 'Tidak Aktif') selected @endif>Tidak Aktif</option>
                        </select>
                    </div>
                </div>
                @error('status')<div class="text-danger mb-3">{{ $message }}</div>@enderror
                
                <hr style="height:2px;border-width:0;color:gray;background-color:rgb(42, 218, 174)">
                
                
                <h3 class="text-center mt-5 mb-5">Kriteria</h3>
                <div style="margin-left: 25%;margin-bottom:25px">
                    <div class="row mt-3">
                        <div class="col-3">
                            <label for="luas_tanah">Luas Tanah (m2) <div class="popup" onclick="myFunction1()"><i class="fa fa-question"></i><span class="popuptext" id="myPopup1">Jika Apartemen, luas bangunan samakan dengan luas tanah</span></div></label>
                        </div>
                        <div class="col-6">
                            <input style="width: 270px" form="edit_listing" type="text" class="form-control @error('luas_tanah') is-invalid @enderror" id="luas_tanah" placeholder="(contoh isi misal : 90)" name="luas_tanah" value="{{ old('luas_tanah', $listing->kriteria->luas_tanah)  }}">
                            @error('luas_tanah')<div class="text-danger mb-3">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    
                    <div class="row mt-3">
                    <div class="col-3">
                        <label for="luas_bangunan">Luas Bangunan (m2)</label>
                    </div>
                    <div class="col-6">
                        <input style="width: 270px" form="edit_listing" type="text" class="form-control @error('luas_bangunan') is-invalid @enderror" id="luas_bangunan" placeholder="(contoh isi misal : 60)" name="luas_bangunan" value="{{ old('luas_bangunan', $listing->kriteria->luas_bangunan)  }}">
                        @error('luas_bangunan')<div class="text-danger mb-3">{{ $message }}</div>@enderror
                    </div>
                </div>
                
                <div class="row mt-3">
                    <div class="col-3">
                        <label for="jlh_kmr_tidur">Jumlah Kamar Tidur <div class="popup" onclick="myFunction()"><i class="fa fa-question"></i><span class="popuptext" id="myPopup">Jika Apartemen dengan kamar studio, ketik angka 0</span></div></label>
                    </div>
                    <div class="col-6">
                        <input style="width: 270px" form="edit_listing" type="text" class="form-control @error('jlh_kmr_tidur') is-invalid @enderror" id="jlh_kmr_tidur" placeholder="(contoh isi misalnya : 3)" name="jlh_kmr_tidur" value="{{ old('jlh_kmr_tidur', $listing->kriteria->jlh_kmr_tidur)  }}">
                        @error('jlh_kmr_tidur')<div class="text-danger mb-3">{{ $message }}</div>@enderror
                    </div>
                </div>
                
                <div class="row mt-3">
                    <div class="col-3">
                        <label for="jlh_kmr_mandi">Jumlah Kamar Mandi</label>
                    </div>
                    <div class="col-6">
                        <input style="width: 270px" form="edit_listing" type="text" class="form-control @error('jlh_kmr_mandi') is-invalid @enderror" id="jlh_kmr_mandi" placeholder="(contoh isi misalnya : 2)" name="jlh_kmr_mandi" value="{{ old('jlh_kmr_mandi', $listing->kriteria->jlh_kmr_mandi)  }}">
                        @error('jlh_kmr_mandi')<div class="text-danger mb-3">{{ $message }}</div>@enderror
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-3">
                        <label for="jlh_lantai">Jumlah Lantai</label>
                    </div>
                    <div class="col-6">
                        <input style="width: 270px" form="edit_listing" type="text" class="form-control @error('jlh_lantai') is-invalid @enderror" id="jlh_lantai" placeholder="(contoh isi misalnya : 0)" name="jlh_lantai" value="{{ old('jlh_lantai',$listing->kriteria->jlh_lantai)  }}">
                        @error('jlh_lantai')<div class="text-danger mb-3">{{ $message }}</div>@enderror
                    </div>
                </div>
                
                <div class="row mt-3">
                    <div class="col-3">
                        <label for="daya_listrik">Daya Listrik</label>
                    </div>
                    <div class="col-6">
                        {{-- <input style="width: 270px" form="edit_listing" type="text" class="form-control @error('daya_listrik') is-invalid @enderror" id="daya_listrik" placeholder="(contoh isi misalnya : 2200)" name="daya_listrik" value="{{ $listing->kriteria->daya_listrik }}"> --}}
                        <select form="edit_listing" id="dayalistrik" style="width: 270px" class="@error('daya_listrik') is-invalid @enderror" name="daya_listrik">
                            <option></option>
                            <option value="250" @if (old('daya_listrik', $listing->kriteria->daya_listrik) == '250') selected @endif >250</option>
                            <option value="450" @if (old('daya_listrik', $listing->kriteria->daya_listrik) == '450') selected @endif >450</option>
                            <option value="900" @if (old('daya_listrik', $listing->kriteria->daya_listrik) == '900') selected @endif >900</option>
                            <option value="1300" @if (old('daya_listrik', $listing->kriteria->daya_listrik) == '1300') selected @endif >1300</option>
                            <option value="2200" @if (old('daya_listrik', $listing->kriteria->daya_listrik) == '2200') selected @endif >2200</option>
                            <option value="3500" @if (old('daya_listrik', $listing->kriteria->daya_listrik) == '3500') selected @endif >3500</option>
                            <option value="3900" @if (old('daya_listrik', $listing->kriteria->daya_listrik) == '3900') selected @endif >3900</option>
                            <option value="4400" @if (old('daya_listrik', $listing->kriteria->daya_listrik) == '4400') selected @endif >4400</option>
                            <option value="5500" @if (old('daya_listrik', $listing->kriteria->daya_listrik) == '5500') selected @endif >5500</option>
                            <option value="6600" @if (old('daya_listrik', $listing->kriteria->daya_listrik) == '6600') selected @endif >6600</option>
                            <option value="7700" @if (old('daya_listrik', $listing->kriteria->daya_listrik) == '7700') selected @endif >7700</option>
                            <option value="10600" @if (old('daya_listrik', $listing->kriteria->daya_listrik) == '10600') selected @endif >10600</option>
                            <option value="11000" @if (old('daya_listrik', $listing->kriteria->daya_listrik) == '11000') selected @endif >11000</option>
                            <option value="13200" @if (old('daya_listrik', $listing->kriteria->daya_listrik) == '13200') selected @endif >13200</option>
                            <option value="13900" @if (old('daya_listrik', $listing->kriteria->daya_listrik) == '13900') selected @endif >13900</option>
                            <option value="16500" @if (old('daya_listrik', $listing->kriteria->daya_listrik) == '16500') selected @endif >16500</option>
                            <option value="17000" @if (old('daya_listrik', $listing->kriteria->daya_listrik) == '17000') selected @endif >17000</option>
                            <option value="22000" @if (old('daya_listrik', $listing->kriteria->daya_listrik) == '22000') selected @endif >22000</option>
                            <option value="23000" @if (old('daya_listrik', $listing->kriteria->daya_listrik) == '23000') selected @endif >23000</option>
                            <option value="33000" @if (old('daya_listrik', $listing->kriteria->daya_listrik) == '33000') selected @endif >33000</option>
                            <option value="41500" @if (old('daya_listrik', $listing->kriteria->daya_listrik) == '41500') selected @endif >41500</option>
                            <option value="53000" @if (old('daya_listrik', $listing->kriteria->daya_listrik) == '53000') selected @endif >53000</option>
                            <option value="66000" @if (old('daya_listrik', $listing->kriteria->daya_listrik) == '66000') selected @endif >66000</option>
                        </select>
                        @error('daya_listrik')<div class="text-danger mb-3">{{ $message }}</div>@enderror
                    </div>
                </div>
                
                <div class="row mt-3">
                    <div class="col-3">
                        <label for="harga">Harga</label>
                    </div>
                    <div class="col-6">
                        <input style="width: 270px" form="edit_listing" type="text" class="form-control @error('harga') is-invalid @enderror" id="harga" placeholder="(contoh harga misal : 1000000000)" name="harga" value="{{ old('harga',$listing->kriteria->harga)  }}">
                        @error('harga')<div class="text-danger mb-3">{{ $message }}</div>@enderror
                    </div>
                </div>
                
                <div class="row mt-3 mb-5">
                    <div class="col-3">
                        <label for="fasilitas">Fasilitas</label>
                    </div>
                    <div class="col-6">
                        @foreach ($facilities as $facility)
                            @php($isSelected=false)
                            @foreach ($facilitieslistings as $facilitylisting)
                                @if ($facilitylisting->fasilitas_id == $facility->fasilitas_id)
                                @php($isSelected=true)
                                @endif
                            @endforeach
                            <input type="checkbox" form="edit_listing" name="fasilitas[]" id="fasilitas"@if ($isSelected==true) checked @endif value="{{$facility->fasilitas_id}}">  {{$facility->nama_fasilitas}} <br>
                        @endforeach
                    </div>
                </div>
            </div>

            
        </form>
        <hr style="height:2px;border-width:0;color:gray;background-color:rgb(42, 218, 174)">

        <h2 class="text-center mt-5 mb-5">Pilih Gambar</h2>

        <div class="row mb-5" style="padding-left:25%">
            <div class="col-4">
                <label for="listing_image">Pilih satu atau lebih dari satu gambar</label>
            </div>
            <div class="col-8">
                <input form="edit_listing" type="file" class="@error('listing_image') is-invalid @enderror" accept=".gif,.jpg,.jpeg,.png,.bmp,.webp" id="listing_image" name="listing_image[]" multiple="true">
                @error('listing_image')<div class="text-danger mb-3">{{ $message }}</div>@enderror
            </div>
        </div>
                    <div class="row" >
                        @foreach ($listing->multigambar as $listing_image)
                        <form method="POST" action="/listing/{{$listing_image->id}}/image" id="imagedelete{{$listing_image->id}}">
                            @csrf
                            <div class="column" style="padding-left:15px">
                            <img src="{{ \Illuminate\Support\Facades\Storage::url($listing_image->nama_file) }}" alt="Listing Image" class="img-fluid img-thumbnail img-product rounded mx-auto d-block" style="max-height:300px;max-width:500px">
                            {{-- <input type="text" hidden value="{{$listing_image->id}} form="" --}}
                            {{-- <button form="imagedelete{{$listing_image->id}}" type="submit" class="btn btn-danger"> Delete</button> --}}
                            <button form="imagedelete{{$listing_image->id}}" type="submit" onclick="return confirm('Anda Ingin menghapus {{$listing_image->id}} ? Gambar akan langsung terhapus')" class="btn btn-danger btn-sm float-right" style="width: 60px">Delete</button>
                            </div>
                        
                        </form>
    
                        @endforeach
                    </div>
    </div>
    </div>
    
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"> </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script type="text/javascript">
    $("#tipe_listing").select2({
        placeholder:'Pilih',
        allowClear:true
    });
    
    $("#tipe_hunian").select2({
        placeholder:'Pilih',
        allowClear:true
    });

    $("#sertifikat").select2({
        placeholder:'Pilih Sertifikat',
        allowClear:true
    });

    $("#dayalistrik").select2({
        placeholder:'Pilih daya',
        allowClear:true
    });

    $("#kabId").select2({
        placeholder:'Pilih Kota',
        allowClear:true
    });

    // When the user clicks on div, open the popup
    function myFunction() {
        var popup = document.getElementById("myPopup");
        popup.classList.toggle("show");
    }
    function myFunction1() {
        var popup1 = document.getElementById("myPopup1");
        popup1.classList.toggle("show");
    }

</script>
@endsection
<script src="{{asset('backendmodern/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('backendmodern/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('backendmodern/js/jqBootstrapValidation.js')}}"></script>
  <script src="{{asset('backendmodern/js/contact_me.js')}}"></script>