@extends('layouts.admin-app')

@section('title', 'Detail Pesanan')

@section('content')
<h3 class="text-bold mb-4">Detail Transaksi</h3>

<div class="row">
  <div class="col-md-6">
    <div class="card p-3">
      <h5 class="text-bold mb-0"><i class="bx bx-receipt"></i> Informasi Pesanan</h5>
      <hr>
      <p class="text-bold"><strong>Invoice :</strong> {{ $pesanan->kode_invoice }}</p>
      <p><strong>Status Pesanan :</strong>
        @php
          $status = $pesanan->status_pesanan;
          $badgeClass = match($status) {
              'Pending' => 'bg-dark text-white',
              'Diproses' => 'bg-info text-black',
              'Dikirim' => 'bg-warning text-black',
              'Sudah Diterima' => 'bg-primary text-white',
              'Menunggu Pengembalian' => 'bg-red text-white',
              'Sudah Dikembalikan' => 'bg-teal text-white',
              'Selesai' => 'bg-success text-white',
              default => 'bg-secondary text-white'
          };
        @endphp
        <span class="badge {{ $badgeClass }}">{{ $status }}</span>
      </p>
      <p><strong>Status Pembayaran :</strong>
        @if ($pesanan->pembayaran->status_pembayaran === 'Sudah Dibayar')
          <span class="badge bg-success">Sudah Dibayar</span>
        @else
          <span class="badge bg-danger">Belum Dibayar</span>
        @endif
      </p>
      <p><strong>Status Pengiriman :</strong>
        @if (in_array($pesanan->pengiriman->status_pengiriman, ['Sudah Dikirim', 'Sudah Diambil']))
          <span class="badge bg-success">{{ $pesanan->pengiriman->status_pengiriman }}</span>
        @else
          <span class="badge bg-danger">{{ $pesanan->pengiriman->status_pengiriman }}</span>
        @endif
      </p>
      
      <p><strong>Tanggal Pesanan:</strong> {{ \Carbon\Carbon::parse($pesanan->created_at)->translatedFormat('d M Y') }}</p>
      <p><strong>Tanggal Acara:</strong> {{ \Carbon\Carbon::parse($pesanan->tanggal_acara)->translatedFormat('d M Y') ?? '-'}}</p>
    </div>
  </div>

  <div class="col-md-6">
    <div class="card p-3">
      <h5 class="text-bold mb-0"><i class="bx bx-user"></i> Informasi Pembeli</h5>
      <hr>
      <p><strong>Nama:</strong> {{ $pesanan->pembeli->name }}</p>
      <p><strong>No. Telepon:</strong> {{ $pesanan->pembeli->nohp }}</p>
      <p><strong>Alamat:</strong> {{ $pesanan->pembeli->alamat }}</p>
      <p><strong>Provinsi:</strong> {{ $pesanan->pembeli->provinsi }}</p>
      <p><strong>Kota:</strong> {{ $pesanan->pembeli->kota }}</p>
      <p><strong>Kecamatan:</strong> {{ $pesanan->pembeli->kecamatan }}</p>
      <p><strong>Kelurahan:</strong> {{ $pesanan->pembeli->kelurahan }}</p>
      <p><strong>Kode Pos:</strong> {{ $pesanan->pembeli->kode_pos }}</p>
    </div>
  </div>
</div>

<div class="card mt-5 p-3">
  <h5 class="text-bold mb-0"><i class="bx bx-box"></i> Daftar Produk</h5>
  <hr>
  @foreach($pesanan->detailPesanan as $item)
    <div class="d-flex align-items-center mb-3 border-bottom pb-2">
      <img src="{{ asset('storage/' . $item->keranjang->produk->gambar) }}" alt="{{ $item->keranjang->produk->nama }}" style="width: 70px; height: 70px; object-fit: cover;" class="me-3 rounded">
      <div class="flex-grow-1">
        <h6 class="mb-1">{{ $item->keranjang->produk->nama }}</h6>
        <p class="mb-0 text-muted">({{ $item->keranjang->layananHarga->layanan }}) x{{ $item->keranjang->qty }} @ Rp{{ number_format($item->keranjang->layananHarga->harga, 0, ',', '.') }}</p>
      </div>
      <div class="fw-bold text-end" style="min-width: 120px;">
        Rp{{ number_format($item->keranjang->qty * $item->keranjang->layananHarga->harga, 0, ',', '.') }}
      </div>
    </div>
  @endforeach
    @if ($pesanan->pengiriman->metode_pengiriman === 'Dikirim')
                                    <div class="text-end">
                                        <p class="mb-1">Biaya Pengiriman: <strong>Rp {{ number_format(10000, 0, ',', '.') }}</strong></p>
                                    </div>
                                @endif
                                <div class="text-end">
                                    <p class="mb-1">Biaya Layanan: <strong>Rp {{ number_format(4000, 0, ',', '.') }}</strong></p>
                                </div>
  <div class="text-end mt-3">
    <h5 class="text-primary text-bold mt-0 mb-0">Total: Rp{{ number_format($pesanan->total_harga, 0, ',', '.') }}</h5>
  </div>
