<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Artikel;
use App\Models\Gallery;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $produk = Produk::with('harga')->where('status', 'ACTIVE')->get();
        $artikels = Artikel::where('is_published', '1')->latest()->take(5)->get();
        return view('welcome', compact('produk', 'artikels'));
    }

    public function artikel()
    {
        $totalArtikels = Artikel::where('is_published', '1')->count();
        $artikels = Artikel::where('is_published', '1')->paginate($totalArtikels);
        return view('artikel', compact('artikels'));
    }

    public function artikelShow($slug)
    {
        $artikel = Artikel::where('slug', $slug)->where('is_published', '1')->firstOrFail();
        return view('artikel-show', compact('artikel'));
    }

    public function gallery()
    {
        $testimoni = Gallery::where('kategori', 'testimoni')->where('is_published', true)->latest()->get();
        $foto = Gallery::where('kategori', 'foto')->where('is_published', true)->latest()->get();
        return view('gallery', compact('testimoni', 'foto'));
    }
}