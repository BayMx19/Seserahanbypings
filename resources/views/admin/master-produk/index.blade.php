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
            let statusIcon = (data.status_produk === 'ACTIVE') 
              ? '<span class="badge bg-label-success">ACTIVE</span>' 
              : '<span class="badge bg-label-danger">INACTIVE</span>';

            $('#dataTable tbody').append(`
                <tr>
                    <td>${index + 1}</td>
                    <td>${data.nama_produk}</td>
                    <td>${data.kategori}</td>
                    <td>${data.stok}</td>
                    <td>${statusIcon}</td>
                    <td>
                      <a href="/produk/${data.id}/edit" class="btn btn-sm btn-primary">Edit</a>
                      <form onsubmit="return deleteProduk(event, ${data.id})" style="display:inline;">
                          <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                      </form>
                    </td>
                </tr>
            `);
        });

        $('#dataTable').DataTable({
            autoWidth: false,
            columns: [
              { width: "5%" },
              { width: "25%" },
              { width: "25%" },
              { width: "10%" },
              { width: "15%" },
              { width: "20%" }
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