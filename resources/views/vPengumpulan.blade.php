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
  <form method="POST" action="{{ route('pengumpulan.data.store', $User->id) }}" enctype="multipart/form-data">
    @csrf
        <div class="form-group">
          <label for="exampleFormControlInput1">Alamat Email</label>
          <input type="email" class="form-control" id="exampleFormControlInput1" name="email" value="{{$User->email}}" readonly/>
          <div class="text-red">
            @error('email')
                {{ $message }}
            @enderror
          </div>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Nama Lengkap</label>
            <input class="form-control" id="exampleFormControlInput1" name="nama" value="{{$User->name}}" >
            <div class="text-red">
              @error('nama')
                  {{ $message }}
              @enderror
            </div>
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Alamat Lengkap</label>
            <input class="form-control" id="exampleFormControlInput1" name="alamat">
            <div class="text-red">
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
                           @foreach($countries as $key => $country)
                              <option value="{{$key}}"> {{$country}}</option>
                           @endforeach
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
            <label for="exampleInputFile">Hasil anda <span class="fw-normal">(Foto harus format jpg atau png)</span></label>
            <div class="input-group">
                <div>
                <input type="file" name="hasil" class="form-control"  @error('hasil') is-invalid @enderror>
                <div class="text-red">
                    @error('hasil')
                        {{ $message }}
                    @enderror
                </div>
                {{-- <label class="custom-file-label" for="exampleInputFile"></label> --}}
                </div>
            </div>
            <p>*Aplikasi yg disarankan : Strava, Relive, Nike+, Endomondo, Suunto</p>
        </div>
    <div class="text-center mb-5 buttonkumpul">
      <button type="submit" class="btn btn-primary ">Submit</button>
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
