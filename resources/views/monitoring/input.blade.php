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
                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('status') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h4 class="m-0 font-weight-bold text-primary">Form Input Data Baru</h4>
                        </div>
                        <div class="card-body">
                            <form action="store" method="post" enctype="multipart/form-data" >
						    @csrf
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control " name="username" placeholder="Masukkan username Anda" value="{{ Auth::user()->NIK }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <select name="agenda_visit" class="form-control">
                                            <option value="" disabled>Pilih Agenda Visit</option>
                                            <option value="INISIASI">INISIASI</option>
                                            <option value="PENJELASAN PRODUK">PENJELASAN PRODUK</option>
                                            <option value="VISIT PELUANG TENDER">VISIT PELUANG TENDER</option>
                                            <option value="FOLLOW UP PELUANG">FOLLOW UP PELUANG</option>
                                            <option value="PEMBUATAN SPH">PEMBUATAN SPH</option>
                                            <option value="PENDAFTARAN TENDER">PENDAFTARAN TENDER</option>
                                            <option value="NEGOSIASI HARGA">NEGOSIASI HARGA</option>
                                            <option value="BAKN HARGA">BAKN HARGA</option>
                                            <option value="TANDA TANGAN KONTRAK">TANDA TANGAN KONTRAK</option>
                                        </select>
                                        <span style="color: red">@error('FM'){{ $message }} @enderror</span>
                                    </div>
                                    <div class="col-sm-6">
                                        <select name="kategori_tenant" class="form-control">
                                            <option value="" disabled>Pilih Kategori Tenant</option>
                                            <option value="TELKOM">TELKOM</option>
                                            <option value="TELKOM GROUP">TELKOM GROUP</option>
                                            <option value="PERBANKAN">PERBANKAN</option>
                                            <option value="PERUSAHAAN BUMN">PERUSAHAAN BUMN</option>
                                            <option value="PERUSAHAAN SWASTA">PERUSAHAAN SWASTA</option>
                                            <option value="PEMERINTAHAN">PEMERINTAHAN</option>
                                            <option value="PERORANGAN">PERORANGAN</option>
                                            <option value="KOPERASI">KOPERASI</option>
                                        </select>
                                        <span style="color: red">@error('FM'){{ $message }} @enderror</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <select name="minat_produk" id="minat_produk" onchange="update()" class="form-control">
                                            <option disabled>Pilih Minat Produk</option>
                                            <option value="PROPERTY DEVELOPMENT">PROPERTY DEVELOPMENT</option>
                                            <option value="PROPERTY MANAGEMENT">PROPERTY MANAGEMENT</option>
                                            <option value="PROJECT MANAGEMENT">PROJECT MANAGEMENT</option>
                                            <option value="FACILITY MANAGEMENT">FACILITY MANAGEMENT</option>
                                        </select>
                                        <span style="color: red">@error('FM'){{ $message }} @enderror</span>
                                    </div>
                                    <div class="col-sm-6">
                                        <select name="detail_minat_produk" id="detail_minat_produk" class="form-control">
                                            <option disabled>Pilih Jenis Minat Produk</option>
                                        </select>
                                        <span style="color: red">@error('FM'){{ $message }} @enderror</span>
                                    </div>
                                </div>
                                <h5 class="mt-4 font-weight-bold text-primary">Data PIC</h5>
                                <h6 class="mt-1 ml-1 font-weight-normal text-primary">&#9673; Calon Tenant</h6>
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control " name="nama_tenant" placeholder="Tuliskan nama tenant" value="{{old('nama_tenant')}}">
                                        <span style="color: red">@error('nama_tenant'){{ $message }} @enderror</span>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control " name="perusahaan_tenant" placeholder="Tuliskan nama perusahaan tenant" value="{{old('perusahaan_tenant')}}">
                                        <span style="color: red">@error('perusahaan_tenant'){{ $message }} @enderror</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control " name="alamat_tenant" placeholder="Tuliskan alamat tenant" value="{{old('alamat_tenant')}}">
                                        <span style="color: red">@error('alamat_tenant'){{ $message }} @enderror</span>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control " name="jabatan_tenant" placeholder="Tuliskan jabatan tenant" value="{{old('jabatan_tenant')}}">
                                        <span style="color: red">@error('jabatan_tenant'){{ $message }} @enderror</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <input type="number" class="form-control " name="no_telp_tenant" placeholder="Tuliskan nomor telepon tenant" value="{{old('no_telp_tenant')}}">
                                        <span style="color: red">@error('no_telp_tenant'){{ $message }} @enderror</span>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control " name="email_tenant" placeholder="Tuliskan email tenant" value="{{old('email_tenant')}}">
                                        <span style="color: red">@error('email_tenant'){{ $message }} @enderror</span>
                                    </div>
                                </div>
                                <h6 class="mt-1 ml-1 font-weight-normal text-primary">&#9673; Pemegang Kebijakan</h6>
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <select name="jabatan_pemegang_kebijakan" class="form-control">
                                            <option value="" disabled>Pilih Jabatan Pemegang Tenant</option>
                                            <option value="DIREKTUR">DIREKTUR</option>
                                            <option value="PIMPINAN">PIMPINAN</option>
                                            <option value="GM">GM</option>
                                            <option value="MANAGER">MANAGER</option>
                                            <option value="SPV DIVISI">SPV DIVISI</option>
                                            <option value="OWNER">OWNER</option>
                                        </select>
                                        <span style="color: red">@error('FM'){{ $message }} @enderror</span>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control " name="nama_pemegang_kebijakan" placeholder="Tuliskan nama pemegang kebijakan" value="{{old('nama_pemegang_kebijakan')}}">
                                        <span style="color: red">@error('nama_pemegang_kebijakan'){{ $message }} @enderror</span>
                                    </div>
                                </div>
                                <h5 class="mb-1 mt-4 font-weight-bold text-primary">Dokumentasi</h5>
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <select name="dokumentasi" class="form-control">
                                            <option value="" disabled>Dokumentasi / Foto (jpeg,png,jpg)</option>
                                            <option value="FOTO BERSAMA PIC">FOTO BERSAMA PIC</option>
                                            <option value="FOTO KANTOR / CALON TENANT">FOTO KANTOR/ CALON TENANT</option>
                                            <option value="FOTO EVIDENCE VIA MEDIA">FOTO EVIDENCE VIA MEDIA</option>
                                        </select>
                                        <span style="color: red">@error('FM'){{ $message }} @enderror</span>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="file" class="form-control " name="foto_dokumentasi" placeholder="Upload foto" value="{{old('foto_dokumentasi')}}">
                                        <span style="color: red">@error('foto_dokumentasi'){{ $message }} @enderror</span>
                                    </div>
                                </div>
                                <h5 class="mb-1 mt-4 font-weight-bold text-primary">Catatan</h5>
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <textarea type="text" class="form-control " name="cttn_peluang" placeholder="Isikan catatan tentang peluang" value="{{old('cttn_peluang')}}"></textarea>
                                        <span style="color: red">@error('cttn_peluang'){{ $message }} @enderror</span>
                                    </div>
                                    <div class="col-sm-6">
                                        <textarea type="text" class="form-control " name="cttn_estimasi_revenue" placeholder="Isikan catatan tentang estimasi revenue" value="{{old('cttn_estimasi_revenue')}}"></textarea>
                                        <span style="color: red">@error('cttn_estimasi_revenue'){{ $message }} @enderror</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <textarea type="text" class="form-control " name="cttn_timeline" placeholder="Isikan catatan tentang timeline" value="{{old('cttn_timeline')}}"></textarea>
                                        <span style="color: red">@error('cttn_timeline'){{ $message }} @enderror</span>
                                    </div>
                                    <div class="col-sm-6">
                                        <textarea type="text" class="form-control " name="cttn_permintaan_tenant" placeholder="Isikan catatan tentang permintaan tenant" value="{{old('cttn_permintaan_tenant')}}"></textarea>
                                        <span style="color: red">@error('cttn_permintaan_tenant'){{ $message }} @enderror</span>
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

@include('layouts.js')
<script type="text/javascript">
        function update()
        {
            var property_development=["DEVELOPMENT", "LEASE", "HOSPITALITY", "RETAIL"];
            var property_management=["BUILDING MANAGEMENT", "SECURITY MANAGEMENT"]; 
            var project_management=["PROJECT FIT OUT INTERIOR & EKSTERIOR", "BUILDING CONSTRUCTION", "MEP"];
            var facility_management=["TRANSPORTATION MANAGEMENT SERVICE"]; 
            var countries=document.getElementById("minat_produk");
            var cities=document.getElementById("detail_minat_produk");
            var selected=countries.value;
            var html='<option disabled>Select detail minat produk</option>';
            if(selected === "PROPERTY DEVELOPMENT")
            {
                for(var i=0; i < property_development.length; i++)
                {
                    html+='<option value="' + property_development[i] + '">' + property_development[i] + '</option>';
                }
            }
            else if(selected === "PROPERTY MANAGEMENT")
            {
                for(var j=0; j < property_management.length; j++)
                {
                    html+='<option value="' + property_management[j] + '">' + property_management[j] + '</option>';
                }
            }
            else if(selected === "PROJECT MANAGEMENT")
            {
                for(var k=0; k < project_management.length; k++)
                {
                    html+='<option value="' + project_management[k] + '">' + project_management[k] + '</option>';
                }
            }
            else if(selected === "FACILITY MANAGEMENT")
            {
                for(var k=0; k < facility_management.length; k++)
                {
                    html+='<option value="' + facility_management[k] + '">' + facility_management[k] + '</option>';
                }
            }
            cities.innerHTML=html;
        }
    </script>

</body>

</html>