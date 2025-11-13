@extends('layouts.admin-app')

@section('title', 'Master Artikel')

@section('content')
<h3 class="text-bold">Master Artikel</h3>

<div class="card">
  <div class="d-flex justify-content-between align-items-center px-4 pt-4">
    <div class="ms-auto">
      <a href="{{ route('artikel.create') }}" class="btn btn-success">
        <i class="bx bx-plus"></i> Tambah Artikel
      </a>
    </div>
  </div>

  <div class="table-responsive text-wrap m-5 p-5">
    <table class="table display" id="dataTable" width="100%" cellspacing="0">
      <thead>
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Kategori</th>
            <th>Penulis</th>
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
  function deleteArtikel(event, id) {
    event.preventDefault();

    if (!confirm("Yakin ingin menghapus artikel ini?")) return;

    $.ajax({
        url: `/admin/artikel/${id}`,
        method: 'POST',
        data: {
            _method: 'DELETE',
            _token: '{{ csrf_token() }}'
        },
        success: function(res) {
            alert('Artikel berhasil dihapus.');
            $(`#artikel-row-${id}`).fadeOut(300, function () {
                $(this).remove();
            });
        },
        error: function(err) {
            alert('Terjadi kesalahan saat menghapus artikel.');
            console.error(err);
        }
    });

    return false;
  }

  function loadArtikelData() {
    $.ajax({
      url: "/admin/data-artikel",
      method: 'GET',
      success: function(response) {
        if ($.fn.DataTable.isDataTable('#dataTable')) {
            $('#dataTable').DataTable().clear().destroy();
        }

        $('#dataTable tbody').empty();

        response.forEach(function(data, index) {
            let statusIcon = data.is_published
              ? '<span class="badge bg-label-success">Published</span>'
              : '<span class="badge bg-label-warning">Draft</span>';

            $('#dataTable tbody').append(`
                <tr id="artikel-row-${data.id}">
                    <td>${index + 1}</td>
                    <td>${data.judul}</td>
                    <td>${data.kategori ?? '-'}</td>
                    <td>${data.penulis ?? '-'}</td>
                    <td>${statusIcon}</td>
                    <td>
                      <a href="/admin/artikel/${data.id}/edit" class="btn btn-sm btn-primary">Edit</a>
                      <form onsubmit="return deleteArtikel(event, ${data.id})" style="display:inline;">
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
              { width: "30%" },
              { width: "20%" },
              { width: "20%" },
              { width: "10%" },
              { width: "15%" }
            ]
        });
      },
      error: function() {
          alert("Gagal mengambil data artikel.");
      }
    })
  }

  $(document).ready(function() {
    loadArtikelData();
  });
</script>
@endsection
