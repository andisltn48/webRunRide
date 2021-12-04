@include('layouts/vLink')

</head>
<body>
@if (Route::has('login'))

    @auth
    <div class="jumbroton">
        <h1>Welcome</h1>
        <h3>to HMTI UMG Virtual Run & Ride National 2k21</h3>
        <div class="">
            <a class="" href="{{ url('/pendaftaran') }}">
                <button type="button" class="btn btn-primary homebutton">Home</button>
            </a>
        </div>
    </div>
     @else
    <div class="jumbroton">
        <div class="text-primary welcomeText">
            <h1 class="fw-bolder ">Welcome</h1>
        </div>
        <h3 class="text-dark">to HMTI UMG Virtual Run <span class="text-success">& Ride National 2k21</span></h3>
        <div class="text-center">
            <a href="{{ route('login') }}">
                <button type="button" class="btn btn-primary loginbutton">Login</button>
            </a>
        </div>

        @if (Route::has('register'))
            <div class="text-center  mt-4">
                <a href="{{ route('register') }}">
                    <button type="button" class="btn btn-primary">Daftar Sekarang!</button>
                </a>
            </div>
        @endif
    </div>
    @endauth
</div>
@endif
</body>
</html>
