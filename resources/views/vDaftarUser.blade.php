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
        <h1 class="h3 mb-0 text-gray-800">Pengguna</h1>
        <form class='navbar-form' action="/searchpenggunar" method="GET">
            <div class='input-group'>
              <input class='form-control' type='text' name='search' placeholder='Seacrh' />

                <button type='submit' class='btn btn-primary'>
                    <i class="fas fa-search"></i>
                </button>


            </div>
        </form>
    </div>
    <a href="/pengguna/excel" class="btn btn-success my-3" target="_blank">EXPORT EXCEL</a>
    <!-- Content Row -->
    <div class="row">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                Daftar Pengguna
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
                                <th class="text-center">Detail Data</th>
                                <th class="text-center">Hapus Data</th>
                            </tr>
                        </thead>
                        @foreach ($allUser as $key => $data)
                            <tbody>
                                <tr>
                                    <td>{{$allUser->firstItem()+$key}}</td>
                                    <td>{{$data->nama}}</td>
                                    <td>{{$data->email}}</td>
                                    <td>{{$data->created_at}}</td>
                                    <td class="text-center">
                                        <a href="/detailpengguna/{{$data->id}}">
                                            <button id="" class="btn btn-warning"  type="submit">Detail</button>
                                        </a>

                                    </td>
                                    <td class="text-center">
                                        <a href="/delete/{{$data->id}}" class="btn btn-danger"  type="submit" >Hapus</a>
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
