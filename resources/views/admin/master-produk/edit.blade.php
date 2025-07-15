@extends('layouts.admin-app')

@section('title', 'Edit Produk')

@section('content')
<h3 class="text-bold">Edit Produk</h3>

<div class="col-xl">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('produk.update', $produk->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-6">
                    <label class="form-label">Nama Produk</label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text"><i class="icon-base bx bx-package"></i></span>
                        <input type="text" class="form-control" name="nama" value="{{ $produk->nama }}" />
                    </div>
                </div>
                <div class="mb-6 mt-3">
                    <label class="form-label">Kategori Produk</label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text"><i class="icon-base bx bx-grid-alt"></i></span>
                        <select class="form-select" name="kategori" required>
                            <option value="Box" {{ $produk->kategori == 'Box' ? 'selected' : '' }}>Box</option>
                            <option value="Seserahan" {{ $produk->kategori == 'Seserahan' ? 'selected' : '' }}>Seserahan</option>
                        </select>
                    </div>
                </div>

                <div class="mb-6">
                    <label class="form-label">Stok Produk</label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text"><i class="icon-base bx-bar-chart"></i></span>
                        <input type="number" class="form-control" name="stok" value="{{ $produk->stok }}" />
                    </div>
                </div>

                <div class="mb-6">
                    <label class="form-label">Upload Gambar Produk</label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text"><i class="icon-base bx bx-image"></i></span>
                        <input type="file" class="form-control" name="gambar" accept="image/*" />
                    </div>
                    @if ($produk->gambar)
                        <img src="{{ asset('storage/' . $produk->gambar) }}" alt="Gambar" class="mt-2" width="120">
                    @endif
                </div>

                <div class="mb-6">
                    <label class="form-label">Deskripsi Produk</label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text"><i class="icon-base bx bx-text"></i></span>
                        <textarea class="form-control" name="deskripsi" rows="7">{{ $produk->deskripsi }}</textarea>
                    </div>
                </div>

                <div class="mb-6">
                    <label class="form-label">Status Produk</label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text"><i class="icon-base bx bx-toggle-left"></i></span>
                        <select class="form-select" name="status">
                            <option value="ACTIVE" {{ $produk->status === 'ACTIVE' ? 'selected' : '' }}>Active</option>
                            <option value="INACTIVE" {{ $produk->status === 'INACTIVE' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                </div>

                <div class="mb-6">
                    <label class="form-label">Daftar Harga per Layanan</label>
                    <div id="hargaWrapper">
                        @foreach ($produk->harga as $harga)
                        <div class="row mb-2 harga-item">
                            <div class="col-md-6">
                                <select name="harga_layanan[]" class="form-select" required>
                                    <option value="" disabled>Pilih Layanan</option>
                                    <option value="Sewa + Jasa Hias" {{ $harga->layanan == 'Sewa + Jasa Hias' ? 'selected' : '' }}>Sewa + Jasa Hias</option>
                                    <option value="Sewa Box" {{ $harga->layanan == 'Sewa Box' ? 'selected' : '' }}>Sewa Box</option>
                                    <option value="Jasa" {{ $harga->layanan == 'Jasa' ? 'selected' : '' }}>Jasa</option>
                                    <option value="Beli" {{ $harga->layanan == 'Beli' ? 'selected' : '' }}>Beli</option>
                                </select>
                            </div>
                            <div class="col-md-5">
                                <input type="text" class="form-control harga-input" name="harga_nilai[]" value="{{ number_format($harga->harga, 0, ',', '.') }}" required>
                            </div>
                            <div class="col-md-1 d-flex align-items-center">
                                <button type="button" class="btn btn-danger btn-sm removeHarga"><i class="bx bx-trash"></i></button>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <button type="button" class="btn btn-secondary btn-sm mt-2" id="tambahHarga">+ Tambah Layanan</button>
                </div>

                <div style="text-align: center; margin-top: 50px;">
                    <button type="submit" class="btn btn-submit">Update</button>
                </div>
            </form>
            <div style="text-align: center; margin-top: 10px;">
                <a href="{{ url('/admin/produk') }}"><button class="btn btn-batal">Batal</button></a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function formatRupiah(angka) {
        let number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            let separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        return 'Rp ' + rupiah;
    }

    function cleanNumber(str) {
        return str.replace(/[^\d]/g, '');
    }

    document.addEventListener('input', function(e) {
        if (e.target.classList.contains('harga-input')) {
            let angka = cleanNumber(e.target.value);
            e.target.value = formatRupiah(angka);
        }
    });

    document.getElementById('tambahHarga').addEventListener('click', function () {
        const wrapper = document.getElementById('hargaWrapper');
        const newField = document.createElement('div');
        newField.className = 'row mb-2 harga-item';
        newField.innerHTML = `
            <div class="col-md-6">
                <select name="harga_layanan[]" class="form-select" required>
                    <option value="" disabled selected>Pilih Layanan</option>
                    <option value="Sewa + Jasa Hias">Sewa + Jasa Hias</option>
                    <option value="Sewa Box">Sewa Box</option>
                    <option value="Jasa">Jasa</option>
                    <option value="Beli">Beli</option>
                </select>
            </div>
            <div class="col-md-5">
                <input type="text" class="form-control harga-input" name="harga_nilai[]" placeholder="Masukkan Harga" required>
            </div>
            <div class="col-md-1 d-flex align-items-center">
                <button type="button" class="btn btn-danger btn-sm removeHarga"><i class="bx bx-trash"></i></button>
            </div>`;
        wrapper.appendChild(newField);
    });

    document.addEventListener('click', function (e) {
        if (e.target.closest('.removeHarga')) {
            e.target.closest('.harga-item').remove();
        }
    });
</script>
@endsection
