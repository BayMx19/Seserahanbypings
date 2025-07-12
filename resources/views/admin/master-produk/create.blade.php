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
                        id="nama_produk"
                        name="nama_produk"
                        placeholder="Masukkan Nama Produk"
                        />
                    </div>
                </div>
                <div class="mb-6">
                    <label class="form-label" for="name">Harga Jual Produk</label>
                    <div class="input-group input-group-merge">
                    <span class="input-group-text"><i class="icon-base bx bx-money"></i></span>
                    <input
                        type="text"
                        class="form-control"
                        id="harga_jual"
                        placeholder="Masukkan Harga Jual Produk"
                        />
                     <input type="hidden" id="harga_jual_hidden" name="harga_jual">
                    </div>
                </div>
                <div class="mb-6">
                    <label class="form-label" for="name">Harga Sewa Produk</label>
                    <div class="input-group input-group-merge">
                    <span class="input-group-text"><i class="icon-base bx bx-money"></i></span>
                    <input
                        type="text"
                        class="form-control"
                        id="harga_sewa"
                        name="harga_sewa"
                        placeholder="Masukkan Harga Sewa Produk"
                        />
                    <input type="hidden" id="harga_sewa_hidden" name="harga_sewa">
                    </div>
                </div>
                <div class="mb-6">
                    <label class="form-label" for="role">Kategori Produk</label>
                    <div class="input-group input-group-merge">
                    <span  class="input-group-text"><i class="icon-base bx bx-purchase-tag"></i></span>
                    <select
                        class="form-select"
                        id="kategori"
                        name="kategori"
                        >
                        <option value="" disabled selected>Pilih Kategori</option>
                        <option value="Seserahan">Seserahan</option>
                        <option value="Mahar">Mahar</option>
                        <option value="Box">Box</option>
                    </select>
                    </div>
                </div>
                <div class="mb-6">
                    <label class="form-label" for="nohp">Stok Produk Tersedia</label>
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
                        <select class="form-select" id="status_produk" name="status_produk">
                            <option value="" disabled selected>Pilih Status</option>
                            <option value="ACTIVE">Active</option>
                            <option value="INACTIVE">Inactive</option>
                        </select>
                    </div>
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
    // Fungsi untuk format angka menjadi Rp
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

        rupiah = split[1] !== undefined ? rupiah + ',' + split[1] : rupiah;
        return 'Rp ' + rupiah;
    }

    // Fungsi untuk mengambil angka murni (tanpa Rp dan titik)
    function cleanNumber(str) {
        return str.replace(/[^\d]/g, '');
    }

    // Fungsi utama: pasang pada input dan hidden
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

    // Aktifkan untuk input harga jual & harga sewa
    handleRupiahInput('harga_jual', 'harga_jual_hidden');
    handleRupiahInput('harga_sewa', 'harga_sewa_hidden');
</script>

@endsection