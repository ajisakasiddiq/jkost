@extends('layouts.pemilik')

@section('title')
    Profile Admin|Admin
@endsection

@push('addon-style')
<link rel="stylesheet" href="/assets/css/pages/fontawesome.css">
<link rel="stylesheet" href="/assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="/assets/css/pages/datatables.css">
    
@endpush

@section('content')
<div id="main">
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Profile Admin</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Profile Admin</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="page-content">
    
    <!-- Basic Tables start -->
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
                            <th>Foto depan kamar</th>
                            <th>Foto dalam kamar</th>
                            <th>Foto kamar mandi</th>
                            <th>Foto dapur</th>
                            {{-- <th>Nama Kost</th> --}}
                            <th>No. Kamar</th>
                            <th>Jenis Kamar</th>
                            <th>Deskripsi</th>
                            <th>Harga</th>
                            <th>Status</th>
                            <th>Slug</th>
                            <th>Action</th>
                           
                        </tr>

                    </thead>
                    <tbody>
                        <?php

                        $no = 1;
    
                        ?>
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
                        <td>{{ $datakamar->no_kamar }}</td>
                        <td>{{ $datakamar->jenis_kamar }}</td>
                        <td>{{ $datakamar->deskripsi }}</td>
                        <td>{{ $datakamar->harga }}</td>
                        <td>{{ $datakamar->status }}</td>
                        <td>{{ $datakamar->slug }}</td>
                        <td>
                                <a href="" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deletedata{{$datakamar->id}}">
                                    Delete
                                </a>
                        </td>
                    </tr>

                    <div class="modal fade" id="deletedata{{ $datakamar->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="/kamarkost-delete/{{$datakamar->id}}" method="POST">
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

                

                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>

    </section>
    <!-- Basic Tables end -->
{{-- modals tambah --}}
<div class="modal fade" id="addAdmin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="/kamarkost-add" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Id Kost</label>
                            <input type="text" name="id_kost" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Jenis kamar</label>
                            <input type="text" name="jenis_kamar" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">No kamar</label>
                            <input type="text" name="no_kamar" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Harga</label>
                            <input type="text" name="harga" class="form-control" required>
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
                            <label for="">Gambar pertama</label>
                            <input type="file" name="img_pertama" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Gambar kedua</label>
                            <input type="file" name="img_kedua" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Gambar ketiga</label>
                            <input type="file" name="img_ketiga" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Gambar keempat</label>
                            <input type="file" name="img_keempat" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Deskripsi</label>
                            <input type="text" name="deskripsi" class="form-control" required>
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

{{-- modals edit --}}
<div class="modal fade" id="editAdmin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{ route('profile.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Nama</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Username</label>
                            <input type="text" name="username" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" name="email" class="form-control" required>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Foto</label>
                            <input type="file" name="foto" class="form-control" required>
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


{{-- <script type="text/javascript">
    $(document).ready(function () {
       $('#datakamar').DataTable({
            processing: true,
            serverSide: true,
            scrollX: true,
            ajax: '{{ url()->current() }}',
            // columns : [
            //     {data: 'id', name: 'id'},
            //     {data: 'kost_id', name: 'kost_id'},
            //     {data: 'jenis_kamar', name: 'jenis_kamar'},
            //     {data: 'no_kamar', name: 'no_kamar'},
            //     {data: 'harga', name: 'harga'},
            //     {data: 'status', name: 'status'},
            //     {data: 'img_satu', name: 'img_satu'},
            //     {data: 'img_kedua', name: 'img_kedua'},
            //     {data: 'img_ketiga', name: 'img_ketiga'},
            //     {data: 'img_keempat', name: 'img_keempat'},
            //     {data: 'deskripsi', name: 'deskripsi'},
            //     {data: 'slug', name: 'slug'},
            //     {
            //         data: 'action', 
            //         name:'action',
            //         orderable : false,
            //         searcable : false,
            //         width:'15%'
            //     },
            // ]
        });
 });
    </script> --}}

@endpush

