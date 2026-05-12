@extends('layouts.main')

@section('content')
    
    <!-- Hero Section -->
    <div class="hero text-center text-white d-flex align-items-center" id="home">
        <div class="container">
            <h1>Lembayung Nirwana</h1>
            <p>Tempat singgah bagi jiwa yang mencari ketenangan</p>
        </div>
    </div>

    <!-- Dashboard -->
    <div class="container mt-5" id="dashboard">
        <div class="row text-center g-4">
            <div class="col-md-4">
                <div class="card dashboard-card">
                    <div class="card-body">
                        <h5>Total Cabin</h5>
                        <h2>37</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card dashboard-card">
                    <div class="card-body">
                        <h5>Cabin Terisi</h5>
                        <h2>10</h2>                        
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card dashboard-card">
                    <div class="card-body">
                        <h5>Cabin Tersedia</h5>
                        <h2>27</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Daftar Cabin -->
    <div class="container mt-5" id="cabin">

        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">

            <h3 class="m-0">Daftar Cabin</h3>

            <a href="{{ url('/products') }}"
            class="btn btn-outline-dark rounded-pill">

                Lihat Semua →
            </a>

        </div>        

        <div class="row">

            @forelse($products as $product)

            <div class="col-md-4">
                <div class="card mb-4">

                    <div class="image-hover">
                        <img src="{{ asset('storage/' . $product->gambar_1) }}"
                            class="card-img-top img-first">

                        <img src="{{ asset('storage/' . $product->gambar_2) }}"
                            class="card-img-top img-second">
                    </div>

                    <div class="card-body">

                        <h5 class="card-title">
                            {{ $product->nama_produk }}
                        </h5>

                        <p class="card-text">
                            Kategori :
                            {{ $product->category->nama_category }}
                        </p>

                        <p class="card-text">
                            Brand :
                            {{ $product->brand->nama_brand }}
                        </p>

                        <p class="card-text">
                            Harga :
                            Rp {{ number_format($product->harga, 0, ',', '.') }}/Malam
                        </p>

                        <p class="card-text">
                            Kapasitas :
                            {{ $product->kapasitas }} orang
                        </p>

                        <div class="btn-group-custom">

                            <button class="btn btn-detail w-100 mb-2">
                                Detail
                            </button>

                            <div class="d-flex gap-2">

                                <button class="btn btn-success btn-booking">
                                    Booking
                                </button>

                                <button class="btn btn-outline-warning btn-wishlist">
                                    ⭐ Wishlist
                                </button>

                            </div>

                        </div>

                    </div>
                </div>
            </div>

            @empty

            <div class="col-12">
                <div class="alert alert-warning text-center">
                    Data cabin belum tersedia.
                </div>
            </div>

            @endforelse

        </div>
    </div>

    <!-- Modal wishlist -->
     <div class="modal fade" id="wishlistModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Daftar Wishlist Saya</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                </div>
                <div class="modal-body">
                    <ul class="list-group" id="daftar-wishlist">

                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-danger" onclick="hapusWishlist()">Kosongkan</button>
                </div>
            </div>
        </div>
     </div>

@endsection