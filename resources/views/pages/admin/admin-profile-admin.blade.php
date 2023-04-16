@extends('layouts.admin')

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
                    + Tambah Admin
                </a>
            </div>
            <div class="card-body">
                <table class="table" id="ProfileUserTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Foto</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Username</th>
                            <th>NIK</th>
                            <th>Alamat</th>
                            <th>No Hp</th>
                            <th>Jenis Kelamin</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>

    </section>
    <!-- Basic Tables end -->
{{-- modals --}}
<div class="modal fade" id="addAdmin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
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


<script type="text/javascript">
    $(document).ready(function () {
       $('#ProfileUserTable').DataTable({
            processing: true,
            serverSide: true,
            scrollX: true,
            ajax: '{{ url()->current() }}',
            columns : [
                {data: 'id', name: 'id'},
                {data: 'foto', name: 'foto'},
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'username', name: 'username'},
                {data: 'nik', name: 'nik'},
                {data: 'alamat', name: 'alamat'},
                {data: 'no_hp', name: 'no_hp'},
                {data: 'jenis_kelamin', name: 'jenis_kelamin'},
                {
                    data: 'action', 
                    name:'action',
                    orderable : false,
                    searcable : false,
                    width:'15%'
                },
            ]
        });
 });
    </script>

@endpush

