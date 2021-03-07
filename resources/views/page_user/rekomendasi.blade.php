@extends('layout/main')

@section('title', 'Rekomendasi')
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

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

@section('container')
<div class="container" style="padding-top: 50px;padding-bottom: 100px">
    <div class="w3-card-4" style="max-width:700px;margin:auto">
        
        <div class="w3-container w3-teal mb-3">
        
            <h1 class="text-center">Rekomendasi</h1>
            
            {{-- <a href="/user_management" class="btn btn-secondary float-right"> Back</a> --}}
        </div>
    
    @auth
    
    @if(Auth::user()->user_tipe == 'Agen')
    <form hidden id="Rekomendasi" enctype="multipart/form-data" method="POST" action="/agen-recommendation/result">
        {{-- @method('patch') --}}
        @csrf
    </form>
    @endif

    @if(Auth::user()->user_tipe == 'User')
    <form hidden id="Rekomendasi" enctype="multipart/form-data" method="POST" action="/user-recommendation/result">
        {{-- @method('patch') --}}
        @csrf
    </form>
    @endif
    @endauth
    <div class="w3-container">
            <div class="form-group">
                <div class="row">
                    <div class="col-4">
                        <label for="tipe_listing">Tipe listing</label>
                    </div>
                    <div class="col-5">
                        <select style="width: 300px" form="Rekomendasi" id="tipe_listing" class="form-control @error('tipe_listing') is-invalid @enderror" name="tipe_listing">
                            
                            <option value="Dijual" @if (old('tipe_listing') == 'Dijual') selected @endif>Dijual</option>
                            <option value="Disewa" @if (old('tipe_listing') == 'Disewa') selected @endif>Disewa</option>
                        </select>
                        @error('tipe_listing')<div class="text-danger mb-3">{{ $message }}</div>@enderror
                    </div>
                </div>
             </div>

             <div class="form-group">
                <div class="row mb-5">
                    <div class="col-4">
                        <label for="tipe_hunian">Tipe hunian</label>
                    </div>
                    <div class="col-5">
                        <select style="width: 300px" form="Rekomendasi" id="tipe_hunian" class="form-control @error('tipe_hunian') is-invalid @enderror" name="tipe_hunian">
                            
                            <option value="Rumah" @if (old('tipe_hunian') == 'Rumah') selected @endif>Rumah</option>
                            <option value="Apartemen" @if (old('tipe_hunian') == 'Apartemen') selected @endif>Apartemen</option>
                        </select>
                    </div>
                </div>
             </div>
             @error('tipe_hunian')<div class="text-danger mb-3">{{ $message }}</div>@enderror

             <div class="form-group">
                <div class="row">
                    <div class="col-4">
                        <label for="kabId">Kabupaten / Kota <a style="color: red">*</a> <div class="popup" onclick="myFunction3()"><i class="fa fa-question"></i><span class="popuptext" id="kotapopup">Untuk mencari hunian berdasarkan kota/kabupaten</span></div></label>
                    </div>
                    <div class="col-5">
                        <select required style="width: 300px" form="Rekomendasi" class="form-control @error('kabId') is-invalid @enderror" id="kabId" name="kabId">
                            <option></option>
                            @foreach ($districts as $district)
                                <option value="{{$district->kabId}}" @if ((old('kabId',($district->kabId == '40')) == $district->kabId)) selected @endif>{{$district->kabNama}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
             </div>
             @error('kabId')<div class="text-danger mb-3">{{ $message }}</div>@enderror

             <div class="form-group">
                 <div class="row">
                     <div class="col-12">
                         <div class="row">
                             <div class="col-4">
                                <label for="luas_tanah">Luas Tanah (m2) <div class="popup" onclick="myFunction2()"><i class="fa fa-question"></i><span class="popuptext" id="tanahpopup">Jika ingin memilih Apartemen, luas tanah disamakan dengan luas bangunan</span></div></label>
                             </div>
                             <div class="col-6">
                                <input  form="Rekomendasi" type="number" class="form-control @error('luas_tanah') is-invalid @enderror" id="luas_tanah" placeholder="(contoh isi: 90)" name="luas_tanah" value="{{ old('luas_tanah') }}" min="1" max="10000">
                                @error('luas_tanah')<div class="text-danger mb-3">{{ $message }}</div>@enderror
                             </div>
                         </div>
                         <div class="row">
                             <div class="col-4">
                                <label for="luas_bangunan">Luas Bangunan (m2)</label>
                             </div>
                             <div class="col-6">
                                <input form="Rekomendasi" type="number" class="form-control @error('luas_bangunan') is-invalid @enderror" id="luas_bangunan" placeholder="(contoh isi: 60)" name="luas_bangunan" value="{{ old('luas_bangunan') }}" min="1" max="10000">
                            @error('luas_bangunan')<div class="text-danger mb-3">{{ $message }}</div>@enderror
                             </div>
                         </div>
                         <div class="row">
                             <div class="col-4">
                                <label for="jlh_kmr_tidur">Jumlah Kamar Tidur <div class="popup" onclick="myFunction()"><i class="fa fa-question"></i><span class="popuptext" id="kamarpopup">Untuk kamar studio seperti apartemen, tidak perlu di isi</span></div></label>
                             </div>
                             <div class="col-6">
                                <input form="Rekomendasi" type="number" class="form-control @error('jlh_kmr_tidur') is-invalid @enderror" id="jlh_kmr_tidur" placeholder="(contoh isi:  3)" name="jlh_kmr_tidur" value="{{ old('jlh_kmr_tidur') }}" min="0" max="100">
                                @error('jlh_kmr_tidur')<div class="text-danger mb-3">{{ $message }}</div>@enderror
                             </div>
                         </div>
                         <div class="row">
                             <div class="col-4">
                                <label for="jlh_kmr_mandi">Jumlah Kamar Mandi</label>
                             </div>
                             <div class="col-6">
                                <input form="Rekomendasi" type="number" class="form-control @error('jlh_kmr_mandi') is-invalid @enderror" id="jlh_kmr_mandi" placeholder="(contoh isi: 2)" name="jlh_kmr_mandi" value="{{ old('jlh_kmr_mandi') }}" min="1" max="100">
                                @error('jlh_kmr_mandi')<div class="text-danger mb-3">{{ $message }}</div>@enderror
                             </div>
                         </div>
                         <div class="row">
                             <div class="col-4">
                                <label for="jlh_lantai">Jumlah Lantai <div class="popup" onclick="myFunction1()"><i class="fa fa-question"></i><span class="popuptext" id="lantaipopup">Jika ingin memilih Apartemen, dapat mengetik angka 1</span></div></label>
                             </div>
                             <div class="col-6">
                                <input form="Rekomendasi" type="number" class="form-control @error('jlh_lantai') is-invalid @enderror" id="jlh_lantai" placeholder="(contoh isi: 2)" name="jlh_lantai" value="{{ old('jlh_lantai') }}" min="1" max="10">
                                @error('jlh_lantai')<div class="text-danger mb-3">{{ $message }}</div>@enderror
                             </div>
                         </div>
                         <div class="row">
                             <div class="col-4">
                                <label for="daya_listrik">Daya Listrik</label>
                             </div>
                             <div class="col-6">
                                    <select form="Rekomendasi" style="width: 100%" id="daya_listrik" class="form-control @error('daya_listrik') is-invalid @enderror" name="daya_listrik">
                                        <option></option>
                                        <option value="250" @if (old('daya_listrik') == '250') selected @endif>250</option>
                                        <option value="450" @if (old('daya_listrik') == '450') selected @endif>450</option>
                                        <option value="900" @if (old('daya_listrik') == '900') selected @endif>900</option>
                                        <option value="1300" @if (old('daya_listrik') == '1300') selected @endif>1300</option>
                                        <option value="2200" @if (old('daya_listrik') == '2200') selected @endif>2200</option>
                                        <option value="3500" @if (old('daya_listrik') == '3500') selected @endif>3500</option>
                                        <option value="3900" @if (old('daya_listrik') == '3900') selected @endif>3900</option>
                                        <option value="4400" @if (old('daya_listrik') == '4400') selected @endif>4400</option>
                                        <option value="5500" @if (old('daya_listrik') == '5500') selected @endif>5500</option>
                                        <option value="6600" @if (old('daya_listrik') == '6600') selected @endif>6600</option>
                                        <option value="7700" @if (old('daya_listrik') == '7700') selected @endif>7700</option>
                                        <option value="10600" @if (old('daya_listrik') == '10600') selected @endif>10600</option>
                                        <option value="11000" @if (old('daya_listrik') == '11000') selected @endif>11000</option>
                                        <option value="13200" @if (old('daya_listrik') == '13200') selected @endif>13200</option>
                                        <option value="13900" @if (old('daya_listrik') == '13900') selected @endif>13900</option>
                                        <option value="16500" @if (old('daya_listrik') == '16500') selected @endif>16500</option>
                                        <option value="17000" @if (old('daya_listrik') == '17000') selected @endif>17000</option>
                                        <option value="22000" @if (old('daya_listrik') == '22000') selected @endif>22000</option>
                                        <option value="23000" @if (old('daya_listrik') == '23000') selected @endif>23000</option>
                                        <option value="33000" @if (old('daya_listrik') == '33000') selected @endif>33000</option>
                                        <option value="41500" @if (old('daya_listrik') == '41500') selected @endif>41500</option>
                                        <option value="53000" @if (old('daya_listrik') == '53000') selected @endif>53000</option>
                                        <option value="66000" @if (old('daya_listrik') == '66000') selected @endif>66000</option>
                                    </select>
                                    @error('daya_listrik')<div class="text-danger mb-3">{{ $message }}</div>@enderror
                                
                             </div>
                         </div>

                         <div class="row">
                             <div class="col-4">
                                <label for="harga">Harga <a style="color: red">*</a></label>
                             </div>
                            <div class="col-3">
                                <input min="1" form="Rekomendasi" type="number" class="form-control @error('minPrice') is-invalid @enderror" id="minPrice" placeholder="Minimum" name="minPrice" value="{{ old('minPrice','1') }}">
                                {{-- <select style="" form="Rekomendasi" id="harga" class="form-control @error('harga') is-invalid @enderror" name="harga">
                                    
                                    <option value="250000000" @if (old('harga') == '250000000') selected @endif>0 - 500 Juta</option>
                                    <option value="750000000" @if (old('harga') == '750000000') selected @endif>500 Juta - 1 Milyar</option>
                                    <option value="1500000000" @if (old('harga') == '1500000000') selected @endif>1 Milyar- 2 Milyar</option>
                                    <option value="2500000000" @if (old('harga') == '2500000000') selected @endif>2 Milyar - 3 Milyar</option>
                                    <option value="5000000000" @if (old('harga') == '5000000000') selected @endif>Lebih dari 3 Milyar</option>
                                </select> --}}
                                @error('minPrice')<div class="text-danger mb-3">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-3">
                                <input min="1" form="Rekomendasi" type="number" class="form-control @error('maxPrice') is-invalid @enderror" id="maxPrice" placeholder="Maksimum" name="maxPrice" value="{{ old('maxPrice','3000000000') }}">
                                @error('maxPrice')<div class="text-danger mb-3">{{ $message }}</div>@enderror
                            </div>
                         </div>


                     </div>

                     
                 </div>
             </div>
             <div style="font-size: 12px">Yang wajib di isi adalah Kabupaten/Kota dan Harga</div>
             <button form="Rekomendasi" type="submit" class="btn btn-warning float-right mb-3"> Proses</button>
             @if(Auth::user()->user_tipe == 'Agen')
                <a href="/agen-recommendation" class="btn btn-secondary float-right mr-3 mb-3" type="submit">Reset</a>
             @endif
             @if(Auth::user()->user_tipe == 'User')
                <a href="/user-recommendation" class="btn btn-secondary float-right mr-3 mb-3" type="submit">Reset</a>
             @endif
             
            
            </div>
    </div>
</div>


<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"> </script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script type="text/javascript">
    
    $("#daya_listrik").select2({
        placeholder:'Pilih Daya',
        allowClear:true
    });

    $("#kabId").select2({
        placeholder:'Pilih',
        allowClear:true
    });

</script>

{{-- <div class="modal fade" id="cektidur" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header w3-teal">
            <h5 class="modal-title" id="exampleModalLabel">Info untuk kamar tidur</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="">Jika pilih 'apartemen' dan ingin kamar 'studio', cukup ketik angka 0 saja</label>
            </div> 
        </div>
        <div class="modal-footer">
        <a class="btn btn-secondary" data-dismiss="modal">Close</a>
        </div>
    </div>
    </div>
</div>

<div class="modal fade" id="ceklantai" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header w3-teal">
            <h5 class="modal-title" id="exampleModalLabel">Info untuk Jumlah lantai</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="">Jika pilih apartemen, cukup ketik angka 1 saja</label>
            </div> 
        </div>
        <div class="modal-footer">
        <a class="btn btn-secondary" data-dismiss="modal">Close</a>
        </div>
    </div>
    </div>
</div> --}}
<script>
    function myFunction() {
        var popup = document.getElementById("kamarpopup");
        popup.classList.toggle("show");
        
    }

    function myFunction1() {
        var popup = document.getElementById("lantaipopup");
        popup.classList.toggle("show");
        
    }

    function myFunction2() {
        var popup = document.getElementById("tanahpopup");
        popup.classList.toggle("show");
        
    }

    function myFunction3() {
        var popup = document.getElementById("kotapopup");
        popup.classList.toggle("show");
        
    }
</script>
@endsection

<script src="{{asset('backendmodern/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('backendmodern/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>