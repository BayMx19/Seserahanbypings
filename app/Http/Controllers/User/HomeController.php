<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Pesanan;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::id();
        $produk = Produk::with('harga')->where('status', 'ACTIVE')->get();
        $menungguPengembalian = Pesanan::where('pembeli_id', $user)
        ->where('status_pesanan', 'Menunggu Pengembalian')
        ->exists();

        return view('/users/home', compact('produk', 'menungguPengembalian'));
    }
}
