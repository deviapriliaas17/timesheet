@extends('layouts/main')

@section('title', 'Role')

@section('content')

{{-- header --}}
<div class="header bg-primary pb-6">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <h6 class="h2 text-white d-inline-block mb-0">Role</h6>
        </div>
        <div class="col-lg-6 col-5 text-right">
          <a href="{{ url('create_role') }}" class="btn btn-sm btn-neutral">Add Role</a>
          </button>
        </div>
      </div>
    </div>
  </div>
</div>

{{-- page content --}}
<div class="container-fluid mt--6">
  <div class="row">
    <div class="col">
      <div class="card">
        <!-- Card header -->
        <div class="card-header border-0">
          <div class="row">
            <div class="col-6">
              <h3 class="mb-0">Role Table</h3>
            </div>
            <div class="col-6 text-right">
            </div>
          </div>
        </div>

        <!-- Light table -->
        <div class="table-responsive">
          <table class="table align-items-center table-flush mb-4">
            <thead class="thead-light">
              <tr class="text-center">
                <th>Role</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($data as $key => $role)
              <tr class="text-center">
                <td>{{ $role->name }}</td>
                <td class="table-actions">
                  <a href="{{ url('/role/'.$role->id.'/edit') }}">
                    <i class="fas fa-user-edit text-primary"></i>
                  </a>
                  <a href="/role/{{ $role->id }}" class="table-action table-action-delete text-danger" data-toggle="tooltip" data-original-title="Delete">
                    <i class="fas fa-trash"></i>
                  </a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection