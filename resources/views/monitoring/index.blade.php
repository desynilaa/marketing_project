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
                            <h4 class="m-0 font-weight-bold text-primary">Data Kunjungan</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Penginput</th>
                                            <th>Kategori Tenant</th>
                                            <th>Agenda Visit</th>
                                            <th>Perusahaan Tenant</th>
                                            <th>Minat Produk</th>
                                            <th>Tanggal Pembuatan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No.</th>
                                            <th>Penginput</th>
                                            <th>Kategori Tenant</th>
                                            <th>Agenda Visit</th>
                                            <th>Perusahaan Tenant</th>
                                            <th>Minat Produk</th>
                                            <th>Tanggal Pembuatan</th>
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
                                                <td>{{$monitoring->created_at}}</td>
                                                <td><button class="btn btn-info" type="button" href="#" data-toggle="modal" data-target="#view_{{$monitoring->id}}" class="btn btn-default">Detail</button> |
                                                    <a href="/monitoring/delete/{{$monitoring->id}}" class="btn btn-xs btn-danger" onclick="return confirm('Apakah Anda yakin?');">Delete</a> 
                                                    <div class="modal fade" id="view_{{$monitoring->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Detail Informasi</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="panel panel-default">
                                                                        <div class="panel-body">
                                                                            <table class="table">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <th>Penginput</th>
                                                                                        <td>{{$monitoring->username}}</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th>Kategori Tenant</th>
                                                                                        <td>{{$monitoring->kategori_tenant}}</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th>Agenda Visit</th>
                                                                                        <td>{{$monitoring->agenda_visit}}</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th>Nama Tenant</th>
                                                                                        <td>{{$monitoring->nama_tenant}}</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th>Perusahaan Tenant</th>
                                                                                        <td>{{$monitoring->perusahaan_tenant}}</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th>Alamat Tenant</th>
                                                                                        <td>{{$monitoring->alamat_tenant}}</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th>Jabatan Tenant</th>
                                                                                        <td>{{$monitoring->jabatan_tenant}}</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th>No Telepon Tenant</th>
                                                                                        <td>{{$monitoring->no_telp_tenant}}</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th>Email Tenant</th>
                                                                                        <td>{{$monitoring->email_tenant}}</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th>Jabatan Pemegang Kebijakan</th>
                                                                                        <td>{{$monitoring->jabatan_pemegang_kebijakan}}</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th>Nama Pemegang Kebijakan</th>
                                                                                        <td>{{$monitoring->nama_pemegang_kebijakan}}</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th>Minat Produk</th>
                                                                                        <td>{{$monitoring->minat_produk}}</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th>Detail Minat Produk</th>
                                                                                        <td>{{$monitoring->detail_minat_produk}}</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th>Jenis Dokumentasi</th>
                                                                                        <td>{{$monitoring->dokumentasi}}</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th>Dokumentasi</th>
                                                                                        <td><img width="150px" src="{{ url('/marketing_project/public/images/Upload/'.$monitoring->foto_dokumentasi) }}"></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th>Catatan Mengenai Peluang</th>
                                                                                        <td>{{$monitoring->cttn_peluang}}</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th>Catatan Mengenai Estimasi Revenue</th>
                                                                                        <td>{{$monitoring->cttn_estimasi_revenue}}</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th>Catatan Timeline</th>
                                                                                        <td>{{$monitoring->cttn_timeline}}</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th>Catatan Permintaan Tenant</th>
                                                                                        <td>{{$monitoring->cttn_permintaan_tenant}}</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th>Tanggal Dibuatnya Laporan</th>
                                                                                        <td>{{$monitoring->created_at}}</td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
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
@include('layouts.footer')
        </div>
    </div>
@include('layouts.js')

</body>

</html>