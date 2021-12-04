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
        <h1 class="h3 mb-0 text-gray-800">Hasil</h1>
        <form class='navbar-form' action="/searchhasil" method="GET">
            <div class='input-group'>
              <input class='form-control' type='text' name='search' placeholder='Seacrh' />

                <button type='submit' class='btn btn-primary'>
                    <i class="fas fa-search"></i>
                </button>


            </div>
        </form>
    </div>
    <a href="/hasil/excel" class="btn btn-success my-3" target="_blank">EXPORT EXCEL</a>
    <!-- Content Row -->
    <div class="row">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                Daftar Hasil
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Nama</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Alamat</th>
                                <th class="text-center">Kode Pos</th>
                                <th class="text-center">Negara</th>
                                <th class="text-center">Provinsi</th>
                                <th class="text-center">Kota</th>
                                <th class="text-center">Kategori</th>
                                <th class="text-center">Klasifikasi</th>
                                <th class="text-center">Waktu Daftar</th>
                                <th class="text-center">Hasil</th>
                                <th class="text-center">Simpan Hasil</th>
                                <th class="text-center">Hapus Data</th>
                            </tr>
                        </thead>
                        @foreach ($allUser as $key => $data)
                            @foreach ($userdata as $item)
                                @if ($data->email == $item->email)
                                    <tbody>
                                        <tr>
                                            <td>{{$allUser->firstItem()+$key}}</td>
                                            <td>{{$data->nama}}</td>
                                            <td>{{$data->email}}</td>
                                            <td>{{$item->alamat}}</td>
                                            <td>{{$item->kodepos}}</td>
                                            <td>{{$item->negara}}</td>
                                            <td>{{$item->provinsi}}</td>
                                            <td>{{$item->kota}}</td>
                                            <td>{{$item->kategori}}</td>
                                            <td>{{$item->klasifikasi}}</td>
                                            <td>{{$item->created_at}}</td>
                                            <td class="text-center"><img class="myImg" src="{{'images/hasilLari/'.$data->hasil}}" style="width:100%;max-width:50px"></td>
                                            <td class="text-center">
                                                <a href="/hasil/image/{{$data->id}}">
                                                    <button id="" class="btn btn-success"  type="submit">Simpan</button>
                                                </a>

                                            </td>
                                            <td class="text-center">
                                                <a href="/delete/{{$data->id}}" class="btn btn-danger"  type="submit" >Hapus</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                @endif
                            @endforeach
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
    $(document).ready(function() {
        $("#btnverify1").click(function () {
            var iduser = $(this).val();
            $.ajax({
                type:"GET",
                url:"{{url('verified')}}",
                data:{id:iduser},
                dataType: 'html',
                success:function(data) {
                    // result
                    // window.alert(data);
                    $('#result').append(data);
                    $('.modalVerifikasi').modal('show');


                }
            })
        })
    })
</script>
@endsection
