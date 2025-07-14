@extends('layouts.users-app')

@section('title', 'Profile Saya')

@section('content')
<section class="section section-profile">
  <div class="container">
    <h2 class="text-center mb-4 fw-bold text-blue">Profile Saya</h2>
    <hr>

    <div class="row justify-content-center">
      <div class="col-md-10">
        <form action="{{ route('profile.update', $user->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')

          <div class="card mb-4">
            <div class="card-body">
              <div class="d-flex align-items-start gap-4 pb-4 border-bottom">
                <img
                  src="{{ $user->foto_profil && file_exists(storage_path('app/public/' . $user->foto_profil)) ? asset('storage/' . $user->foto_profil) : asset('assets/default_avatars.jpg') }}"
                  alt="Foto Profil"
                  class="rounded"
                  width="100" height="100"
                />

                <div class="w-100">
                  <label for="foto_profil" class="form-label">Ubah Foto Profil</label>
                  <input class="form-control" type="file" id="foto_profil" name="foto_profil" />
                </div>
              </div>
            </div>

            <div class="card-body pt-4">
              @php
                $fields = [
                  'name' => 'Nama',
                  'nohp' => 'No. HP',
                  'email' => 'Email',
                  'jenis_kelamin' => 'Jenis Kelamin',
                  'status' => 'Status',
                  'alamat' => 'Alamat',
                  'provinsi' => 'Provinsi',
                  'kota' => 'Kota',
                  'kecamatan' => 'Kecamatan',
                  'kelurahan' => 'Kelurahan',
                  'RT' => 'RT',
                  'RW' => 'RW',
                  'kode_pos' => 'Kode Pos'
                ];
              @endphp

              <div class="row g-3">
                @foreach ($fields as $field => $label)
                    <div class="col-md-6">
                        <label for="{{ $field }}" class="form-label">{{ $label }}</label>

                        @if ($field === 'jenis_kelamin')
                        <select class="form-select" id="{{ $field }}" name="{{ $field }}">
                            <option value="Laki-laki" {{ old($field, $user->$field) === 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="Perempuan" {{ old($field, $user->$field) === 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                        </select>

                        @elseif ($field === 'status')
                        <select class="form-select" id="{{ $field }}" name="{{ $field }}">
                            <option value="Aktif" {{ old($field, $user->$field) === 'Aktif' ? 'selected' : '' }}>Aktif</option>
                            <option value="Tidak Aktif" {{ old($field, $user->$field) === 'Tidak Aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                        </select>

                        @elseif ($field === 'email')
                        <input
                            class="form-control"
                            type="text"
                            id="{{ $field }}"
                            name="{{ $field }}"
                            value="{{ old($field, $user->$field) }}"
                            disabled
                        />

                        @else
                        <input
                            class="form-control"
                            type="text"
                            id="{{ $field }}"
                            name="{{ $field }}"
                            value="{{ old($field, $user->$field) }}"
                        />
                        @endif
                    </div>
                    @endforeach

                <div class="col-md-6">
                  <label for="password" class="form-label">Password (kosongkan jika tidak diganti)</label>
                  <input class="form-control" type="password" id="password" name="password" placeholder="Masukkan Password Baru" />
                </div>
                <div class="col-md-6">
                  <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                  <input class="form-control" type="password" id="password_confirmation" name="password_confirmation" placeholder="Ulangi Password" />
                </div>
              </div>

              <div class="mt-4">
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
@endsection
