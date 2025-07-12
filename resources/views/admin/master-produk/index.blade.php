@extends('layouts.admin-app')

@section('title', 'Master Produk')

@section('content')
<h3 class="text-bold">Master Produk</h3>

<div class="card">
  <div class="d-flex justify-content-between align-items-center px-4 pt-4">
    <div class="ms-auto">
      <a href="{{ route('produk.create') }}" class="btn btn-success">
        <i class="bx bx-plus"></i> Tambah Produk
      </a>
    </div>
  </div>
  <div class="table-responsive text-wrap m-5 p-5">
    <table class="table display" id="dataTable" width="100%" cellspacing="0">
      <thead>
        <tr>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Kategori</th>
            <th>Stok</th>
            <th>Harga Jual</th>
            <th>Harga Sewa</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
      </thead>
      <tbody>
          
      </tbody>
    </table>
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

    rupiah = split[1] !== undefined ? rupiah + ',' + split[1] : rupiah;
    return 'Rp ' + rupiah;
  }

  function deleteProduk(event, id) {
    event.preventDefault();

    if (!confirm("Yakin ingin menghapus produk ini?")) return;

    $.ajax({
        url: `/admin/produk/${id}`, // Sesuaikan dengan route
        method: 'POST',
        data: {
            _method: 'DELETE',
            _token: '{{ csrf_token() }}'
        },
        success: function(res) {
            alert('Produk berhasil dihapus.');
            $(`#produk-row-${id}`).fadeOut(300, function () {
                $(this).remove();
            });
        },
        error: function(err) {
            alert('Terjadi kesalahan saat menghapus produk.');
            console.error(err);
        }
    });

    return false;
  }

  function loadProdukData() {
    $.ajax({
      url: "/admin/data-produk",
      method: 'GET',
      success: function(response) {
        if ($.fn.DataTable.isDataTable('#dataTable')) {
            $('#dataTable').DataTable().clear().destroy();
        }

        $('#dataTable tbody').empty();

        response.forEach(function(data, index) {
            let statusIcon = data.status_produk === 'ACTIVE' 
            ? '<span class="badge bg-label-success">Active</span>' 
            : '<span class="badge bg-label-danger">Inactive</span>';

            $('#dataTable tbody').append(`
                <tr id="produk-row-${data.id}">
                    <td>${index + 1}</td>
                    <td>${data.nama_produk}</td>
                    <td>${data.kategori}</td>
                    <td>${data.stok}</td>
                    <td>${formatRupiah(data.harga_jual.toString())}</td>
                    <td>${formatRupiah(data.harga_sewa.toString())}</td>
                    <td>${statusIcon}</td>
                    <td>
                      <a href="/admin/produk/${data.id}/edit" class="btn btn-sm btn-primary"><i class="bx bx-edit"></i></a>
                      <form onsubmit="return deleteProduk(event, ${data.id})" style="display:inline;">
                          <button type="submit" class="btn btn-sm btn-danger"><i class="bx bx-trash"></i></button>
                      </form>
                    </td>
                </tr>
            `);
        });

        $('#dataTable').DataTable({
            autoWidth: false,
            columns: [
              { width: "5%" },
              { width: "15%" },
              { width: "15%" },
              { width: "10%" },
              { width: "15%" },
              { width: "15%" },
              { width: "10%" },
              { width: "15%" }
            ]
        });
      },
      error: function() {
          alert("Gagal mengambil data.");
      }
    })
  }

  $(document).ready(function() {
    loadProdukData();
  });
</script>
@endsection