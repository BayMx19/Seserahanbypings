@extends('layouts.admin-app')

@section('title', 'Tambah Artikel')

@section('content')
<h3 class="text-bold">Tambah Artikel</h3>

<div class="col-xl">
  <div class="card">
    <div class="card-body">
      <form action="{{ route('artikel.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-6">
          <label class="form-label" for="judul">Judul Artikel</label>
          <div class="input-group input-group-merge">
            <span class="input-group-text"><i class="bx bx-news"></i></span>
            <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukkan Judul Artikel" required>
          </div>
        </div>

        <div class="mb-6 mt-3">
          <label class="form-label" for="kategori">Kategori Artikel</label>
          <div class="input-group input-group-merge">
            <span class="input-group-text"><i class="bx bx-category"></i></span>
            <input type="text" class="form-control" id="kategori" name="kategori" placeholder="Masukkan Kategori Artikel (opsional)">
          </div>
        </div>

        <div class="mb-6">
          <label class="form-label" for="thumbnail">Thumbnail</label>
          <div class="input-group input-group-merge">
            <span class="input-group-text"><i class="bx bx-image"></i></span>
            <input type="file" class="form-control" id="thumbnail" name="thumbnail" accept="image/*">
          </div>
        </div>

        <div class="mb-6">
          <label class="form-label" for="ringkasan">Ringkasan</label>
          <div class="input-group input-group-merge">
            <span class="input-group-text"><i class="bx bx-text"></i></span>
            <textarea class="form-control" id="ringkasan" name="ringkasan" placeholder="Masukkan Ringkasan Artikel (opsional)" rows="4"></textarea>
          </div>
        </div>

        <div class="mb-6">
          <label class="form-label" for="isi">Isi Artikel</label>
          <div class="input-group input-group-merge">
            <span class="input-group-text"><i class="bx bx-detail"></i></span>
            <textarea class="form-control" id="isi" name="isi" placeholder="Masukkan Isi Artikel" rows="10" required></textarea>
          </div>
        </div>

        <div class="mb-6">
          <label class="form-label" for="meta_title">Meta Title (SEO)</label>
          <div class="input-group input-group-merge">
            <span class="input-group-text"><i class="bx bx-search"></i></span>
            <input type="text" class="form-control" id="meta_title" name="meta_title" placeholder="Opsional">
          </div>
        </div>

        <div class="mb-6">
          <label class="form-label" for="meta_description">Meta Description (SEO)</label>
          <div class="input-group input-group-merge">
            <span class="input-group-text"><i class="bx bx-pencil"></i></span>
            <textarea class="form-control" id="meta_description" name="meta_description" placeholder="Opsional" rows="3"></textarea>
          </div>
        </div>

        <div class="mb-6">
          <label class="form-label" for="is_published">Status Artikel</label>
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
        <a href="{{ url('/admin/artikel') }}"><button class="btn btn-batal">Batal</button></a>
      </div>
    </div>
  </div>
</div>
@endsection
