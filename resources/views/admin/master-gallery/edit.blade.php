@extends('layouts.admin-app')

@section('title', 'Edit Gallery')

@section('content')
<h3 class="text-bold">Edit Gallery</h3>

<div class="col-xl">
  <div class="card">
    <div class="card-body">
      <form action="{{ route('gallery.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-6">
          <label class="form-label" for="judul">Judul Gallery</label>
          <div class="input-group input-group-merge">
            <span class="input-group-text"><i class="bx bx-image-add"></i></span>
            <input type="text" class="form-control" id="judul" name="judul"
              value="{{ old('judul', $gallery->judul) }}" required>
          </div>
        </div>

        <div class="mb-6 mt-3">
          <label class="form-label" for="kategori">Kategori Gallery</label>
          <div class="input-group input-group-merge">
            <span class="input-group-text"><i class="bx bx-category"></i></span>
            <select class="form-select" id="kategori" name="kategori" required>
              <option value="Testimoni" {{ $gallery->kategori == 'Testimoni' ? 'selected' : '' }}>Testimoni</option>
              <option value="Foto" {{ $gallery->kategori == 'Foto' ? 'selected' : '' }}>Foto</option>
            </select>
          </div>
        </div>

        <div class="mb-6">
          <label class="form-label" for="gambar">Gambar</label>
          <div class="input-group input-group-merge mb-2">
            <span class="input-group-text"><i class="bx bx-image"></i></span>
            <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*">
          </div>

          @if($gallery->gambar)
            <div class="mt-2">
              <p>Gambar saat ini:</p>
              <img src="{{ asset('storage/' . $gallery->gambar) }}" alt="Gambar" width="150" class="rounded">
            </div>
          @endif
        </div>

        <div class="mb-6">
          <label class="form-label" for="deskripsi">Deskripsi</label>
          <div class="input-group input-group-merge">
            <span class="input-group-text"><i class="bx bx-text"></i></span>
            <textarea class="form-control" id="deskripsi" name="deskripsi"
              rows="4">{{ old('deskripsi', $gallery->deskripsi) }}</textarea>
          </div>
        </div>

        <div class="mb-6">
          <label class="form-label" for="lokasi">Lokasi</label>
          <div class="input-group input-group-merge">
            <span class="input-group-text"><i class="bx bx-map"></i></span>
            <input type="text" class="form-control" id="lokasi" name="lokasi"
              value="{{ old('lokasi', $gallery->lokasi) }}" placeholder="Masukkan Lokasi (opsional)">
          </div>
        </div>

        <div class="mb-6">
          <label class="form-label" for="tanggal_event">Tanggal Event</label>
          <div class="input-group input-group-merge">
            <span class="input-group-text"><i class="bx bx-calendar"></i></span>
            <input type="date" class="form-control" id="tanggal_event" name="tanggal_event"
              value="{{ old('tanggal_event', $gallery->tanggal_event) }}">
          </div>
        </div>

        <div class="mb-6">
          <label class="form-label" for="is_published">Status Gallery</label>
          <div class="input-group input-group-merge">
            <span class="input-group-text"><i class="bx bx-toggle-left"></i></span>
            <select class="form-select" id="is_published" name="is_published">
              <option value="0" {{ $gallery->is_published == 0 ? 'selected' : '' }}>Draft</option>
              <option value="1" {{ $gallery->is_published == 1 ? 'selected' : '' }}>Publish</option>
            </select>
          </div>
        </div>

        <div style="text-align: center; margin-top: 50px;">
          <button type="submit" class="btn btn-submit">Update</button>
        </div>
      </form>

      <div style="text-align: center; margin-top: 10px;">
        <a href="{{ url('/admin/gallery') }}"><button class="btn btn-batal">Batal</button></a>
      </div>
    </div>
  </div>
</div>
@endsection
