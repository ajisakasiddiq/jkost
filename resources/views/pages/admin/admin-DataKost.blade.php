@extends('layouts.sidebar')

@section('title')
    Data Kost|Admin
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

    <!-- Basic Tables start -->
    <section class="section">
        <div class="card">
            <div class="card-header">
                Jquery Datatable
            </div>
            <div class="card-body">
                <table class="table" id="datakost">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID</th>
                            <th>Foto</th>
                            <th>Nama kos</th>
                            <th>alamat</th>
                            <th>Deskripsi</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>

    </section>
    <!-- Basic Tables end -->
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
        var i = 1;
       $('#datakost').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ url()->current() }}',
            columns : [
                {
                    "render": function() {
                        return i++;
                    }
                },
                {data: 'id', name: 'id'},
                {data: 'foto', name: 'foto'},
                // {data: 'user_id', name: 'user_id'},
                {data: 'nama_kost', name: 'nama_kost'},
                {data: 'alamat', name: 'alamat'},
                {data: 'deskripsi', name: 'deskripsi'},
                {data: 'status', name: 'status'},

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

