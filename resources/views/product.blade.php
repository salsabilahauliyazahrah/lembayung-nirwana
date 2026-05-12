@extends('layouts.main')

@section('content')

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

    <div class="container mt-5">

        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">

            <h2 class="m-0">
                Daftar Product Cabin
            </h2> 
            
            <div class="d-flex gap-2">
                <!-- Tambah Cabin -->
                @if(Auth::user()->role == 'admin')

                <a href="{{ url('/admin/products/create') }}"
                class="btn btn-success rounded-pill">
                    + Tambah Cabin
                </a>
                @endif
                <!-- Kembali -->
                <a href="{{ route('dashboard') }}"
                class="btn btn-outline-dark rounded-pill">

                    ← Kembali
                </a>
            </div>            

        </div>

        <!-- Product Card -->
        <div class="row">

            @forelse($products as $product)

            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">

                    <!-- Gambar -->
                    <div class="image-hover">
                        <img src="{{ asset('storage/' . $product->gambar_1) }}"
                            class="card-img-top img-first">

                        <img src="{{ asset('storage/' . $product->gambar_2) }}"
                            class="card-img-top img-second">
                    </div>

                    <!-- Body -->
                    <div class="card-body">

                        <h4 class="card-title fw-bold">
                            {{ $product->nama_produk }}
                        </h4>

                        <p class="card-text mb-2">
                            <strong>Kategori :</strong>
                            {{ $product->category->nama_category }}
                        </p>

                        <p class="card-text mb-2">
                            <strong>Brand :</strong>
                            {{ $product->brand->nama_brand }}
                        </p>

                        <p class="card-text mb-2">
                            <strong>Harga :</strong>
                            Rp {{ number_format($product->harga, 0, ',', '.') }}/Malam
                        </p>

                        <p class="card-text mb-3">
                            <strong>Kapasitas :</strong>
                            {{ $product->kapasitas }} Orang
                        </p>

                        <!-- Button -->
                        <div class="d-grid gap-2">

                            <button class="btn btn-dark">
                                Detail Cabin
                            </button>

                            <button class="btn btn-outline-warning">
                                ⭐ Wishlist
                            </button>

                        </div>

                        @if(Auth::user()->role == 'admin')

                        <div class="d-flex gap-2 mt-3">

                            <!-- Edit -->
                            <a href="{{ route('admin.products.edit', $product->id) }}"
                            class="btn btn-warning w-100">

                                Edit

                            </a>

                            <!-- Hapus -->
                            <form action="{{ route('admin.products.delete', $product->id) }}"
                                method="POST"
                                class="w-100">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="btn btn-danger w-100"
                                        onclick="return confirm('Yakin ingin menghapus cabin ini?')">

                                    Hapus

                                </button>

                            </form>

                        </div>

                        @endif
                    </div>
                </div>
            </div>

            @empty

            <div class="col-12">

                <div class="alert alert-warning text-center">

                    Data product belum tersedia

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
