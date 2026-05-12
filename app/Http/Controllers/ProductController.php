<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Tampilkan Product
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $products = Product::with(['category', 'brand'])->get();

        return view('product', compact('products'));
    }


    /*
    |--------------------------------------------------------------------------
    | Simpan Product Baru
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        // upload gambar 1
        $gambar1 = null;

        if ($request->hasFile('gambar_1')) {
            $gambar1 = $request->file('gambar_1')
                                ->store('cabins', 'public');
        }

        // upload gambar 2
        $gambar2 = null;
        if ($request->hasFile('gambar_2')) {
            $gambar2 = $request->file('gambar_2')
                                ->store('cabins', 'public');
        }



        // simpan database
        Product::create([

            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
            'kapasitas' => $request->kapasitas,
            'category_id' => $request->category_id,
            'brand_id' => $request->brand_id,
            'gambar_1' => $gambar1,
            'gambar_2' => $gambar2,

        ]);
        


        return redirect()->route('dashboard')
                         ->with('success', 'Cabin berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        // upload gambar 1
        if ($request->hasFile('gambar_1')) {

            $gambar1 = $request->file('gambar_1')
                                ->store('cabins', 'public');

            $product->gambar_1 = $gambar1;
        }

        // upload gambar 2
        if ($request->hasFile('gambar_2')) {

            $gambar2 = $request->file('gambar_2')
                                ->store('cabins', 'public');

            $product->gambar_2 = $gambar2;
        }

        // update data
        $product->nama_produk = $request->nama_produk;
        $product->harga = $request->harga;
        $product->kapasitas = $request->kapasitas;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;

        $product->save();

        return redirect()->route('dashboard')
                        ->with('success', 'Cabin berhasil diupdate!');
    }    

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        // hapus gambar 1
        if ($product->gambar_1) {
            Storage::disk('public')->delete($product->gambar_1);
        }

        // hapus gambar 2
        if ($product->gambar_2) {
            Storage::disk('public')->delete($product->gambar_2);
        }
        // hapus data
        $product->delete();
        return redirect()->route('dashboard')
                        ->with('success', 'Cabin berhasil dihapus!');
    }
}