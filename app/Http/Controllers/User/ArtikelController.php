<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    public function index()
    {
        $totalArtikels = Artikel::where('is_published', '1')->count();
        $artikels = Artikel::where('is_published', '1')->paginate($totalArtikels);
        return view('users.artikel.index', compact('artikels'));
    }

    public function show($slug)
    {
        $artikel = Artikel::where('slug', $slug)->where('is_published', '1')->firstOrFail();
        return view('users.artikel.show', compact('artikel'));
    }
}