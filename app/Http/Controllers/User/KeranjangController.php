<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Keranjang;
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

        $keranjangItems = Keranjang::with(['produk', 'kategoriHarga']) // relasi eager load
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
            'kategori_harga_id' => 'required|exists:produk_harga,id',
            'qty' => 'required|integer|min:1',
        ]);
        $user = Auth::user()->id;
        $keranjang = Keranjang::create([
            'produk_id' => $request->produk_id,
            'kategori_harga_id' => $request->kategori_harga_id,
            'qty' => $request->qty,
            'pembeli_id' => $user,
            'status' => 'Belum Checkout',
        ]);

        return response()->json([
            'message' => 'Produk berhasil ditambahkan ke keranjang.',
            'keranjang' => $keranjang,
        ]);
    }

    public function destroy($id)
    {
        $keranjang = Keranjang::findOrFail($id);

        // Pastikan hanya pembeli yang punya hak bisa menghapus
        if ($keranjang->pembeli_id !== Auth::user()->id) {
            abort(403, 'Akses ditolak.');
        }

        $keranjang->delete();

        return redirect()->back()->with('success', 'Item berhasil dihapus dari keranjang.');
    }
}
