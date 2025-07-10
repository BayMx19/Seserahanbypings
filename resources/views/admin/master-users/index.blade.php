@extends('layouts.admin-app')

@section('title', 'Master Users')

@section('content')
<h3 class="text-bold">Master Users</h3>
 <div class="card">
                <div class="d-flex justify-content-between align-items-center px-4 pt-4">
                  <div class="ms-auto">
                    <a href="{{ route('users.create') }}" class="btn btn-success">
                      <i class="bx bx-plus"></i> Tambah User
                    </a>
                  </div>
                </div>
                <div class="table-responsive text-wrap m-5 p-5">
                  <table class="table display " id="master-users">
                    <thead>
                      <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th class="sorting nohp-header">No. HP</th>
                        <th>Status</th>
                        <th>Actions</th>
                      </tr> 
                    </thead>
                    <tbody class="table-border-bottom-0">
                      @foreach ($users as $user)
                      <tr>
                          <td>{{ $user->name }}</td>
                          <td>{{ $user->email }}</td>
                          <td>{{ $user->role }}</td>
                          <td class="text-start">{{ $user->nohp }}</td>
                          <td>
                            @if ($user->status == 'ACTIVE')
                              <span class="badge bg-label-success">Active</span>
                            @else
                              <span class="badge bg-label-danger">Inactive</span>
                            @endif
                          </td>
                          <td>
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
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
      $(document).ready(function() {
        $('#master-users').DataTable();
      });
    </script>
@endsection
