@extends('layouts.vNav')

@section('content')
<div class="container">
    <label class="fw-bolder">Alamat Email</label>
    <p class="fs-6">{{$detailuser->email}}</p>
 </div>
<div class="container">
    <label class="fw-bolder">Nama Lengkap</label>
    <p class="fs-6">{{$detailuser->nama}}</p>
    </div>
</div>
<div class="container">
    <label class="fw-bolder">Alamat Lengkap</label>
    <p class="fs-6">{{$detailuser->alamat}}</p>
    <div class="row">
        <div class="col">
        <div>
            <label class="fw-bolder">Kode Pos</label>
            <p class="fs-6">{{$detailuser->kodepos}}</p>
        </div>
        <div>
            <label class="fw-bolder">Negara</label>
            <p class="fs-6">{{$detailuser->negara}}</p>
        </div>
        </div>
        <div class="col">
        <div>
            <label class="fw-bolder">Provinsi</label>
            <p class="fs-6">{{$detailuser->provinsi}}</p>
        </div>
        <div>
            <label class="fw-bolder">Kota/Kabupaten</label>
            <p class="fs-6">{{$detailuser->kota}}</p>
        </div>
        </div>
    </div>
</div>
<div class="container">
<label class="fw-bolder">Nomer Handphone</label>
<p class="fs-6">{{$detailuser->nohp}}</p>
</div>
<div class="container">
<label class="fw-bolder">Tanggal Lahir</label>
<p class="fs-6">{{$detailuser->tgllahir}}</p>
</div>
<div class="container">
<label class="fw-bolder">Kategori</label>
<p class="fs-6">{{$detailuser->kategori}}</p>
</div>
<div class="container">
<label class="fw-bolder">Klasifikasi Lomba</label>
<p class="fs-6">{{$detailuser->klasifikasi}}</p>
</div>
<div class="container">
<label class="fw-bolder">Ukuran Jersey</label>
<p class="fs-6">{{$detailuser->ukuran}}</p>
</div>
<div class="container">
<label class="fw-bolder">Pembayaran</label>
<p class="fs-6">{{$detailuser->pembayaran}}</p>
</div>
<div class="container">
<label class="fw-bolder">Jumlah Bayar</label>
<p class="fs-6">{{$detailuser->totalpembayaran}}</p>
</div>
</div>

@endsection
