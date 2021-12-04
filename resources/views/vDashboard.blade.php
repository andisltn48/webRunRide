@extends('layouts/vNavcopy')


@section('content')
<body>
    <div class="row">
        <div class="col padding-0">
            <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">

                <section class="">
                    <div class="">
                        <section class="home">
                            <div id="carousel" class="carousel slide" data-ride="carousel">
                            <div class="carousel-controls">
                              <ol class="carousel-indicators">
                                <li data-target="#carousel" data-slide-to="0" class="active" ></li>
                                <li data-target="#carousel" data-slide-to="1" ></li>
                                <li data-target="#carousel" data-slide-to="2" ></li>

                              </ol>
                              <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                                <i class="fa-2x fas fa-arrow-left"></i>
                            </a>
                            <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                                <i class="fa-2x fas fa-arrow-right"></i>
                            </a>
                            </div>
                            <div class="carousel-inner">
                                <div class="carousel-item active imagebackground " style="background-image:url('{{asset('images/feed3.png')}}'); background-size: cover;">

                                <div class="container">
                                    <div class="row padding-0">
                                        <div class="col text">
                                            <p class="text-justify ml-3 fs-6 fw-bold text-white"> <span class="fs-4 fw-bolder text-success">   L</span>orem ipsum dolor sit amet consectetur adipisicing elit. Pariatur perspiciatis magni voluptatum est impedit deserunt, temporibus, laboriosam non incidunt illum neque voluptatibus iure eaque quia omnis debitis? Cupiditate, exercitationem nihil.</p>
                                        </div>
                                        <div class="col text">
                                            <p class="text-justify ml-3 fs-6 fw-bold text-white"> <span class="fs-4 fw-bolder text-success">   L</span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique pariatur placeat possimus aliquam sed in voluptatibus architecto sunt autem tempora fugiat voluptatum, labore nulla libero. Non officiis labore repellendus mollitia!.</p>
                                        </div>
                                        <div class="col secText">
                                            <p class="text-justify ml-3 fs-6 fw-bold text-white"> <span class="fs-4 fw-bolder text-success">   <h3 class="text-white">HMTI UMG Virtual Run <span class="text-success">& Ride National 2k21</span></h3></p>
                                        </div>
                                    </div>
                                    <a href="/pendaftaran"><button class="btn btn-primary mt-5">Daftar Sekarang!</button></a>
                                </div>
                              </div>
                              <div class="carousel-item imagebackground1 " style="background-image:url('{{asset('images/feed1blur.jpg')}}'); background-size: cover;">

                                <div class="container">
                                    <div class="mb-5 mainimage">
                                        <img class="img-fluid" src="{{asset('images/feed2.png')}}"  alt="">
                                    </div>
                                </div>
                              </div>
                              <div class="carousel-item imagebackground2" style="background-image:url('{{asset('images/feed2blur.jpg')}}'); background-size: cover;">

                                <div class="container">
                                    <div class="mb-5 mainimage">
                                        <img class="img-fluid" src="{{asset('images/feed1.png')}}"  alt="">
                                    </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </section>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
