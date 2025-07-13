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
        $listProduk = Produk::select('id', 'nama_produk', 'stok', 'deskripsi', 'status_produk')->get();
        return response()->json($listProduk);
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

        DB::beginTransaction();
        try {

            $productId = DB::table('m_produk')->insertGetId([
                'nama_produk' => $request->nama_produk,
                'stok' => $request->stok,
                'status_produk' => $request->status_produk,
                'deskripsi' => $request->deskripsi,
                'gambar' => $gambarPath,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            if ($request->has('harga_kategori') && $request->has('harga_nilai')) {
                foreach ($request->harga_kategori as $index => $kategori) {
                    $hargaBersih = preg_replace('/[^\d]/', '', $request->harga_nilai[$index]); // hilangkan format Rp
                    DB::table('produk_harga')->insert([
                        'product_id' => $productId,
                        'kategori' => $kategori,
                        'harga' => $hargaBersih,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }

            DB::commit();
            return redirect('/admin/produk')->with('success', 'Produk berhasil ditambahkan.');

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Gagal insert produk: ' . $e->getMessage());
            return redirect('/admin/produk')->with('error', 'Gagal menambahkan Produk.');
        }
    }

    public function edit($id)
    {
        $produk = Produk::with('harga')->findOrFail($id);
        return view('admin.master-produk.edit', compact('produk'));
    }

    public function update(Request $request, $id)
    {
        $produk = DB::table('m_produk')->where('id', $id)->first();

        if (!$produk) {
            return redirect('/admin/produk')->with('error', 'Produk tidak ditemukan.');
        }

        $gambarPath = $produk->gambar;

        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('gambar_produk', 'public');
        }

        try {

            DB::table('m_produk')->where('id', $id)->update([
                'nama_produk' => $request->nama_produk,
                'stok' => $request->stok,
                'deskripsi' => $request->deskripsi,
                'status_produk' => $request->status_produk,
                'gambar' => $gambarPath,
                'updated_at' => now(),
            ]);

            DB::table('produk_harga')->where('product_id', $id)->delete();

            $kategoriList = $request->input('harga_kategori');
            $hargaList = $request->input('harga_nilai');

            foreach ($kategoriList as $index => $kategori) {
                DB::table('produk_harga')->insert([
                    'product_id' => $id,
                    'kategori' => $kategori,
                    'harga' => preg_replace('/[^\d]/', '', $hargaList[$index]),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            return redirect('/admin/produk')->with('success', 'Produk berhasil diperbarui.');
        } catch (\Exception $e) {
            Log::error('Gagal update produk: ' . $e->getMessage());
            return redirect('/admin/produk')->with('error', 'Gagal memperbarui produk.');
        }
    }


    public function destroy($id)
    {
        try {
            $produk = DB::table('m_produk')->where('id', $id)->first();

            if (!$produk) {
                return redirect('/admin/produk')->with('error', 'Produk tidak ditemukan.');
            }

            if ($produk->gambar && Storage::disk('public')->exists($produk->gambar)) {
                Storage::disk('public')->delete($produk->gambar);
            }

            DB::table('m_produk')->where('id', $id)->delete();

            return redirect('/admin/produk')->with('success', 'Produk berhasil dihapus.');
        } catch (\Exception $e) {
            Log::error('Gagal hapus produk: ' . $e->getMessage());
            return redirect('/admin/produk')->with('error', 'Gagal menghapus produk.');
        }
    }
}
