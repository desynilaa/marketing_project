<!DOCTYPE html>
<html lang="en">

<head>

@include('layouts.head')

    <!-- Custom styles for this page -->
    <link href="{{ asset('frontend/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
@include('layouts.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
@include('layouts.navbar')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Memasukan Data Kunjungan</h1>
                    @if(Session::get('success'))
					    <div class="alert alert-success">
					        {{ Session::get('success')}}
					    </div>
					@endif

					@if(Session::get('fail'))
					    <div class="alert alert-danger">
					        {{ Session::get('fail')}}
					    </div>
					@endif

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Form Input Data Baru</h6>
                        </div>
                        <div class="card-body">
                            <form action="store" method="post" >
						    @csrf
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control " name="username" placeholder="Masukkan username Anda" value="{{ Auth::user()->email }}" readonly>
                                        <!-- <span style="color: red">@error('username'){{ $message }} @enderror</span> -->
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="datetime-local" class="form-control " name="waktu_kunjungan" placeholder="Masukkan waktu kunjunngan Anda" value="{{old('waktu_kunjungan')}}">
                                        <span style="color: red">@error('waktu_kunjungan'){{ $message }} @enderror</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control "
                                            name="tujuan_kunjungan" placeholder="Masukkan tujuan kunjungan Anda" value="{{old('tujuan_kunjungan')}}">
            							<span style="color: red">@error('tujuan_kunjungan'){{ $message }} @enderror</span>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control "
                                            name="keterangan" placeholder="Masukkan keterangan Anda" value="{{old('keterangan')}}">
            							<span style="color: red">@error('keterangan'){{ $message }} @enderror</span>
                                    </div>
                                </div>
                                <div class="class=btn btn-primary btn-user" style="text-align: center" >
        							<button class="btn btn-sm btn-primary" type="submit">Submit</button>
    							</div>
                            </form>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
@include('layouts.footer')
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
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>
<link href="{{ asset('frontend/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('frontend/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('frontend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('frontend/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('frontend/js/sb-admin-2.min.js')}}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('frontend/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('frontend/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('frontend/js/demo/datatables-demo.js')}}"></script>

</body>

</html>