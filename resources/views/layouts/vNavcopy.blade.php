@include('layouts/vLink')

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

      <!-- Sidebar -->
      <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

          <!-- Sidebar - Brand -->
          <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboard">
              <p class="h3 sidebar-brand-text mx-3">RUNRIDE</p>
          </a>

          <!-- Divider -->
          <hr class="sidebar-divider my-0">

          <!-- Nav Item - Dashboard -->
          <li class="nav-item active">
            <a class="nav-link" href="/dashboard">
                <i class="fas fa-home"></i>
                <span>Dashboard</span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="/deskripsi">
                <i class="fas fa-file-alt"></i>
                <span>Deskripsi</span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="/pendaftaran">
                <i class="fas fa-plus"></i>
                <span>Pendaftaran</span></a>
          </li>
          <li class="nav-item active">
                <a class="nav-link" href="/pengumpulan")>
                  <i class="fas fa-share-square"></i>
                  <span>Pengumpulan</span>
                </a>

          </li>
          <!-- Nav Item - Pages Collapse Menu -->

          {{-- @if ($User->role == 'admin')
            <li class="nav-item active">
            <a class="nav-link" href="/pendaftaran">
                <i class="fas fa-list-ul"></i>
                <span>Daftar Pendaftar</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="/daftaruser">
                    <i class="fas fa-list-ul"></i>
                    <span>Daftar Pengguna</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="/daftarhasil">
                    <i class="fas fa-list-ul"></i>
                    <span>Daftar Hasil</span></a>
            </li>
          @endif --}}
          <!-- Divider -->
          <hr class="sidebar-divider d-none d-md-block">
          <li class="nav-item active">
            <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2"></i>
                <span>Logout</span></a>
          </li>

          <!-- Sidebar Toggler (Sidebar) -->
          <div class="text-center d-none d-md-inline mt-5">
              <button class="rounded-circle border-0" id="sidebarToggle"></button>
          </div>
      </ul>
      <!-- End of Sidebar -->

      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">

          <!-- Main Content -->
          <div id="content">

              <!-- Topbar -->
              <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                  <!-- Sidebar Toggle (Topbar) -->
                  <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                      <i class="fa fa-bars"></i>
                  </button>

                  <!-- Topbar Greeting -->
                  <div class="h3 text-gray-900"><span>Halo, </span> <span class="text-success" id="nama">User</span></div>
                  @if (Route::has('login'))
                  @auth
                  <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - User Information -->
                        {{-- <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small" id="nama">{{$User->name}}</span>
                                <img class="img-profile rounded-circle" src="{{'images/fotoProfile/'.$User->foto}}">
                            </a>
                            <!-- Dropdown - User Information -->

                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="/profile">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i> Profile
                                    </a>
                                    <div class="dropdown-divider"></div>

                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                      <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Logout
                                    </a>
                                </div>

                        </li> --}}
                    </ul>
                  @endauth
                  @endif
              </nav>
              <!-- End of Topbar -->
              @yield('content')
          </div>
          <!-- End of Main Content -->

          <!-- Footer -->
          <footer class="sticky-footer bg-white">
              <div class="container my-auto">
                  <div class="copyright text-center my-auto">
                      <span>Copyright &copy; </span>
                  </div>
              </div>
          </footer>
          <!-- End of Footer -->

      </div>
      <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
              </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
              {{-- <a class="btn btn-success" href="login.html">Logout</a> --}}
              <form method="POST" action="/logout">
                @csrf
                <button type="submit" class="btn btn-success">Logout</button>
              </form>
          </div>
      </div>
  </div>
</div>
<script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Custom scripts for all pages-->
<script src="{{asset('js/')}}/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="{{asset('vendor/chart.js/Chart.min.js')}}"></script>

<!-- Page level custom scripts -->
<script src="{{asset('js/demo/chart-area-demo.js')}}"></script>
<script src="{{asset('js/demo/chart-pie-demo.js')}}"></script>
