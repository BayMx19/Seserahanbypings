<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produk;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.master-produk.index');
    }

    public function getListProduk()
    {
        $listProduk = Produk::select('id', 'nama_produk', 'stok', 'kategori', 'harga_jual', 'harga_sewa', 'status_produk')->get();

        return response() ->json($listProduk);
    }

    public function create()
    {
        return view('admin.master-produk.create');
    }

    public function store(Request $request)
    {
        $gambarPath = null;
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('gambar_produk', 'public');
        }

        try {
            DB::table('m_produk')->insert([
                'nama_produk' => $request->nama_produk,
                'harga_jual' => $request->harga_jual,
                'harga_sewa' => $request->harga_sewa,
                'stok' => $request->stok,
                'kategori' => $request->kategori,
                'status_produk' => $request->status_produk,
                'deskripsi' => $request->deskripsi,
                'gambar' => $gambarPath,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return redirect('/admin/produk')->with('success', 'Produk berhasil ditambahkan.');
        } catch (QueryException $e) {
             Log::error('Gagal insert produk: ' . $e->getMessage());
                return redirect('/admin/produk')->with('error', 'Gagal menambahkan Produk.');
        }
    }

    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        return view('admin.master-produk.edit', compact('produk'));
    }

    public function update(Request $request, $id)
    {
        $produk = Produk::FindOrFail($id);

        $produk->nama_produk = $request->nama_produk;
        $produk->harga_jual = $request->harga_jual;
        $produk->harga_sewa = $request->harga_sewa;
        $produk->stok = $request->stok;
        $produk->kategori = $request->kategori;
        $produk->status_produk = $request->status_produk;
        $produk->deskripsi = $request->deskripsi;

        if ($request->hasFile('gambar')) {
            // Hapus foto lama jika ada
            if ($produk->gambar && Storage::exists('public/' . $produk->gambar)) {
                Storage::delete('public/' . $produk->gambar);
            }

            // Simpan foto baru
            $gambarPath = $request->file('gambar')->store('gambar_produk', 'public');
            $produk->gambar = $gambarPath;
        }

        $produk->save();

        return redirect()->route('produk.index')->with('success', 'Data produk berhasil diperbarui.');

    }

    public function destroy($id)
    {
        $produk = Produk::FindOrFail($id);

        if ($produk->gambar && Storage::exists('public/' . $produk->gambar)) {
            Storage::delete('public/' . $produk->gambar);
        }

        $produk->delete();
    }
}
