@extends('layouts.admin')

@section('title')
    Transaction|Admin
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
                <h3>Edit Data Admin</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="index.html">Profile Admin</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Data</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <!-- Basic Tables start -->
    <section class="section">
        <form action="{{ route('profile.update', $item->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')    
            @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Nama</label>
                            <input type="text" name="name" value="{{ $item->name }}" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Username</label>
                            <input type="text" name="username" value="{{ $item->username }}" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" name="email" value="{{ $item->email }}" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            {{-- <label for="">Level</label> --}}
                            <input value="{{ $item->role }}" type="hidden" name="level" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Foto</label>
                            <input type="file" name="foto" class="form-control">
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


