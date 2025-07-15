<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $produk = Produk::with('harga')->where('status', 'ACTIVE')->get();
        return view('welcome', compact('produk'));
    }
}
