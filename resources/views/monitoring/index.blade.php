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
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h4 class="m-0 font-weight-bold text-primary">Data Kunjungan</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Username</th>
                                            <th>Kategori Tenant</th>
                                            <th>Agenda Visit</th>
                                            <th>Perusahaan Tenant</th>
                                            <th>Minat Produk</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No.</th>
                                            <th>Username</th>
                                            <th>Kategori Tenant</th>
                                            <th>Agenda Visit</th>
                                            <th>Perusahaan Tenant</th>
                                            <th>Minat Produk</th>
                                            <th>Aksi</th>                   
                                        </tr>
                                    </tfoot>
									<tbody>
									    <?php $i = 1; ?>
									        @foreach($monitorings as $monitoring)
									        <tr>
 									            <td class="text-center">{{$loop->iteration}}</td>
									            <td>{{$monitoring->username}}</td>
									            <td>{{$monitoring->kategori_tenant}}</td>
									            <td>{{$monitoring->agenda_visit}}</td>
									            <td>{{$monitoring->perusahaan_tenant}}</td>
                                                <td>{{$monitoring->detail_minat_produk}}</td>
                                                <td><a href="/detail/{{$monitoring->id}}" class="btn btn-info">Detail</a></td>
                                                <!-- <td><button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModalLong">Detail</button></td> -->

									        </tr>
									        @endforeach
									</tbody>
                                </table>
<!-- Modal -->
<!-- <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div> -->
                            </div>
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