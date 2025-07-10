@extends('layouts.admin-app')

@section('title', 'Edit Users')

@section('content')
<h3 class="text-bold">Edit Users</h3>
<div class="col-xl">
  <div class="card">
    <div class="card-body">
      <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Nama --}}
        <div class="mb-6">
          <label class="form-label" for="name">Nama</label>
          <div class="input-group input-group-merge">
            <span class="input-group-text"><i class="icon-base bx bx-user"></i></span>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" placeholder="Masukkan Nama Anda" />
          </div>
        </div>

        {{-- No HP --}}
        <div class="mb-6">
          <label class="form-label" for="nohp">No. HP</label>
          <div class="input-group input-group-merge">
            <span class="input-group-text"><i class="icon-base bx bx-phone"></i></span>
            <input type="number" id="nohp" class="form-control" name="nohp" value="{{ old('nohp', $user->nohp) }}" placeholder="Masukkan No. HP" />
          </div>
        </div>

        {{-- Role --}}
        <div class="mb-6">
          <label class="form-label" for="role">Role</label>
          <div class="input-group input-group-merge">
            <span class="input-group-text"><i class="icon-base bx bx-shield-quarter"></i></span>
            <select class="form-select" id="role" name="role">
              <option disabled {{ $user->role ? '' : 'selected' }}>Pilih Role</option>
              <option value="Admin" {{ $user->role == 'Admin' ? 'selected' : '' }}>Admin</option>
              <option value="User" {{ $user->role == 'User' ? 'selected' : '' }}>User</option>
            </select>
          </div>
        </div>

        {{-- Email --}}
        <div class="mb-6">
          <label class="form-label" for="email">Email</label>
          <div class="input-group input-group-merge">
            <span class="input-group-text"><i class="icon-base bx bx-envelope"></i></span>
            <input type="text" id="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" placeholder="Masukkan Email Anda" />
          </div>
        </div>

        {{-- Password (opsional) --}}
        <div class="mb-6">
          <label class="form-label" for="password">Password (Biarkan kosong jika tidak diganti)</label>
          <div class="input-group input-group-merge">
            <span class="input-group-text"><i class="icon-base bx bx-key"></i></span>
            <input type="password" id="password" name="password" class="form-control" placeholder="Masukkan Password Baru" />
          </div>
        </div>

        {{-- Konfirmasi Password --}}
        <div class="mb-6">
          <label class="form-label" for="password_confirmation">Konfirmasi Password</label>
          <div class="input-group input-group-merge">
            <span class="input-group-text"><i class="icon-base bx bx-key"></i></span>
            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Masukkan Konfirmasi Password" />
          </div>
        </div>

        {{-- Jenis Kelamin --}}
        <div class="mb-6">
          <label class="form-label" for="jenis_kelamin">Jenis Kelamin</label>
          <div class="input-group input-group-merge">
            <span class="input-group-text"><i class="icon-base bx bx-male-female"></i></span>
            <select class="form-select" id="jenis_kelamin" name="jenis_kelamin">
              <option disabled {{ $user->jenis_kelamin ? '' : 'selected' }}>Pilih Jenis Kelamin</option>
              <option value="Laki-Laki" {{ $user->jenis_kelamin == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
              <option value="Perempuan" {{ $user->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>
          </div>
        </div>

        {{-- Status --}}
        <div class="mb-6">
          <label class="form-label" for="status">Status</label>
          <div class="input-group input-group-merge">
            <span class="input-group-text"><i class="icon-base bx bx-toggle-left"></i></span>
            <select class="form-select" id="status" name="status">
              <option disabled {{ $user->status ? '' : 'selected' }}>Pilih Status</option>
              <option value="ACTIVE" {{ $user->status == 'ACTIVE' ? 'selected' : '' }}>Active</option>
              <option value="INACTIVE" {{ $user->status == 'INACTIVE' ? 'selected' : '' }}>Inactive</option>
            </select>
          </div>
        </div>

        {{-- Alamat dan lainnya --}}
        @php
          $fields = ['alamat', 'provinsi', 'kota', 'kecamatan', 'kelurahan', 'RT', 'RW', 'kode_pos'];
        @endphp
        <div class="row">
          @foreach ($fields as $field)
            <div class="col-md-6 mb-6">
              <label class="form-label" for="{{ $field }}">{{ ucfirst(str_replace('_', ' ', $field)) }}</label>
              <input class="form-control" id="{{ $field }}" name="{{ $field }}" value="{{ old($field, $user->$field) }}" placeholder="Masukkan {{ ucfirst(str_replace('_', ' ', $field)) }} Anda" />
            </div>
          @endforeach
        </div>

        {{-- Foto Profil --}}
        <div class="mb-6">
          <label for="foto_profil" class="form-label">Foto Profil</label>
          <input class="form-control" type="file" id="foto_profil" name="foto_profil" />
            @if ($user->foto_profil)
                <div class="mb-3">
                    <label class="form-label d-block">Foto Sebelumnya</label>
                    <img src="{{ asset('storage/' . $user->foto_profil) }}" alt="Foto Profil" width="120">
                </div>
            @endif
        </div>

        {{-- Tombol --}}
        <div style="text-align: center; margin-top: 50px;">
          <button type="submit" class="btn btn-submit">Update</button>
        </div>
      </form>

      <div style="text-align: center; margin-top: 10px;">
        <a href="{{ route('users.index') }}"><button class="btn btn-batal">Batal</button></a>
      </div>
    </div>
  </div>
</div>
@endsection
