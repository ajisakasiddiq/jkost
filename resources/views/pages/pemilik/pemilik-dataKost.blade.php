@extends('layouts.pemilik')

@section('title')
    Profile Admin|Admin
@endsection

@push('addon-style')
<link rel="stylesheet" href="/assets/css/pages/fontawesome.css">
<link rel="stylesheet" href="/assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="/assets/css/pages/datatables.css">
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>    
@endpush

@section('content')
<div id="main">
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Kost</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Kost</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="page-content">
    
    <!-- Basic Tables start -->
    {{-- <section class="section">
        <div class="card">
            <div class="card-body">
                <form id="bookingForm" action="" method="post" class="needs-validation" novalidate autocomplete="off" enctype="multipart/form-data">
                    <input type="hidden" class="form-control" id="inputName" name="id_user" placeholder="Id user" required value="/" />
                    <div class="form-group">
                        <label for="img">Kost tampak depan</label>
                        <input id="img" type="file" class="form-control" name="gambar">
                    </div>
                    <div class="form-group">
                        <label for="inputName">Nama Kost</label>
                        <input type="text" class="form-control" id="inputName" name="txt_nama" placeholder="Nama kost anda!" required />
                    </div>
                    <div class="form-group">
                        <label for="textAreaRemark">Deskripsi</label>
                        <textarea class="form-control" name="txt_deskripsi" id="textAreaRemark" rows="5" placeholder="Tambahkan peraturan dan deskripsi kost anda...."></textarea>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail">Alamat</label>
                        <textarea class="form-control" rows="5" type="text" id="alamat" name="txt_alamat"></textarea>
                        <small class="form-text text-muted">Isi alamat selengkap mungkin!.</small>
                    </div>

                    <!-- get location start-->
                    <input type="hidden" class="form-control" id="Latitude" name="Latitude" placeholder="latitude" required />
                    <input type="hidden" class="form-control" id="Longitude" name="Longitude" placeholder="longitude" required />
                    <div class="mt-2 mb-2" id="mapid" style="width: 100%; height: 400px;"></div>
                    <script>
                        const mymap = L.map('mapid').setView([-8.231935485535336, 113.60678852931734], 13);
                        const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                            maxZoom: 19,
                        }).addTo(mymap);

                        var Latinput = document.querySelector("[name=Latitude]");
                        var Lnginput = document.querySelector("[name=Longitude]");

                        var curLocation = [-8.231935485535336, 113.60678852931734];
                        mymap.attributionControl.setPrefix(false);

                        var marker = new L.marker(curLocation, {
                            draggable: 'true',
                        });

                        marker.on('dragend', function(event) {
                            var position = marker.getLatLng();
                            marker.setLatLng(position, {
                                draggable: 'true',
                            }).bindPopup(position).update();
                            $("#Latitude").val(position.lat);
                            $("#Longitude").val(position.lng);
                        });

                        mymap.addLayer(marker);


                        mymap.on("click", function(e) {
                            var lat = e.latlng.lat;
                            var lng = e.latlng.lng;
                            if (!marker) {
                                marker = L.marker(e.latlng).addTo(mymap);
                            } else {
                                marker.setLatLng(e.latlng);
                            }
                            Latinput.value = lat;
                            Lnginput.value = lng;
                        });
                    </script>
                    <!-- get location end-->

                    <!-- Start Submit Button -->
                    <button class="btn btn-primary btn-block col-lg-2 ms-auto" type="submit" name="tambah">Submit</button>
                    <!-- End Submit Button -->
                </form>
            </div>
        </div>

    </section> --}}
    <section class="section">
        <div class="card">
            <div class="card-header">
                <a href="" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addAdmin">
                    + Tambah Data Kamar
                </a>
            </div>
            <div class="card-body">
                <table class="table" id="datakamar">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama kos</th>
                            <th>alamat</th>
                            <th>Deskripsi</th>
                            <th>Foto</th>
                            {{-- <th>Nama Kost</th> --}}
                            <th>Maps</th>
                            <th>Status</th>
                            <th>Longitude</th>
                            <th>Latitude</th>
                            <th>Action</th>
                           
                        </tr>

                    </thead>
                    <tbody>
                        {{-- 
                    <tr>                        
                        @foreach ($data as $datakamar)
                        <td>{{ $no++ }}</td>

                        <td>
                            <img src="{{ asset('/assets/user/' . $datakamar['img_pertama']) }}" alt="" height="20" width="20">
                        </td>
                        <td>
                            <img src="{{ asset('/assets/user/' . $datakamar['img_kedua']) }}" alt="" height="20" width="20">
                        </td>
                        <td>
                            <img src="{{ asset('/assets/user/' . $datakamar['img_ketiga']) }}" alt="" height="20" width="20">
                        </td>
                        <td>
                            <img src="{{ asset('/assets/user/' . $datakamar['img_keempat']) }}" alt="" height="20" width="20">
                        </td>
                        {{-- <td>{{ $datakamar->kost_id }}</td> --}}
                        {{-- <td>{{ $datakamar->no_kamar }}</td> --}}
                        {{-- <td>{{ $datakamar->jenis_kamar }}</td> --}}
                        {{-- <td>{{ $datakamar->deskripsi }}</td> --}}
                        {{-- <td>{{ $datakamar->harga }}</td> --}}
                        {{-- <td>{{ $datakamar->status }}</td> --}}
                        {{-- <td>{{ $datakamar->slug }}</td> --}}
                        {{-- <td> --}}
                                {{-- <a href="" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deletedata{{$datakamar->id}}"> --}}
                                    {{-- Delete --}}
                                {{-- </a> --}}
                        {{-- </td> --}}
                    {{-- </tr> --}} --

                    <div class="modal fade" id="deletedata" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="/kamarkost-delete" method="POST">
                                    @csrf
                                    @method('DELETE');
                                    <p>Yakin akan menghapus data ?</p>
                                
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary">Delete</button>
                            </form>
                    
                            </div>
                          </div>
                        </div>
                      </div>

                

                        {{-- @endforeach --}}

                    </tbody>
                </table>
            </div>
        </div>

    </section>
    {{-- modals tambah --}}
<div class="modal fade" id="addAdmin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">+ Tambah Data Kost </h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="/kostkamar-add" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">user_id</label>
                            <input type="text" name="user_id" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Nama Kost</label>
                            <input type="text" name="nama_kost" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">alamat</label>
                            <input type="text" name="alamat" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Deskripsi</label>
                            <input type="text" name="deskripsi" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Foto</label>
                            <input type="file" name="foto" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Maps</label>
                            <input type="text" name="maps" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Status</label>
                            <input  type="text" name="status" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Longitude</label>
                            <input type="text" name="longitude" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Latitude</label>
                            <input type="text" name="latitude" class="form-control" required>
                        </div>
                    </div>
                </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </form>

        </div>
      </div>
    </div>
  </div>
</div>
    <!-- Basic Tables end -->



            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2021 &copy; Mazer</p>
                    </div>
                    <div class="float-end">
                        <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                                href="https://saugi.me">Saugi</a></p>
                    </div>
                </div>
            </footer>



        </div>
@endsection

@push('addon-script')   
<script src="/assets/extensions/jquery/jquery.min.js"></script>
<script src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
<script src="/assets/js/pages/datatables.js"></script>





@endpush

