@extends('layouts.admin-app')

@section('title', 'Master Gallery')

@section('content')
<h3 class="text-bold">Master Gallery</h3>

<div class="card">
  <div class="d-flex justify-content-between align-items-center px-4 pt-4">
    <div class="ms-auto">
      <a href="{{ route('gallery.create') }}" class="btn btn-success">
        <i class="bx bx-plus"></i> Tambah Gallery
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
  function deleteGallery(event, id) {
    event.preventDefault();

    if (!confirm("Yakin ingin menghapus data ini?")) return;

    $.ajax({
        url: `/admin/gallery/${id}`,
        method: 'POST',
        data: {
            _method: 'DELETE',
            _token: '{{ csrf_token() }}'
        },
        success: function(res) {
            alert('Data gallery berhasil dihapus.');
            $(`#gallery-row-${id}`).fadeOut(300, function () {
                $(this).remove();
            });
        },
        error: function(err) {
            alert('Terjadi kesalahan saat menghapus data.');
            console.error(err);
        }
    });

    return false;
  }

  function loadGalleryData() {
    $.ajax({
      url: "/admin/data-gallery",
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
                <tr id="gallery-row-${data.id}">
                    <td>${index + 1}</td>
                    <td>${data.judul}</td>
                    <td>${data.kategori ?? '-'}</td>
                    <td>${data.penulis ?? '-'}</td>
                    <td>${statusIcon}</td>
                    <td>
                      <a href="/admin/gallery/${data.id}/edit" class="btn btn-sm btn-primary">Edit</a>
                      <form onsubmit="return deleteGallery(event, ${data.id})" style="display:inline;">
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
          alert("Gagal mengambil data gallery.");
      }
    })
  }

  $(document).ready(function() {
    loadGalleryData();
  });
</script>
@endsection
