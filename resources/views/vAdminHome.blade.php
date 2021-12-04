@extends('layouts/vNav')

@section('content')
<div class="container-fluid">
    @if (session('pesan'))
    <div class="alert alert-success alert-dismissble">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fas fa-times"></i></button>
    <h4><i class="icon fa fa-check"></i>Success!</h4>
    {{ session('pesan') }}.
    </div>
    @endif

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Pendaftar</h1>

        <form class='navbar-form' action="/searchpendaftar" method="GET">
            <div class='input-group'>
              <input class='form-control' type='text' name='search' placeholder='Seacrh' />

                <button type='submit' class='btn btn-primary'>
                    <i class="fas fa-search"></i>
                </button>


            </div>
        </form>
    </div>
    <a href="/pendaftar/excel" class="btn btn-success my-3" target="_blank">EXPORT EXCEL</a>
    <!-- Content Row -->
    <div class="row">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                Daftar Pendaftar
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Nama</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Waktu Daftar</th>
                                <th class="text-center">Bukti Pembayaran</th>
                                <th class="text-center">Simpan Bukti Pembayaran</th>
                                <th class="text-center">Detail Data</th>
                                <th class="text-center">Verifikasi</th>
                            </tr>
                        </thead>
                        @foreach ($allUser as $key => $data)
                            <tbody>
                                <tr>
                                    <td>{{$allUser->firstItem()+$key}}</td>
                                    <td>{{$data->nama}}</td>
                                    <td>{{$data->email}}</td>
                                    <td>{{$data->created_at}}</td>
                                    <td class="text-center"><img class="myImg" src="{{'images/buktiPembayaran/'.$data->buktipembayaran}}" style="width:100%;max-width:50px"></td>
                                    <td class="text-center">
                                        <a href="/detailpendaftar/{{$data->id}}">
                                            <button id="" class="btn btn-success"  type="submit">Simpan</button>
                                        </a>

                                    </td>
                                    <td class="text-center">
                                        <a href="/pembayaran/image/{{$data->id}}">
                                            <button id="" class="btn btn-warning"  type="submit">Detail</button>
                                        </a>

                                    </td>
                                    <td class="text-center">
                                        <form action="{{ route('verifikasi.pendaftaran.store', $data->id) }}" method="POST">
                                            @csrf
                                            <button class="btn btn-primary"  type="submit">Konfirmasi</button>
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                        @endforeach
                    </table>
                    <div class="pull-left">
                        showing
                        {{ $allUser->firstItem()}}
                        to
                        {{ $allUser->lastItem()}}
                    </div>
                    <div class="pull-right">
                        {{ $allUser->links("pagination::bootstrap-4") }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal modalVerifikasi fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div id="result">
          </div>
        {{-- @foreach ($allUser as $data)
          <div class="form-group">
            <label for="exampleFormControlInput1">Alamat Email</label>
            <p class="fs-5">{{$data->email}}</p>
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Nama Lengkap</label>
            <p class="fs-5">{{$data->nama}}</p>
            </div>
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Alamat Lengkap</label>
            <p class="fs-5">{{$data->alamat}}</p>
            <div class="row">
                <div class="col">
                  <div>
                      <label for="exampleFormControlInput1">Kode Pos</label>
                      <p class="fs-5">{{$data->kodepos}}</p>
                  </div>
                  <div>
                      <label for="exampleFormControlInput1">Negara</label>
                      <p class="fs-5">{{$data->negara}}</p>
                  </div>
                </div>
                <div class="col">
                  <div>
                      <label for="title">Provinsi</label>
                      <p class="fs-5">{{$data->provinsi}}</p>
                  </div>
                  <div>
                      <label for="exampleFormControlInput1">Kota/Kabupaten</label>
                      <p class="fs-5">{{$data->kota}}</p>
                  </div>
                </div>
            </div>
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Nomer Handphone</label>
            <p class="fs-5">{{$data->nohp}}</p>
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Tanggal Lahir</label>
            <p class="fs-5">{{$data->tgllahir}}</p>
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect1">Kategori</label>
            <p class="fs-5">{{$data->kategori}}</p>
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect1">Klasifikasi Lomba</label>
            <p class="fs-5">{{$data->klasifikasi}}</p>
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect1">Ukuran Jersey</label>
            <p class="fs-5">{{$data->ukuran}}</p>
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect1">Pembayaran</label>
            <p class="fs-5">{{$data->pembayaran}}</p>
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Jumlah Bayar</label>
            <p class="fs-5">{{$data->totalpembayaran}}</p>
          </div>
        @endforeach --}}
      </div>
    </div>
</div>

<div class="modal modalImage fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <img id="popup-img" src="" alt="">
    </div>
  </div>
</div>
<script>
$('.myImg').click(function(){
    var src = $(this).attr('src');
    $('.modalImage').modal('show');
    $('#popup-img').attr('src',src);
});
</script>
{{-- <script>
    $('.btnverify1').click(function(){
        // var src = $(this).attr('src');

        // $('#popup-img').attr('src',src);
    });
    </script> --}}
<script type=text/javascript>

        $("#btnverify1").click(load,function () {

            var iduser = $(this).val();
            $.ajax({
                type:"GET",
                url:"{{url('verify')}}",
                data:{id:iduser},
                dataType: 'html',
                success:function(data) {
                    // result
                    // window.alert(data);
                    $('#result').append(data);
                    $('.modalVerifikasi').modal('show');



                    // $.each(data,function(key,value){
                    //     $("#state").append('<option value="'+value.id+'">'+value.name+'</option>');
                    // });

                }
            })
        })
</script>
@endsection
