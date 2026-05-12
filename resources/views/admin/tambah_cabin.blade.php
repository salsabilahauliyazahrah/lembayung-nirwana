@extends('layouts.main')

@section('content')

<div class="container mt-5 mb-5">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold">
                Tambah Cabin Baru
            </h2>
            <p class="text-muted">
                Tambahkan data cabin penginapan baru.
            </p>
        </div>

        <a href="{{ route('dashboard') }}"
           class="btn btn-outline-dark rounded-pill">
            ← Kembali
        </a>
    </div>

    <!-- Form -->
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-body p-4">
                    <form action="{{ url('/admin/products/store') }}"
                          method="POST"
                          enctype="multipart/form-data">
                        @csrf

                        <!-- Nama Cabin -->
                        <div class="mb-3">
                            <label class="form-label">
                                Nama Cabin
                            </label>
                            <input type="text"
                                   name="nama_produk"
                                   class="form-control"
                                   placeholder="Masukkan nama cabin"
                                   required>
                        </div>

                        <!-- Harga -->
                        <div class="mb-3">
                            <label class="form-label">
                                Harga / Malam
                            </label>
                            <input type="number"
                                   name="harga"
                                   class="form-control"
                                   placeholder="Masukkan harga"
                                   required>
                        </div>

                        <!-- Kapasitas -->
                        <div class="mb-3">
                            <label class="form-label">
                                Kapasitas
                            </label>
                            <input type="text"
                                   name="kapasitas"
                                   class="form-control"
                                   placeholder="Masukkan kapasitas"
                                   required>
                        </div>

                        <!-- Category -->
                        <div class="mb-3">
                            <label class="form-label">
                                Kategori Cabin
                            </label>
                            <select name="category_id"
                                    class="form-select"
                                    required>
                                <option value="">
                                    Pilih Kategori
                                </option>

                                @foreach($categories as $category)

                                    <option value="{{ $category->id }}">
                                        {{ $category->nama_category }}
                                    </option>
                                @endforeach
                            </select>
                        </div>


                        <!-- Brand -->
                        <div class="mb-3">
                            <label class="form-label">
                                Brand Cabin
                            </label>
                            <select name="brand_id"
                                    class="form-select"
                                    required>
                                <option value="">
                                    Pilih Brand
                                </option>
                                @foreach($brands as $brand)
                                    <option value="{{ $brand->brand_id }}">
                                        {{ $brand->nama_brand }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Gambar 1 -->
                        <div class="mb-3">

                            <label class="form-label">
                                Gambar Cabin 1
                            </label>

                            <input type="file"
                                name="gambar_1"
                                class="form-control"
                                accept="image/*"
                                onchange="previewImage1(event)">

                            <!-- Preview -->
                            <div class="mt-3">
                                <img id="preview1"
                                    src=""
                                    class="img-thumbnail d-none"
                                    width="250">
                            </div>
                        </div>

                        <!-- Gambar 2 -->
                        <div class="mb-4">
                            <label class="form-label">
                                Gambar Cabin 2
                            </label>

                            <input type="file"
                                name="gambar_2"
                                class="form-control"
                                accept="image/*"
                                onchange="previewImage2(event)">

                            <!-- Preview -->
                            <div class="mt-3">
                                <img id="preview2"
                                    src=""
                                    class="img-thumbnail d-none"
                                    width="250">
                            </div>
                        </div>


                        <!-- Button -->
                        <div class="d-flex gap-2">
                            <button type="submit"
                                    class="btn btn-success w-100">
                                Simpan Cabin
                            </button>
                            <a href="{{ route('dashboard') }}"
                               class="btn btn-secondary w-100">
                                Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection