<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Produk;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $produk = Produk::with('harga')->where('status', 'ACTIVE')->get();
        $artikels = Artikel::latest()->take(5)->get();
        return view('welcome', compact('produk', 'artikels'));
    }
}
