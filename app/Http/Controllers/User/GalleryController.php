<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $testimoni = Gallery::where('kategori', 'testimoni')->where('is_published', true)->latest()->get();
        $foto = Gallery::where('kategori', 'foto')->where('is_published', true)->latest()->get();

        return view('users.gallery.index', compact('testimoni', 'foto'));
    }
}