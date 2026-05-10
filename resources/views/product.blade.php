<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Manajemen Penginapan</title>
    
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">  

    <!-- font -->
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@600;700&family=Poppins:wght@300&display=swap" rel="stylesheet">

    <!-- CSS Custom -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login-style.css') }}">

    <!-- Javascript -->
    <script src="{{ asset('js/script.js') }}" defer></script>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#home">Lembayung Nirwana</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-expanded="false" aria-label="Toggle navigation">                 
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">

                    <!-- Dashboard button -->
                    <li class="nav-item">
                        <a class="nav-link" href="#dashboard">Dashboard</a>
                    </li>

                    <!-- Cabin button -->
                    <li class="nav-item">
                        <a class="nav-link" href="#cabin">Cabin</a>
                    </li>

                    <!-- Wishlist button -->
                    <li class="nav-item">
                        <a href="#" 
                        class="nav-link btn btn-sm ms-2"
                        data-bs-toggle="modal"
                        data-bs-target="#wishlistModal"
                        onclick="tampilkanWishlist()">
                            Wishlist (<span id="wishlistCount">0</span>)
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="#" 
                        id="btn-theme"
                        class="nav-link btn btn-sm ms-2">
                            🌙
                        </a>
                    </li>        
                </ul>

                <!-- Login / Logout -->
                <div class="user-menu ms-3">

                    @auth
                        {{-- Sudah login --}}
                        <div class="user-toggle" onclick="toggleMenu()">
                            Halo, {{ Auth::user()->username }}
                        </div>

                        <div class="dropdown-menu-custom" id="dropdownMenu">

                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="logout-item border-0 bg-transparent">
                                    Logout
                                </button>
                            </form>

                        </div>

                    @else
                        {{-- Belum login --}}
                        <a href="{{ route('login') }}" class="login-btn">
                            Login
                        </a>
                    @endauth

                </div>    
            </div>
        </div>
    </nav>

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

            <a href="{{ url('/') }}"
            class="btn btn-outline-dark rounded-pill">

                ← Kembali
            </a>

        </div>

        <!-- Product Card -->
        <div class="row">

            @forelse($products as $product)

            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">

                    <!-- Gambar -->
                    <div class="image-hover">
                        <img src="{{ asset('assets/' . $product->gambar_1) }}"
                            class="card-img-top img-first">

                        <img src="{{ asset('assets/' . $product->gambar_2) }}"
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

    <!-- Footer -->
     <footer class="footer-section mt-5">
        <div class="container py-4">
            <div class="row align-items-start text-center text-md-start">

                <!-- Sebelah Kiri -->
                <div class="col-md-4 mb-4">
                    <h5>Lembayung Nirwana</h5>
                    <p class="small">
                        Tempat singgah bagi jiwa yang mencari ketenangan. Nikmati hangatnya senja di tengah alam yang syahdu
                    </p>
                </div>

                <!-- di tengah -->
                <div class="col-md-4 mb-4 text-center">
                    <h5>Jam Operasional</h5>
                    <p class="small mb-1">Check-in : 14.00 WIB</p>
                    <p class="small">Check-out : 12.00 WIB</p>                    
                </div>

                <!-- Sebelah Kanan --> 
                <div class="col-md-4 mb-4 text-md-end">
                    <h5>Kontak Kami</h5>
                    <p class="small mb-1">📍 Puncak Lembah Nirwana</p>
                    <p class="small mb-1">📞 +62 812-3456-7890</p>
                    <p class="small">✉ info@lembayungnirwana.id</p>                
                </div>

            </div>            
        </div>    

        <hr class="border-light">
        <div class="text-center small">
            © 2026 Lembayung Nirwana. All rights reserved.
        </div>
     </footer>
    <!-- <footer class="bg-dark text-white text-center p-3">@ 2026 Sistem Manajemen Sepatu. All rights reserved.</footer> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
     

</body>
</html>