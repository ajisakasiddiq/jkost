@extends('layouts.pencari')

@section('title')
    Transaction | Admin
@endsection

@push('addon-style')
<link rel="stylesheet" href="/assets/css/pages/fontawesome.css">
<link rel="stylesheet" href="/assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="/assets/css/pages/datatables.css">
    
@endpush

@section('content')
<div id="main">


    <div class="col-3">
        <div class="card" style="width: 18rem; max-width: 250px;">
            <img src="img/blog-1.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Kos mami</h5>
               
                    <p><span class="online_animation"></span> Aktif</p>
             

                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi enim accusantium totam assumenda, alias ex dicta aperiam perferendis, maxime tempore, quibusdam ipsam tempora odio voluptate nihil! Dolorum dicta numquam dolores.</p>
                <div class="row">
                    <div class="col-6">
                        <a href="checkout.php?id_kamar" class=" btn btn-primary">Lanjut Sewa</a>
                    </div>
                    <div class="col-6">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#Stopsewa<?= $idPesan; ?>" class="btn btn-danger">Stop Sewa</a>
                    </div>
                </div>


            </div>
        </div>

    <?php } ?>
    <!-- table section -->
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



