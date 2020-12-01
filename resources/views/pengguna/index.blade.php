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

@include('layouts.navbar')

                <div class="container-fluid">
                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('status') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Kunjungan</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                        	<th>No.</th>
                                            <th>NIK</th>
                                            <th>Nama</th>
                                            <th>No Telepon</th>
                                            <th>Lokasi Kerja</th>
                                            <th>FM</th>
                                            <th>Role</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        	<th>No.</th>
                                            <th>NIK</th>
                                            <th>Nama</th>
                                            <th>No Telepon</th>
                                            <th>Lokasi Kerja</th>
                                            <th>FM</th>
                                            <th>Role</th>
                                            <th>Aksi</th>                   
                                        </tr>
                                    </tfoot>
									<tbody>
									    <?php $i = 1; ?>
									        @foreach($users as $user)
									        <tr>
 									            <td class="text-center">{{$loop->iteration}}</td>
									            <td>{{$user->NIK}}</td>
									            <td>{{$user->nama}}</td>
									            <td>{{$user->no_telf}}</td>
									            <td>{{$user->loker}}</td>
									            <td>{{$user->FM}}</td>
									            <td>{{$user->role}}</td>
                                                <td><a href="/pengguna/reset/{{$user->NIK}}" class="btn btn-warning" onclick="return confirm('Yakin ganti password?');">Reset Password</a> | <a href="/pengguna/delete/{{$user->NIK}}" class="btn btn-xs btn-danger" onclick="return confirm('Apakah Anda yakin?');">Delete</a> 
                                                </td>
									        </tr>
									        @endforeach
									</tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
@include('layouts.footer')
        </div>
    </div>

@include('layouts.js')

</body>

</html>