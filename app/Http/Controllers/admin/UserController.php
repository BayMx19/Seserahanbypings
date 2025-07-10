<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $users = User::all();
        // dd($users);
        return view('admin.master-users.index', compact('users'));
    }
    public function create()
    {
        return view('admin.master-users.create');
    }

    public function store(Request $request)
    { 
 
        $fotoProfilPath = null;
        if ($request->hasFile('foto_profil')) {
            $fotoProfilPath = $request->file('foto_profil')->store('foto_profil', 'public');
            
        }

        try {
           
            DB::table('users')->insert([
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'name' => $request->name,
                'nohp' => $request->nohp,
                'role' => $request->role,
                'status' => $request->status,
                'jenis_kelamin' => $request->jenis_kelamin,
                'alamat' => $request->alamat,
                'provinsi' => $request->provinsi,
                'kota' => $request->kota,
                'kecamatan' => $request->kecamatan,
                'kelurahan' => $request->kelurahan,
                'RT' => $request->RT,
                'RW' => $request->RW,
                'kode_pos' => $request->kode_pos,
                'foto_profil' => $fotoProfilPath,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return redirect('/admin/users')->with('success', 'User berhasil ditambahkan.');
        } catch (QueryException $e) {
             Log::error('Gagal insert user: ' . $e->getMessage());
                return redirect('/admin/users')->with('error', 'Gagal menambahkan User.');
        }
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.master-users.edit', compact('user'));
    }

    // Proses update data user
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Update data biasa
        $user->name = $request->name;
        $user->nohp = $request->nohp;
        $user->role = $request->role;
        $user->email = $request->email;
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->status = $request->status;
        $user->alamat = $request->alamat;
        $user->provinsi = $request->provinsi;
        $user->kota = $request->kota;
        $user->kecamatan = $request->kecamatan;
        $user->kelurahan = $request->kelurahan;
        $user->RT = $request->RT;
        $user->RW = $request->RW;
        $user->kode_pos = $request->kode_pos;

        // Jika ada password baru, update password
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        // Jika ada upload foto baru
        if ($request->hasFile('foto_profil')) {
            // Hapus foto lama jika ada
            if ($user->foto_profil && Storage::exists('public/' . $user->foto_profil)) {
                Storage::delete('public/' . $user->foto_profil);
            }

            // Simpan foto baru
            $fotoPath = $request->file('foto_profil')->store('foto_profil', 'public');
            $user->foto_profil = $fotoPath;
        }

        $user->save();

        return redirect()->route('users.index')->with('success', 'Data user berhasil diperbarui.');
    }
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        if ($user->foto_profil && Storage::exists('public/' . $user->foto_profil)) {
            Storage::delete('public/' . $user->foto_profil);
        }

        $user->delete();

        return redirect()->route('users.index')->with('success', 'Data user berhasil dihapus.');
    }


}
