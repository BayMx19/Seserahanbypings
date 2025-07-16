<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Keranjang;
use App\Models\ProdukHarga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KeranjangController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user()->id;
        $keranjangItems = Keranjang::with(['produk', 'layananHarga']) // relasi eager load
            ->where('pembeli_id', $user)
            ->where('status', 'Belum Checkout')
            ->get();
        return view('/users/keranjang/index', compact('keranjangItems'));
    }
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'produk_id' => 'required|exists:m_produk,id',
            'layanan_harga_id' => 'required|exists:produk_harga,id',
            'qty' => 'required|integer|min:1',
        ]);
        $user = Auth::user()->id;

        $layananBaru = ProdukHarga::findOrFail($request->layanan_harga_id);
        $layananBaru = $layananBaru->layanan;
        $keranjangItems = Keranjang::with('layananHarga')
            ->where('pembeli_id', $user)
            ->where('status', 'Belum Checkout')
            ->get();
        $layananKeranjang = $keranjangItems->pluck('layananHarga.layanan')->unique();
        $jenisBaru = in_array($layananBaru, ['Sewa + Jasa Hias', 'Sewa Box']) ? 'Sewa' : 'Beli';
        $jenisKeranjang = $layananKeranjang->map(function ($layanan) {
            return in_array($layanan, ['Sewa + Jasa Hias', 'Sewa Box']) ? 'Sewa' : 'Beli';
        })->unique();
        if ($jenisKeranjang->count() > 0 && !$jenisKeranjang->contains($jenisBaru)) {
            return response()->json([
                'success' => false,
                'message' => 'Tidak bisa mencampur layanan "Sewa" dan "Beli" dalam satu keranjang. Silakan selesaikan transaksi yang sedang berjalan terlebih dahulu.'
            ]);
        }
        $keranjang = Keranjang::create([
            'produk_id' => $request->produk_id,
            'layanan_harga_id' => $request->layanan_harga_id,
            'qty' => $request->qty,
            'pembeli_id' => $user,
            'status' => 'Belum Checkout',
        ]);
        return response()->json([
            'success' => true,
            'message' => 'Produk berhasil ditambahkan ke keranjang.',
            'keranjang' => $keranjang,
        ]);
    }

    public function destroy($id)
    {
        $keranjang = Keranjang::findOrFail($id);
        if ($keranjang->pembeli_id !== Auth::user()->id) {
            abort(403, 'Akses ditolak.');
        }
        $keranjang->delete();
        return redirect()->back()->with('success', 'Item berhasil dihapus dari keranjang.');
    }
}
