@extends('layouts.users-app')

@section('title', 'Checkout Pesanan')

@section('content')
<section class="section section-checkout py-5">
    <div class="container">
        <h2 class="text-center fw-bold mb-4">Checkout Pesanan</h2>

        {{-- Informasi Pesanan --}}
        <div class="card mb-4">
            <div class="card-body">
                <h5>Invoice: <strong>{{ $pesanan->kode_invoice }}</strong></h5>
                <p>Status: <span class="badge bg-warning text-dark">{{ $pesanan->status_pesanan }}</span></p>
                <hr>
                <h6 class="fw-bold">Daftar Produk:</h6>
                <ul class="list-group">
                    @foreach ($pesanan->detailPesanan as $detail)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $detail->keranjang->produk->nama }} 
                            <small>
                                ({{ $detail->keranjang->layananHarga->layanan }}) x{{ $detail->keranjang->qty }}
                            </small>
                            <span>Rp {{ number_format($detail->subtotal, 0, ',', '.') }}</span>
                        </li>
                    @endforeach
                </ul>
                <hr>
                <h5 class="text-end">Total: Rp {{ number_format($pesanan->total_harga, 0, ',', '.') }}</h5>
            </div>
        </div>

        {{-- Form Checkout --}}
        <form id="form-checkout">
            @csrf
            <div class="mb-3">
                <label for="tanggal_acara" class="form-label">Tanggal Acara</label>
                <input type="date" class="form-control" name="tanggal_acara" required>
            </div>
            <div class="mb-3">
                <label for="metode_pengiriman" class="form-label">Metode Pengiriman</label>
                <select class="form-select" name="metode_pengiriman" required>
                    <option value="" disabled>Pilih Metode Pengiriman</option>
                    <option value="Ambil di Tempat">Ambil di Tempat</option>
                    <option value="Dikirim">Dikirim</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="metode_pembayaran" class="form-label">Metode Pembayaran</label>
                <select class="form-select" name="metode_pembayaran" required>
                    <option value="" disabled>Pilih Metode Pembayaran</option>
                    <option value="Midtrans">Transfer Bank</option>
                    <option value="COD">COD</option>
                </select>
            </div>

            <input type="hidden" id="finalize-url" value="{{ route('checkout.finalize', $pesanan->id) }}">
            <button type="submit" class="btn btn-success">Selesaikan Pesanan</button>
        </form>

    </div>
</section>
@endsection
@push('scripts')
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
                // console.log("Triggering Snap with Token:", data.snapToken);
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