</div>
@php
$isSewa = $pesanan->detailPesanan->contains(function ($detail) {
    return in_array($detail->keranjang->layananHarga->layanan, ['Sewa + Jasa Hias', 'Sewa Box']);
});
$metode = $pesanan->pengiriman->metode_pengiriman ?? ''; // Dikirim / Ambil di Tempat
$statusPengiriman = $pesanan->pengiriman->status_pengiriman ?? null;
@endphp

<div class="row mt-5">
  <div class="col-sm-12">

    {{-- Flow Awal: Pending → Diproses --}}
    @if ($pesanan->status_pesanan === 'Pending')
      <form method="POST" action="{{ route('admin.transaksi.updateStatus', $pesanan->id) }}">
        @csrf @method('PUT')
        <input type="hidden" name="status_pesanan" value="Diproses">
        <button class="btn button-change-status">Proses Pesanan</button>
      </form>
    @endif

    {{-- Flow: Diproses → Dikirim (pengiriman Dikirim) --}}
    @if ($pesanan->status_pesanan === 'Diproses' && $metode === 'Dikirim' && $statusPengiriman === 'Belum Dikirim')
      <form method="POST" action="{{ route('admin.transaksi.updateStatus', $pesanan->id) }}">
        @csrf @method('PUT')
        <input type="hidden" name="status_pengiriman" value="Sudah Dikirim">
        <button class="btn button-change-status">Set Sudah Dikirim</button>
      </form>
    @endif

    {{-- Flow: Diproses → Siap Diambil (pengiriman Ambil di Tempat) --}}
    @if ($pesanan->status_pesanan === 'Diproses' && $metode === 'Ambil di Tempat' && $statusPengiriman === 'Belum Diambil')
      <form method="POST" action="{{ route('admin.transaksi.updateStatus', $pesanan->id) }}">
        @csrf @method('PUT')
        <input type="hidden" name="status_pengiriman" value="Belum Diambil">
        <button class="btn button-change-status">Set Siap Diambil</button>
      </form>
    @endif

    {{-- Flow: Siap Diambil → Sudah Diterima (set status_pengiriman Sudah Diambil) --}}
    @if ($pesanan->status_pesanan === 'Siap Diambil' && $metode === 'Ambil di Tempat' && $statusPengiriman !== 'Sudah Diambil')
      <form method="POST" action="{{ route('admin.transaksi.updateStatus', $pesanan->id) }}">
        @csrf @method('PUT')
        <input type="hidden" name="status_pengiriman" value="Sudah Diambil">
        <button class="btn button-change-status">Tandai Sudah Diambil</button>
      </form>
    @endif

    {{-- Flow: Dikirim → Sudah Diterima (untuk pengiriman Dikirim) --}}
    @if ($pesanan->status_pesanan === 'Dikirim' && $metode === 'Dikirim' && $statusPengiriman === 'Sudah Dikirim')
      <form method="POST" action="{{ route('admin.transaksi.updateStatus', $pesanan->id) }}">
        @csrf @method('PUT')
        <input type="hidden" name="status_pesanan" value="Sudah Diterima">
        <button class="btn button-change-status">Tandai Sudah Diterima</button>
      </form>
    @endif

    {{-- Flow: Sudah Diambil → Sudah Diterima (set oleh pengiriman Ambil di Tempat) --}}
    @if ($pesanan->status_pesanan === 'Sudah Diambil' && $metode === 'Ambil di Tempat' && !$isSewa)
      <form method="POST" action="{{ route('admin.transaksi.updateStatus', $pesanan->id) }}">
        @csrf @method('PUT')
        <input type="hidden" name="status_pesanan" value="Sudah Diterima">
        <button class="btn button-change-status">Tandai Sudah Diterima</button>
      </form>
    @endif

    {{-- Flow Sewa: Sudah Diterima → Menunggu Pengembalian --}}
    @if ($isSewa && $pesanan->status_pesanan === 'Sudah Diterima')
      <form method="POST" action="{{ route('admin.transaksi.updateStatus', $pesanan->id) }}">
        @csrf @method('PUT')
        <input type="hidden" name="status_pesanan" value="Menunggu Pengembalian">
        <button class="btn button-change-status">Tandai Menunggu Pengembalian</button>
      </form>
    @endif

    {{-- Flow Sewa: Menunggu Pengembalian → Sudah Dikembalikan --}}
    @if ($pesanan->status_pesanan === 'Menunggu Pengembalian')
      <form method="POST" action="{{ route('admin.transaksi.updateStatus', $pesanan->id) }}">
        @csrf @method('PUT')
        <input type="hidden" name="status_pesanan" value="Sudah Dikembalikan">
        <button class="btn button-change-status">Tandai Sudah Dikembalikan</button>
      </form>
    @endif

    {{-- Flow Akhir: Selesai --}}
    @if (
      (!$isSewa && $pesanan->status_pesanan === 'Sudah Diterima') ||
      ($isSewa && $pesanan->status_pesanan === 'Sudah Dikembalikan')
    )
      <form method="POST" action="{{ route('admin.transaksi.updateStatus', $pesanan->id) }}">
        @csrf @method('PUT')
        <input type="hidden" name="status_pesanan" value="Selesai">
        <button class="btn button-change-status">Selesaikan Pesanan</button>
      </form>
    @endif

  </div>
</div>

<div style="text-align: center; margin-top: 10px;">
        <a href="{{ route('transaksi.index') }}"><button class="btn btn-batal">Kembali</button></a>
</div>

@endsection
