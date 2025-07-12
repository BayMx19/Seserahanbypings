<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produk;

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
        $listProduk = Produk::select('id', 'nama_produk', 'stok', 'kategori', 'status_produk')->get();

        return response() ->json($listProduk);
    }
}
