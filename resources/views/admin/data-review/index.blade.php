@extends('layouts.admin-app')

@section('title', 'Data Review')

@section('content')
<h3 class="text-bold">Data Review</h3>
<div class="card">
  <div class="table-responsive text-wrap m-5 p-5">
    <table class="table display" id="table-review">
      <thead>
        <tr>
          <th>Invoice</th>
          <th>Nama Pembeli</th>
          <th>Produk</th>
          <th>Rating</th>
          <th>Review</th>
          <th>Tanggal</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @foreach ($reviews as $item)
        @php
          $firstDetail = $item->pesanan->detailPesanan->first();
        @endphp
        <tr>
          <td>{{ $item->pesanan->kode_invoice ?? '-' }}</td>
          <td>{{ $item->pesanan->pembeli->name ?? '-' }}</td>
          <td>{{ $firstDetail ? ($firstDetail->keranjang->produk->nama ?? '-') : '-' }}</td>
          <td>{{ $item->rating }} / 5</td>
          <td>{{ \Str::limit($item->review_text, 100) }}</td>
          <td>{{ $item->created_at->format('d M Y') }}</td>
          <td>
            <a href="{{ route('admin.data-review.show', $item->id) }}" class="btn btn-sm btn-primary">Detail</a>
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
    $('#table-review').DataTable({
      "order": [[0, "desc"]]
    });
  });
</script>
@endsection
