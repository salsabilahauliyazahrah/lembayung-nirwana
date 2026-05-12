@extends('layouts.main')

@section('content')

<div class="container mt-5">

    <h2 class="fw-bold mb-4">
        Edit Cabin
    </h2>

    <form action="{{ route('admin.products.update', $product->id) }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <!-- Nama -->
        <div class="mb-3">

            <label class="form-label">
                Nama Cabin
            </label>

            <input type="text"
                   name="nama_produk"
                   class="form-control"
                   value="{{ $product->nama_produk }}"
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
                   value="{{ $product->harga }}"
                   required>

        </div>

        <!-- Kapasitas -->
        <div class="mb-3">

            <label class="form-label">
                Kapasitas
            </label>

            <input type="number"
                   name="kapasitas"
                   class="form-control"
                   value="{{ $product->kapasitas }}"
                   required>

        </div>

        <!-- Category -->
        <div class="mb-3">

            <label class="form-label">
                Kategori Cabin
            </label>

            <select name="category_id"
                    class="form-select">

                @foreach($categories as $category)

                    <option value="{{ $category->id }}"
                        {{ $product->category_id == $category->id ? 'selected' : '' }}>

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
                    class="form-select">

                @foreach($brands as $brand)

                    <option value="{{ $brand->brand_id }}"
                        {{ $product->brand_id == $brand->brand_id ? 'selected' : '' }}>

                        {{ $brand->nama_brand }}

                    </option>

                @endforeach

            </select>

        </div>

        <!-- Gambar Cabin 1 -->
        <div class="mb-4">

            <label class="form-label fw-semibold">
                Gambar Cabin 1
            </label>

            <div class="mb-2">

                <img src="{{ asset('storage/' . $product->gambar_1) }}"
                    alt="Gambar Cabin 1"
                    class="img-thumbnail"
                    width="250">

            </div>

            <input type="file"
                name="gambar_1"
                class="form-control">

            <small class="text-muted">
                Kosongkan jika tidak ingin mengganti gambar.
            </small>

        </div>


        <!-- Gambar Cabin 2 -->
        <div class="mb-4">

            <label class="form-label fw-semibold">
                Gambar Cabin 2
            </label>

            <div class="mb-2">

                <img src="{{ asset('storage/' . $product->gambar_2) }}"
                    alt="Gambar Cabin 2"
                    class="img-thumbnail"
                    width="250">

            </div>

            <input type="file"
                name="gambar_2"
                class="form-control">

            <small class="text-muted">
                Kosongkan jika tidak ingin mengganti gambar.
            </small>

        </div>

        <div class="d-flex gap-2">

            <!-- Button Update -->
            <button type="submit"
                    class="btn btn-warning rounded-pill">

                Update Cabin

            </button>

            <!-- Button Batal -->
            <a href="{{ route('dashboard') }}"
            class="btn btn-secondary rounded-pill">

                Batal

            </a>

        </div>

    </form>

</div>

@endsection