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
                    <label class="form-label" for="name">Nama Produk</label>
                    <div class="input-group input-group-merge">
                    <span class="input-group-text"><i class="icon-base bx bx-package"></i></span>
                    <input
                        type="text"
                        class="form-control"
                        id="nama_produk"
                        name="nama_produk"
                        placeholder="Masukkan Nama Produk"
                        value="{{ old('nama_produk', $produk->nama_produk) }}"
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
                        value="{{ old('harga_jual', $produk->harga_jual) }}"
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
                        value="{{ old('harga_sewa', $produk->harga_sewa) }}"
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
                        <option disabled {{ $produk->kategori ? '' : 'selected' }}>Pilih Kategori</option>
                        <option value="Seserahan" {{ $produk->kategori == 'Seserahan' ? 'selected' : '' }}>Seserahan</option>
                        <option value="Mahar" {{ $produk->kategori == 'Mahar' ? 'selected' : '' }}>Mahar</option>
                        <option value="Box" {{ $produk->kategori == 'Box' ? 'selected' : '' }}>Box</option>
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
                        value="{{ old('stok', $produk->stok) }}"
                        />
                    </div>
                </div>
                <div class="mb-6">
                    <label class="form-label" for="gambar">Upload Gambar Produk</label>
                    <input
                        type="file"
                        class="form-control"
                        id="gambar"
                        name="gambar"
                        accept="image/*"
                    />
                    @if($produk->gambar)
                        <div class="mb-3 mt-3">
                            <label class="form-label d-block">Gambar Produk Sebelumnya</label>
                            <img src="{{ asset('storage/' . $produk->gambar) }}" alt="Gambar Produk" width="120">
                        </div>
                    @endif
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
                        >{{ old('deskripsi', $produk->deskripsi) }}</textarea>
                    </div>
                </div>
                <div class="mb-6">
                    <label class="form-label" for="status">Status Produk</label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text"><i class="icon-base bx bx-toggle-left"></i></span>
                        <select class="form-select" id="status_produk" name="status_produk">
                        <option disabled {{ $produk->status_produk ? '' : 'selected' }}>Pilih Status</option>
                        <option value="ACTIVE" {{ $produk->status_produk == 'ACTIVE' ? 'selected' : '' }}>Active</option>
                        <option value="INACTIVE" {{ $produk->status_produk == 'INACTIVE' ? 'selected' : '' }}>Inactive</option>
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

    // Hapus karakter non-angka
    function cleanNumber(str) {
        return str.replace(/[^\d]/g, '');
    }

    // Pasang handler dan langsung format jika ada value awal
    function handleRupiahInput(inputId, hiddenId) {
        const input = document.getElementById(inputId);
        const hidden = document.getElementById(hiddenId);

        if (!input) return;

        // Jika input sudah ada isinya saat page load → langsung format
        if (input.value) {
            let angkaAwal = cleanNumber(input.value);
            input.value = formatRupiah(angkaAwal);
            hidden.value = angkaAwal;
        }

        // Event saat mengetik
        input.addEventListener('input', function () {
            let angka = cleanNumber(this.value);
            this.value = formatRupiah(angka);
            hidden.value = angka;
        });

        // Cegah karakter non-angka saat ketik
        input.addEventListener('keypress', function (e) {
            if (!/[0-9]/.test(e.key)) {
                e.preventDefault();
            }
        });
    }

    // Jalankan saat DOM siap (untuk aman)
    document.addEventListener('DOMContentLoaded', function () {
        handleRupiahInput('harga_jual', 'harga_jual_hidden');
        handleRupiahInput('harga_sewa', 'harga_sewa_hidden');

        const form = document.querySelector('form'); // sesuaikan jika lebih dari satu form
        if (form) {
            form.addEventListener('submit', function () {
                const hargaJualInput = document.getElementById('harga_jual');
                const hargaSewaInput = document.getElementById('harga_sewa');
                const hargaJualHidden = document.getElementById('harga_jual_hidden');
                const hargaSewaHidden = document.getElementById('harga_sewa_hidden');

                if (hargaJualInput && hargaJualHidden) {
                    hargaJualHidden.value = cleanNumber(hargaJualInput.value);
                }

                if (hargaSewaInput && hargaSewaHidden) {
                    hargaSewaHidden.value = cleanNumber(hargaSewaInput.value);
                }
            });
        }
    });
</script>

@endsection