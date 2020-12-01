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
                @if (session('status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('status') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-4"></div>
                        <div class="col-lg-4" >
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Ganti Password</h6>
                                </div>
                                <div class="card-body">
                                    <form action="/save-new-password" method="post" >
                                        @csrf
                                        <div class="form-group row">
                                            <div class="col-sm-12 mb-6 mb-sm-3">
                                                <input type="password" class="form-control " name="password" placeholder="Masukkan password baru Anda" value="{{old('password')}}">
                                                <span style="color: red">@error('password'){{ $message }} @enderror</span>
                                            </div>
                                        </div>
                                        <div class="class=btn btn-primary btn-user" style="text-align: center" >
                                            <button class="btn btn-sm btn-primary" type="submit">Submit</button>
                                        </div>

                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
@include('layouts.footer')
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->
@include('layouts.js')
</body>

</html>