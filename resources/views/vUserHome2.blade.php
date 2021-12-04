@extends('layouts/vNavCopy')
@section('content')
<div class="container-fluid">
    @if (session('pesan'))
    <div class="alert alert-success alert-dismissble">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fas fa-times"></i></button>
    <h4><i class="icon fa fa-check"></i>Success!</h4>
    {{ session('pesan') }}.
    </div>
    @endif
  <form method="POST" action="{{ route('pendaftaran.store') }}" enctype="multipart/form-data">
    @csrf
        <div class="form-group">
          <label for="exampleFormControlInput1">Alamat Email</label>
          <input type="email" class="form-control" id="exampleFormControlInput1" name="email" readonly/>
          <div class="text-red">
            @error('email')
                {{ $message }}
            @enderror
          </div>
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Nama Lengkap</label>
          <input class="form-control" id="exampleFormControlInput1" name="nama" >
          <div class="text-red">
            @error('nama')
                {{ $message }}
            @enderror
          </div>
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Alamat Lengkap</label>
          <input class="form-control" id="exampleFormControlInput1" name="alamat">
          <div class="text-danger">
            @error('alamat')
                {{ $message }}
            @enderror
          </div>
          <div class="row">
              <div class="col">
                <div>
                    <label for="exampleFormControlInput1">Kode Pos</label>
                    <input class="form-control" id="exampleFormControlInput1" name="kodepos">
                    <div class="text-red">
                        @error('kodepos')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div>
                    <label for="exampleFormControlInput1">Negara</label>
                    <select class="form-control" id="country" name="negara">
                        <option value="Pilih" selected disabled>Pilih</option>
                         
                    </select>
                    <div class="text-red">
                        @error('negara')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
              </div>
              <div class="col">
                <div>
                    <label for="title">Provinsi</label>
                    <select class="form-control" name="provinsi" id="state" >
                        <option value="Pilih" selected disabled></option>
                    </select>
                    <div class="text-red">
                        @error('provinsi')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div>
                    <label for="exampleFormControlInput1">Kota/Kabupaten</label>
                    <input class="form-control" id="exampleFormControlInput1" name="kota">
                    <div class="text-red">
                        @error('kota')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
              </div>
          </div>
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Nomer Handphone</label>
          <input class="form-control" id="exampleFormControlInput1" name="nohp">
          <div class="text-red">
            @error('nohp')
                {{ $message }}
            @enderror
          </div>
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Tanggal Lahir</label>
          <input type="date" class="form-control" id="exampleFormControlInput1" name="tgllahir">
          <div class="text-red">
            @error('tgllahir')
                {{ $message }}
            @enderror
          </div>
        </div>
        <div class="form-group">
          <label for="exampleFormControlSelect1">Kategori</label>
          <select name="kategori" class="form-control" id="type">
            <option selected disabled>Pilih</option>
            <option value="Pelajar">Pelajar</option>
            <option value="Mahasiswa / Umum">Mahasiswa / Umum</option>
          </select>
          <div class="text-red">
            @error('kategori')
                {{ $message }}
            @enderror
          </div>
        </div>
        <div class="form-group">
          <label for="exampleFormControlSelect1">Klasifikasi Lomba</label>
          <select name="klasifikasi" class="form-control" id="type">
            <option selected disabled>Pilih</option>
            <option value="Run">Run</option>
            <option value="Ride">Ride</option>
          </select>
          <div class="text-red">
            @error('klasifikasi')
                {{ $message }}
            @enderror
          </div>
        </div>
        <div class="form-group">
          <label for="exampleFormControlSelect1">Ukuran Jersey</label>
          <img src="{{ url('images/ukuranbaju.jpg') }}" class="img-fluid rounded mx-auto d-block pb-3" alt="...">
          <select name="ukuran" class="form-control" id="type">
            <option selected disabled>Pilih</option>
            <option value="S">S</option>
            <option value="M">M</option>
            <option value="L">L</option>
            <option value="XL">XL</option>
          </select>
          <div class="text-red">
            @error('ukuran')
                {{ $message }}
            @enderror
          </div>
        </div>
        <div class="form-group">
          <label for="exampleFormControlSelect1">Pembayaran</label>
          <select name="pembayaran" class="form-control" id="type">
            <option selected disabled>Pilih</option>
            <option value="BCA">BCA a/n Muhammad Ahsanul Ramadhon (7901268421)</option>
            <option value="BNI">BNI a/n OQNI HUDA NURQODZBARI (1143965594)</option>
            <option value="OVO">OVO (082188330961)</option>
            <option value="Dana">Dana (082188330961)</option>
          </select>
          <div class="text-red">
            @error('pembayaran')
                {{ $message }}
            @enderror
          </div>
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Jumlah Bayar</label>
          <input class="form-control" id="exampleFormControlInput1" name="jumlahbayar" value="Rp 185.000" readonly/>
          <div class="text-red">
            @error('jumlahbayar')
                {{ $message }}
            @enderror
          </div>
        </div>
        <div class="form-group">
            <label for="exampleInputFile">Bukti Pembayaran <span class="fw-normal">(Foto harus format jpg atau png)</span></label>
            <div class="input-group">
                <div>
                <input type="file" name="foto_pembayaran" class="form-control"  @error('foto_pembayaran') is-invalid @enderror>
                <div class="text-red">
                    @error('foto_pembayaran')
                        {{ $message }}
                    @enderror
                </div>
                {{-- <label class="custom-file-label" for="exampleInputFile"></label> --}}
                </div>
            </div>
            <div class="row">
                <div class="col-1 align-middle" style="max-width: 2vw">
                    <p class="fw-bolder align-middle">CP</p>
                </div>
                <div class="col float-left">
                    <p>Rama: 082188330961</p>
                    <p>Alda: 089514669721</p>
                </div>
            </div>
        </div>
    <div class="text-center pb-5">
      <button type="submit" class="btn btn-primary ">Daftar</button>
    </div>
  </form>
</div>
<script type=text/javascript>
    $(document).ready(function() {
        $("#country").on('change', function () {
            var countryId = $(this).val();
            $.ajax({
                type:"GET",
                url:"{{url('getStateList')}}",
                data:{id:countryId},
                success:function(data) {
                    $("#state").empty();
                    $("#state").append('<option value="Pilih" selected disabled>Pilih</option>');

                    $.each(data,function(key,value){
                        $("#state").append('<option value="'+value.id+'">'+value.name+'</option>');
                    });

                }
            })
        })
    })
</script>
@endsection
