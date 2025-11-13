<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArtikelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('admin.master-artikel.index');
    }

    public function getListArtikel()
    {
        $listArtikel = DB::table('m_artikel')
            ->leftJoin('users', 'm_artikel.user_id', '=', 'users.id')
            ->select(
                'm_artikel.id',
                'm_artikel.judul',
                'm_artikel.kategori',
                'users.name as penulis',
                'm_artikel.is_published'
            )
            ->get();

        return response()->json($listArtikel);
    }
    public function create()
    {
        return view('admin.master-artikel.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $thumbnailPath = null;

        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = $request->file('thumbnail')->store('thumbnail_artikel', 'public');
        }

        DB::beginTransaction();
        try {
            DB::table('m_artikel')->insert([
                'judul' => $request->judul,
                'slug' => Str::slug($request->judul),
                'thumbnail' => $thumbnailPath,
                'user_id' => Auth::user()->id ?? 1, 
                'ringkasan' => $request->ringkasan,
                'isi' => $request->isi,
                'kategori' => $request->kategori,
                'meta_title' => $request->meta_title,
                'meta_description' => $request->meta_description,
                'is_published' => $request->is_published,
                'published_at' => $request->is_published ? now() : null,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::commit();
            return redirect('/admin/artikel')->with('success', 'Artikel berhasil ditambahkan.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Gagal insert artikel: ' . $e->getMessage());
            return redirect('/admin/artikel')->with('error', 'Gagal menambahkan artikel.');
        }
    }
    public function edit($id)
    {
        $artikel = DB::table('m_artikel')->where('id', $id)->first();

        if (!$artikel) {
            return redirect('/admin/artikel')->with('error', 'Artikel tidak ditemukan.');
        }

        return view('admin.master-artikel.edit', compact('artikel'));
    }

    public function update(Request $request, $id)
    {
        $artikel = DB::table('m_artikel')->where('id', $id)->first();

        if (!$artikel) {
            return redirect('/admin/artikel')->with('error', 'Artikel tidak ditemukan.');
        }

        $thumbnailPath = $artikel->thumbnail;

        if ($request->hasFile('thumbnail')) {
            if ($thumbnailPath && Storage::disk('public')->exists($thumbnailPath)) {
                Storage::disk('public')->delete($thumbnailPath);
            }

            $thumbnailPath = $request->file('thumbnail')->store('thumbnail_artikel', 'public');
        }

        DB::beginTransaction();
        try {
            DB::table('m_artikel')->where('id', $id)->update([
                'judul' => $request->judul,
                'kategori' => $request->kategori,
                'ringkasan' => $request->ringkasan,
                'isi' => $request->isi,
                'meta_title' => $request->meta_title,
                'meta_description' => $request->meta_description,
                'is_published' => $request->is_published,
                'thumbnail' => $thumbnailPath,
                'updated_at' => now(),
            ]);

            DB::commit();
            return redirect('/admin/artikel')->with('success', 'Artikel berhasil diperbarui.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Gagal update artikel: ' . $e->getMessage());
            return redirect('/admin/artikel')->with('error', 'Gagal memperbarui artikel.');
        }
    }
    public function destroy($id)
    {
        try {
            $artikel = DB::table('m_artikel')->where('id', $id)->first();

            if (!$artikel) {
                return redirect('/admin/artikel')->with('error', 'Artikel tidak ditemukan.');
            }

            // Hapus thumbnail jika ada
            if ($artikel->thumbnail && Storage::disk('public')->exists($artikel->thumbnail)) {
                Storage::disk('public')->delete($artikel->thumbnail);
            }

            DB::table('m_artikel')->where('id', $id)->delete();

            return redirect('/admin/artikel')->with('success', 'Artikel berhasil dihapus.');
        } catch (\Exception $e) {
            Log::error('Gagal hapus artikel: ' . $e->getMessage());
            return redirect('/admin/artikel')->with('error', 'Gagal menghapus artikel.');
        }
    }

}
