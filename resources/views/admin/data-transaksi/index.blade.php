@extends('layouts.admin-app')

@section('title', 'Data Transaksi')

@section('content')
<h3 class="text-bold">Data Transaksi</h3>
<div class="card">
    <div class="table-responsive text-wrap m-5 p-5">
        <table class="table display" id="tabel-transaksi">
            <thead>
                <tr>
                    <th>Invoice</th>
                    <th>Tanggal Pesan</th>
                    <th>Nama Pembeli</th>
                    <th>Total</th>
                    <th>Status Pembayaran</th>
                    <th>Status Pengiriman</th>
                    <th>Status Pesanan</th>
                    <th>ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pesananList as $pesanan)
                    <tr>
                        <td><strong>{{ $pesanan->kode_invoice }}</strong></td>
                        <td>{{ $pesanan->created_at->format('d M Y') }}</td>
                        <td>{{ $pesanan->pembeli->name ?? '-' }}</td>
                        <td>Rp {{ number_format($pesanan->total_harga, 0, ',', '.') }}</td>
                        <td>
                            @php
                              $status = $pesanan->pembayaran->status_pembayaran ?? '-';
                            @endphp

                            @if ($status === 'Sudah Dibayar')
                              <span class="text-green ">{{ $status }}</span>
                            @elseif ($status === 'Belum Dibayar')
                              <span class="text-red ">{{ $status }}</span>
                            @else
                              <span>{{ $status }}</span>
                            @endif
                        </td>
                        <td>
                            @php
                              $statusPengiriman = $pesanan->pengiriman->status_pengiriman ?? '-';
                            @endphp

                            @if (in_array($statusPengiriman, ['Sudah Dikirim', 'Sudah Diambil']))
                              <span class="text-green">{{ $statusPengiriman }}</span>
                            @elseif (in_array($statusPengiriman, ['Belum Dikirim', 'Belum Diambil']))
                              <span class="text-red">{{ $statusPengiriman }}</span>
                            @else
                              <span>{{ $statusPengiriman }}</span>
                            @endif
                        </td>
                        <td class="text-center align-middle">
                            @php
                                $status = $pesanan->status_pesanan;
                                $badgeClass = 'badge px-3 py-2 rounded';
                                $customStyle = '';

                                switch ($status) {
                                    case 'Pending':
                                        $badgeClass .= ' bg-dark text-white';
                                        break;
                                    case 'Diproses':
                                        $badgeClass .= ' text-dark';
                                        $customStyle = 'background-color: #03c3ec;';
                                        break;
                                    case 'Dikirim':
                                        $badgeClass .= ' text-dark';
                                        $customStyle = 'background-color: #ffab00;';
                                        break;
                                    case 'Sudah Diterima':
                                        $badgeClass .= ' text-white';
                                        $customStyle = 'background-color: #0d6efd;'; // Bootstrap primary
                                        break;
                                    case 'Menunggu Pengembalian':
                                        $badgeClass .= ' text-white';
                                        $customStyle = 'background-color: #fd7e14;'; // Bootstrap orange
                                        break;
                                    case 'Sudah Dikembalikan':
                                        $badgeClass .= ' text-white';
                                        $customStyle = 'background-color: #20c997;'; // Bootstrap teal
                                        break;
                                    case 'Selesai':
                                        $badgeClass .= ' text-white';
                                        $customStyle = 'background-color: #198754;';
                                        break;
                                    default:
                                        $badgeClass .= ' bg-secondary text-white';
                                        break;
                                }
                            @endphp

                            <span class="badge {{ $badgeClass }}" style="{{ $customStyle ?? '' }}">{{ $status }}</span>
                        </td>
                        <td>
                            <a href="{{ route('transaksi.show', $pesanan->id) }}" class="btn btn-sm btn-primary">Detail</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function () {
        $('#tabel-transaksi').DataTable({
      "order": [[0, "desc"]] 
    });
    });
</script>
@endsection
