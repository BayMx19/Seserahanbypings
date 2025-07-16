@extends('layouts.users-app')

@section('title', 'Checkout Pesanan')

@section('content')
<section class="section section-checkout">
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <h2 class="text-center fw-bold mb-4 text-blue">Checkout Pesanan</h2>
        <hr>
        <div class="row">
            <form id="form-checkout">
                @csrf
                <div class="card mb-4 shadow-sm">
                    <div class="card-body ">
                        <div class="row">
                           <div class="col-md-6">
                                <div class="mb-3">
                                    <h6 class="mb-2 fw-bold"><i class="fas fa-file-invoice me-2"></i> Informasi Pesanan</h6>
                                    <div class="card p-3 rounded-3">
                                        <p class="mb-1 text-bold"><strong>Invoice :</strong> {{ $pesanan->kode_invoice }}</p>
                                        <p class="mb-1"><strong>Status Pesanan:</strong> <span class="badge bg-warning text-dark">{{ $pesanan->status_pesanan }}</span></p>
                                        <p class="mb-1"><strong>Tanggal Pesanan :</strong> {{ $pesanan->created_at->format('d M Y') }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <h6 class="mb-2 fw-bold"><i class="fas fa-user me-2"></i> Informasi Pembeli</h6>
                                    <div class="card p-3 rounded-3">
                                        <p class="mb-1"><strong>Nama :</strong> {{ $pesanan->pembeli->name ?? '-' }}</p>
                                        <p class="mb-1"><strong>No. Telepon :</strong> {{ $pesanan->pembeli->nohp ?? '-' }}</p>
                                        <p class="mb-1"><strong>Alamat :</strong> {{ $pesanan->pembeli->alamat ?? '-' }}</p>
                                        <p class="mb-1"><strong>Provinsi :</strong> {{ $pesanan->pembeli->provinsi ?? '-' }}</p>
                                        <p class="mb-1"><strong>Kota :</strong> {{ $pesanan->pembeli->kota ?? '-' }}</p>
                                        <p class="mb-1"><strong>Kecamatan:</strong> {{ $pesanan->pembeli->kecamatan ?? '-' }}</p>
                                        <p class="mb-1"><strong>Kelurahan:</strong> {{ $pesanan->pembeli->kelurahan ?? '-' }}</p>
                                        <p class="mb-1"><strong>Kode Pos:</strong> {{ $pesanan->pembeli->kode_pos ?? '-' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row mb-3">
                            <div class="col-sm-4 col-md-4">
                                <div class="mb-3">
                                    <label for="tanggal_acara" class="form-label text-bold">Tanggal Acara <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" name="tanggal_acara" id="tanggal_acara" required>
                                </div>
                            </div>
                            <div class="col-sm-4 col-md-4">
                                <div class="mb-3">
                                    <label class="form-label text-bold">Metode Pengiriman <span class="text-danger">*</span></label>
                                    <div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="metode_pengiriman" id="ambil_di_tempat" value="Ambil di Tempat" required>
                                            <label class="form-check-label" for="ambil_di_tempat">
                                                Ambil di Tempat
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="metode_pengiriman" id="dikirim" value="Dikirim" required>
                                            <label class="form-check-label" for="dikirim">
                                                Dikirim
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 col-md-4">
                                <div class="mb-3">
                                    <label class="form-label text-bold">Metode Pembayaran <span class="text-danger">*</span></label>
                                    <div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="metode_pembayaran" id="transfer_bank" value="Midtrans" required>
                                            <label class="form-check-label" for="transfer_bank">
                                                Transfer Bank
                                            </label>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        
                        <h6 class="fw-bold">Daftar Produk:</h6>
                        <ul class="list-group">
                            @foreach ($pesanan->detailPesanan as $detail)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <img src="{{ asset('storage/' . $detail->keranjang->produk->gambar) }}" alt="{{ $detail->keranjang->produk->nama }}" class="img-thumbnail" style="width: 50px; height: 50px; margin-right: 10px;">
                                    <span class="text-bold">{{ $detail->keranjang->produk->nama }} </span>
                                    <small style="text-align: center !important;">
                                        ({{ $detail->keranjang->layananHarga->layanan }}) x{{ $detail->keranjang->qty }}<br>
                                        @ {{ $detail->keranjang->layananHarga->harga }}<br>
                                    </small>
                                    <span>Rp {{ number_format($detail->subtotal, 0, ',', '.') }}</span>
                                </li>
                            @endforeach
                        </ul>
                        <hr>
                        <h5 class="text-end text-bold text-blue">Total : Rp {{ number_format($pesanan->total_harga, 0, ',', '.') }}</h5>
                    </div>
                </div>

                <input type="hidden" id="finalize-url" value="{{ route('checkout.finalize', $pesanan->id) }}">
                <button type="submit" class="btn btn-success btn-checkout">Selesaikan Pesanan</button>
            </form>
        </div>
    </div>
</section>

@endsection
@push('scripts')
<script>
    const today = new Date();
    const minDate = new Date();
    minDate.setDate(today.getDate() + 2);
    const year = minDate.getFullYear();
    const month = String(minDate.getMonth() + 1).padStart(2, '0'); 
    const day = String(minDate.getDate()).padStart(2, '0');
    document.getElementById('tanggal_acara').setAttribute('min', `${year}-${month}-${day}`);
</script>
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
<script>
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    document.getElementById('form-checkout').addEventListener('submit', function (e) {
        e.preventDefault();

        const form = e.target;
        const url = document.getElementById('finalize-url').value;
        const formData = new FormData(form);

        fetch(url, {
            method: 'POST',
            body: formData
        })
        .then(res => res.json())
        .then(data => {
            console.log("DATA SNAP:", data); 
            if (data.snapToken) {
                snap.pay(data.snapToken, {
                    onSuccess: function(result) {
                        updateStatus(result, 'Success').then(() => {
                            window.location.href = '/home';
                        });
                    },
                    onPending: function(result) {
                        updateStatus(result, 'Pending');
                        return false;
                    },
                    onError: function(result) {
                        alert("Terjadi error saat pembayaran.");
                        return false;
                    },
                    onClose: function() {
                        alert("Pembayaran dibatalkan.");
                        return false;
                    }
                });
            } else {
                alert(data.message || 'Gagal generate Snap Token');
            }
        })
        .catch(err => {
            console.error(err);
            alert('Terjadi kesalahan saat memproses checkout.');
        });
    });

    function updateStatus(result, status) {
        return fetch('/checkout/update-status', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            },
            body: JSON.stringify({
                order_id: result.order_id,
                transaction_status: status
            })
        })
        .then(res => res.json())
        .then(data => {
            console.log(data.message || 'Status pesanan diperbarui.');
        })
        .catch(err => {
            alert('Gagal update status pesanan.');
            console.error(err);
        });
    }
</script>
@endpush