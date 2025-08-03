@extends('layouts.admin-app')

@section('title', 'Tambah Produk')

@section('content')
<h3 class="text-bold">Tambah Produk</h3>

<div class="col-xl">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-6">
                    <label class="form-label" for="name">Nama Produk</label>
                    <div class="input-group input-group-merge">
                    <span class="input-group-text"><i class="icon-base bx bx-package"></i></span>
                    <input
                        type="text"
                        class="form-control"
                        id="nama"
                        name="nama"
                        placeholder="Masukkan Nama Produk"
                        />
                    </div>
                </div>
               <div class="mb-6 mt-3">
                    <label class="form-label" for="kategori">Kategori Produk</label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text"><i class="icon-base bx bx-grid-alt"></i></span>
                        <select class="form-select" id="kategori" name="kategori" required>
                            <option value="" disabled selected>Pilih Kategori</option>
                            <option value="Mahar">Mahar</option>
                            <option value="Seserahan">Seserahan</option>
                        </select>
                    </div>
                </div>
                <div class="mb-6">
                    <label class="form-label" for="nohp">Stok Produk</label>
                    <div class="input-group input-group-merge">
                    <span  class="input-group-text"><i class="icon-base bx-bar-chart"></i></span>
                    <input
                        type="number"
                        id="stok"
                        class="form-control"
                        name="stok"
                        placeholder="Masukkan Jumlah Stok Produk"
                        />
                    </div>
                </div>
                <div class="mb-6">
                    <label class="form-label" for="gambar">Upload Gambar Produk</label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text">
                            <i class="icon-base bx bx-image"></i>
                        </span>
                        <input
                            type="file"
                            class="form-control"
                            id="gambar"
                            name="gambar"
                            accept="image/*"
                        />
                    </div>
                </div>
                <div class="mb-6">
                    <label class="form-label" for="deskripsi">Deskripsi Produk</label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text"><i class="icon-base bx bx-text"></i></span>
                        <textarea
                            class="form-control"
                            id="deskripsi"
                            name="deskripsi"
                            placeholder="Masukkan Deskripsi Produk"
                            rows="7"
                        ></textarea>
                    </div>
                </div>
                <div class="mb-6">
                    <label class="form-label" for="status">Status Produk</label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text"><i class="icon-base bx bx-toggle-left"></i></span>
                        <select class="form-select" id="status" name="status">
                            <option value="" disabled selected>Pilih Status</option>
                            <option value="ACTIVE">Active</option>
                            <option value="INACTIVE">Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="mb-6">
    <label class="form-label">Daftar Harga per Layanan</label>
    <div id="hargaWrapper">
        <div class="row mb-2 harga-item">
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
            </div>
        </div>
    </div>
    <button type="button" class="btn btn-secondary btn-sm mt-2" id="tambahHarga">+ Tambah Layanan</button>
</div>
                <div style="text-align: center; margin-top: 50px;">
                    <button type="submit" class="btn btn-submit">Submit</button>
                </div>
            </form>
            <div style="text-align: center; margin-top: 10px;">
                <a href="{{'/admin/produk'}}"><button class="btn btn-batal" >Batal</button></a>
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
    function handleRupiahInput(inputId, hiddenId) {
        const input = document.getElementById(inputId);
        const hidden = document.getElementById(hiddenId);

        input.addEventListener('input', function () {
            let angka = cleanNumber(this.value);
            this.value = formatRupiah(angka);
            hidden.value = angka;
        });

        input.addEventListener('keypress', function (e) {
            if (!/[0-9]/.test(e.key)) {
                e.preventDefault();
            }
        });
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

    // Tetap aktifkan harga jual dan sewa utama
    handleRupiahInput('harga_jual', 'harga_jual_hidden');
    handleRupiahInput('harga_sewa', 'harga_sewa_hidden');
</script>
@endsection