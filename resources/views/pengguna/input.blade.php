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
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Form Input Pengguna Baru</h6>
                        </div>
                        <div class="card-body"> 
                            <form action="store" method="post" >
						    @csrf
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control " name="NIK" placeholder="Tuliskan NIK (Nomor Induk Karyawan) calon pengguna" value="{{old('NIK')}}">
                                        <span style="color: red">@error('NIK'){{ $message }} @enderror</span>
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control "
                                            name="nama" placeholder="Tuliskan nama lengkap calon pengguna" value="{{old('nama')}}">
                                        <span style="color: red">@error('nama'){{ $message }} @enderror</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control "
                                            name="loker" placeholder="Tuliskan lokasi kerja calon pengguna" value="{{old('loker')}}">
                                        <span style="color: red">@error('loker'){{ $message }} @enderror</span>
                                    </div>
                                    <div class="col-sm-6">
                                        <select name="FM" class="form-control">
                                            <option value="BM TLT" disabled="">Pilih FM / BM</option>
                                            <option value="BM TLT">BM TLT</option>
                                            <option value="FM Bali">FM Bali</option>
                                            <option value="FM Nusra Timur">FM Nusra Timur</option>
                                            <option value="FM Nusra Barat">FM Nusra Barat</option>
                                            <option value="FM Jatim Timur">FM Jatim Timur</option>
                                            <option value="FM Jatim Barat">FM Jatim Barat</option>
                                            <option value="FM Surabaya Utara">FM Surabaya Utara</option>
                                            <option value="FM Surabaya Barat">FM Surabaya Barat</option>
                                        </select>
                                        <span style="color: red">@error('FM'){{ $message }} @enderror</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control "
                                            name="no_telf" placeholder="Tuliskan nomor telepon calon pengguna" value="{{old('no_telf')}}">
                                        <span style="color: red">@error('no_telf'){{ $message }} @enderror</span>
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <select name="role" class="form-control">
                                            <option value="administrator" selected>Administrator</option>
                                            <option value="user">User</option>
                                        </select>
                                        <span style="color: red">@error('role'){{ $message }} @enderror</span>
                                    </div>
                                </div>
                                <div class="" style="text-align: right">
                                    <button class="btn btn-primary btn-user" style="text-align: center" type="submit">Submit</button>
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
@include('layouts.js')

</body>

</html>