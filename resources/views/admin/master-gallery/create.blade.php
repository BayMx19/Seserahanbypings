@extends('layouts.admin-app')

@section('title', 'Tambah Gallery')

@section('content')
<h3 class="text-bold">Tambah Gallery</h3>

<div class="col-xl">
  <div class="card">
    <div class="card-body">
      <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-6">
          <label class="form-label" for="judul">Judul Gallery</label>
          <div class="input-group input-group-merge">
            <span class="input-group-text"><i class="bx bx-image-add"></i></span>
            <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukkan Judul Gallery" required>
          </div>
        </div>

        <div class="mb-6 mt-3">
          <label class="form-label" for="kategori">Kategori Gallery</label>
          <div class="input-group input-group-merge">
            <span class="input-group-text"><i class="bx bx-category"></i></span>
            <select class="form-select" id="kategori" name="kategori" required>
              <option value="">-- Pilih Kategori --</option>
              <option value="Testimoni">Testimoni</option>
              <option value="Foto">Foto</option>
            </select>
          </div>
        </div>

        <div class="mb-6">
          <label class="form-label" for="gambar">Gambar</label>
          <div class="input-group input-group-merge">
            <span class="input-group-text"><i class="bx bx-image"></i></span>
            <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*" required>
          </div>
        </div>

        <div class="mb-6">
          <label class="form-label" for="deskripsi">Deskripsi</label>
          <div class="input-group input-group-merge">
            <span class="input-group-text"><i class="bx bx-text"></i></span>
            <textarea class="form-control" id="deskripsi" name="deskripsi" placeholder="Masukkan Deskripsi Gallery (opsional)" rows="4"></textarea>
          </div>
        </div>

        <div class="mb-6">
          <label class="form-label" for="lokasi">Lokasi</label>
          <div class="input-group input-group-merge">
            <span class="input-group-text"><i class="bx bx-map"></i></span>
            <input type="text" class="form-control" id="lokasi" name="lokasi" placeholder="Masukkan Lokasi (opsional)">
          </div>
        </div>

        <div class="mb-6">
          <label class="form-label" for="tanggal_event">Tanggal Event</label>
          <div class="input-group input-group-merge">
            <span class="input-group-text"><i class="bx bx-calendar"></i></span>
            <input type="date" class="form-control" id="tanggal_event" name="tanggal_event">
          </div>
        </div>

        <div class="mb-6">
          <label class="form-label" for="is_published">Status Gallery</label>
          <div class="input-group input-group-merge">
            <span class="input-group-text"><i class="bx bx-toggle-left"></i></span>
            <select class="form-select" id="is_published" name="is_published">
              <option value="0" selected>Draft</option>
              <option value="1">Publish</option>
            </select>
          </div>
        </div>

        <div style="text-align: center; margin-top: 50px;">
          <button type="submit" class="btn btn-submit">Submit</button>
        </div>
      </form>

      <div style="text-align: center; margin-top: 10px;">
        <a href="{{ url('/admin/gallery') }}"><button class="btn btn-batal">Batal</button></a>
      </div>
    </div>
  </div>
</div>
@endsection
