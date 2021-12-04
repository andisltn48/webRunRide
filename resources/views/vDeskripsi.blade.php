@extends('layouts.vNavcopy')

@section('content')
<div class="title">
    <h1 class="fw-bolder fs-1 text-center">Virtual Run & Ride</h1>
</div>
<div class="row container">
    <div class="col-md-3">
        <div class="fw-bolder">Registrasi</div>
    </div>
    <div class="col">
        <div>Rp 185.000</div>
    </div>
</div>
<div class="row container mt-4">
    <div class="col-md-3">
        <div class="fw-bolder">Race Pack</div>
    </div>
    <div class="col">
        <div class="">
            <ul>
              <li>Jersy</li>
              <li>Medali</li>
              <li>E-Sertifikat</li>
            </ul>
            <div>Race pack akan dikirimkan selambatnya 1 (satu) bulan setelah acara berakhir</div>
        </div>
    </div>
</div>
<div class="row container mt-4">
    <div class="col-md-3">
        <div class="fw-bolder">Periode Regestrasi</div>
    </div>
    <div class="col">
        <div>06 Mei 2021 – 22 Mei 2021</div>
    </div>
</div>
<div class="row container mt-4">
    <div class="col-md-3">
        <div class="fw-bolder">Periode Aktivitas</div>
    </div>
    <div class="col">
        <div>24 Mei 2021 – 07 Juni 2021</div>
    </div>
</div>
<div class="row container mt-4">
    <div class="col-md-3">
        <div class="fw-bolder">Kategori</div>
    </div>
    <div class="col">
        <div>
            <ul>
                <li>7k Run (Pelajar / Umum)</li>
                <li>30k Ride (Pelajar / Umum)</li>
            </ul>
        </div>
    </div>
</div>
<div class="row container mt-4">
    <div class="col-md-3">
        <div class="fw-bolder">Jenis</div>
    </div>
    <div class="col">
        <div>One Submission. Menyelesaikan kategori jarak yg dipilih dalam 1 (satu) sesi</div>
    </div>
</div>
<div class="row container mt-4">
    <div class="col-md-3">
        <div class="fw-bolder">Hadiah Finisher</div>
    </div>
    <div class="col">
        <div>
            <ul>
                <li>Vocher DPP Kuliah di Univ Muhammadiyah Gresik di Prodi Teknik Industri</li>
                <li>Hadiah uang tunai Bagi 4 Finsiher teratas baik Run maupun Ride</li>
                <li>Mendali emas untuk 20 finisher teratas</li>
            </ul>
        </div>
    </div>
</div>
<div class="row container mt-4">
    <h3 class="fw-bolder">Tentang HMTI UMG Virtual Run & Ride National 2K21</h1>
    <div class="text-justify">Untuk Memacu  semangat berolahraga  dari  semua  kalangan  masyarakat  agar  tetap  bisa  menjaga  kesehatan  dan kebugaran  badan  di  tengah  wabah  ini,  maka  dari  sini  kita  mengadakan  acara  HMTI  UMG VIRTUAL  RUN  &  RIDE  NATIONAL  2K21.  Guna  untuk  terus  meningkatakan  semangat berolahraga dan dimana saja bisa dilakukan tanpa harus ke tempat ramai.</div>
</div>
<div class="row container mt-4">
    <h3 class="fw-bolder">Race Pack</h1>
    <div class="text-justify">Seluruh peserta acara HMTI UMG VIRTUAL RUN & RIDE NATIONAL 2K21 akan mendapatkan jersey, medali dan E-Sertifikat. Dan ada hadiah untuk 4 pelari atau pesepeda teratasa, baik kategori pelajar maupun umum. Serta untuk 20 finisher pertama akan mendapatkan medali emas.</div>
    <div class="mt-2">
        <img src="{{asset('images/racepack.PNG')}}" alt="" style="max-width: 20vh">
    </div>
</div>
<div class="row container mt-4">
    <h3 class="fw-bolder">Instagram Contest</h1>
    <div class="text-justify">Kamu bisa memenangkan Vocher Dana senilai Rp. 100.000,- untuk 5 orang yang beruntung dan hadiah menarik lainnya. <br> <br> Ikuti langkah-langkah berikut ini untuk mengikuti konsepnya:</div>
    <div>
        <ol>
            <li>Follow @hmti_umg dan @hmti.vrar2k21 </li>
            <li>Unggah foto terbaikmu saat berlari atau bersepeda menggunakan twiboon yang telah di sediakan</li>
            <li>Tag @hmti_umg dan @hmti.vrar2k21 di fotonya</li>
            <li>Tulis caption kreatif untuk menginspirasi teman-temanmu berolahraga dan tag sebanyak mungkin temanmu</li>
            <li>Gunakan hastag #keepinginshapeduringapandemic #hmtiumg #hmtivrar2k21 pada unggahanmu</li>
            <li>Pastikan akun istagram kamu tidak dalam keadaan terkunci</li>
            <li>Periode event & photo contest : 06 Mei – 7 Juni 2021</li>
            <li>Pemenang akan di umumkan di story @hmti.vrar2k21 pada 20 Juni 2021 Keputusan juri bersifat final dan tidak bisa diganggu gugat</li>
        </ol>
    </div>
    <div>
        <p>Gambar Twibbon</p>
        <img src="{{asset('images/twibbon2.jpeg')}}" alt="" style="max-width: 20vh">
        <img src="{{asset('images/twibbon1.jpeg')}}" alt="" style="max-width: 20vh">
        <div class="mt-2"><a target="_blank" href="https://drive.google.com/file/d/1r8yz8hV82yof79iAm50zrLK9NbVyNi1Z/view?usp=sharing"><button class="btn btn-primary btn-rounded">Download Twibbon</button></a></div>
    </div>
</div>
@endsection

