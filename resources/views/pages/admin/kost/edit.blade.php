@extends('layouts.sidebar')

@section('title')
    Validate Kost | Admin
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
                <h3>Validate Kost</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="index.html">Data Kost</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Validate</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <!-- Basic Tables start -->
    <section class="section">
        <form action="{{ route('datakost.update', $item->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')    
            @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                           
                            <input type="hidden" value="{{ $item->id }}" name="user_id" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Foto</label>
                            <input type="file" name="foto" class="form-control" >
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Nama Kost</label>
                            <input type="text" name="nama_kost" value="{{ $item->nama_kost }}" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">alamat</label>
                            <input type="text" name="alamat" value="{{ $item->alamat }}" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Deskripsi</label>
                            <input type="text" name="deskripsi" value="{{ $item->deskripsi }}" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-12"> 
                        <div class="form-group">
                            <label for="">Status</label>
                            <select name="id_kost" required class="form-control">
                                <option value="">2</option>
                                <option value="">2</option>
                                <option value="">2</option>
                              </select>
                        </div>
                    </div>
                    {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
                    <button class="btn btn-primary col-lg-2 ms-auto" type="submit" class="btn btn-primary">Save changes</button>
                  </form>
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