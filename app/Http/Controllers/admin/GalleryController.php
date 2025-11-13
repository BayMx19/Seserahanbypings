<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('admin.master-gallery.index');
    }

    public function getListGallery()
    {
        $listGallery = DB::table('m_gallery')
            ->leftJoin('users', 'm_gallery.user_id', '=', 'users.id')
            ->select(
                'm_gallery.id',
                'm_gallery.judul',
                'm_gallery.kategori',
                'users.name as penulis',
                'm_gallery.is_published'
            )
            ->get();

        return response()->json($listGallery);
    }
    public function create()
    {
        return view('admin.master-gallery.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required|string|in:Testimoni,Foto',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'deskripsi' => 'nullable|string',
            'lokasi' => 'nullable|string|max:255',
            'tanggal_event' => 'nullable|date',
            'is_published' => 'required|boolean',
        ]);

        $gambarPath = null;

        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('gallery', 'public');
        }

        DB::beginTransaction();
        try {
            DB::table('m_gallery')->insert([
                'judul' => $request->judul,
                'kategori' => $request->kategori,
                'deskripsi' => $request->deskripsi,
                'gambar' => $gambarPath,
                'lokasi' => $request->lokasi,
                'tanggal_event' => $request->tanggal_event,
                'user_id' => Auth::user()->id ?? 1,
                'is_published' => $request->is_published,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::commit();
            return redirect('/admin/gallery')->with('success', 'Gallery berhasil ditambahkan.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Gagal insert gallery: ' . $e->getMessage());
            return redirect('/admin/gallery')->with('error', 'Gagal menambahkan gallery.');
        }
    }
    public function edit($id)
    {
        $gallery = DB::table('m_gallery')->where('id', $id)->first();

        if (!$gallery) {
            return redirect('/admin/gallery')->with('error', 'Gallery tidak ditemukan.');
        }

        return view('admin.master-gallery.edit', compact('gallery'));
    }

    public function update(Request $request, $id)
    {
        $gallery = DB::table('m_gallery')->where('id', $id)->first();

        if (!$gallery) {
            return redirect('/admin/gallery')->with('error', 'Gallery tidak ditemukan.');
        }

        $gambarPath = $gallery->gambar;

        if ($request->hasFile('gambar')) {
            if ($gambarPath && Storage::disk('public')->exists($gambarPath)) {
                Storage::disk('public')->delete($gambarPath);
            }

            $gambarPath = $request->file('gambar')->store('gallery', 'public');
        }

        DB::beginTransaction();
        try {
            DB::table('m_gallery')->where('id', $id)->update([
                'judul' => $request->judul,
                'kategori' => $request->kategori,
                'deskripsi' => $request->deskripsi,
                'lokasi' => $request->lokasi,
                'tanggal_event' => $request->tanggal_event,
                'is_published' => $request->is_published,
                'gambar' => $gambarPath,
                'updated_at' => now(),
            ]);

            DB::commit();
            return redirect('/admin/gallery')->with('success', 'Gallery berhasil diperbarui.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Gagal update gallery: ' . $e->getMessage());
            return redirect('/admin/gallery')->with('error', 'Gagal memperbarui gallery.');
        }
    }
    public function destroy($id)
    {
        try {
            $gallery = DB::table('m_gallery')->where('id', $id)->first();

            if (!$gallery) {
                return redirect('/admin/gallery')->with('error', 'Gallery tidak ditemukan.');
            }

            // Hapus file gambar jika ada
            if ($gallery->gambar && Storage::disk('public')->exists($gallery->gambar)) {
                Storage::disk('public')->delete($gallery->gambar);
            }

            DB::table('m_gallery')->where('id', $id)->delete();

            return redirect('/admin/gallery')->with('success', 'Gallery berhasil dihapus.');
        } catch (\Exception $e) {
            Log::error('Gagal hapus gallery: ' . $e->getMessage());
            return redirect('/admin/gallery')->with('error', 'Gagal menghapus gallery.');
        }
    }

}
