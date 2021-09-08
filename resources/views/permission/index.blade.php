@extends('layouts/main')

@section('title', 'Permission')

@section('content')

{{-- header --}}
<div class="header bg-primary pb-6">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Permission</h6>
        </div>
        <div class="col-lg-6 col-5 text-right">
            <a href="{{ url('create_permission') }}" class="btn btn-sm btn-neutral">Add Permission</a>
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
          <h3 class="mb-0">Permission Table</h3>
        </div>
        <div class="col-6 text-right">
        </div>
      </div>
    </div>

    <!-- Light table -->
    <div class="table-responsive">
      <table class="table align-items-center table-flush">
        <thead class="thead-light">
          <tr class="text-center">
            <th>Name</th>
            <th>Guard Name</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach($permissions as $permission)
          <tr class="text-center">
            <td>{{ $permission->name}}</td>
            <td>{{ $permission->guard_name}}</td>
            <td class="table-actions">
              <a href="#!" class="table-action text-primary" data-toggle="tooltip" data-original-title="Edit">
                <i class="fas fa-user-edit"></i>
              </a>
              <a href="#!" class="table-action table-action-delete text-danger" data-toggle="tooltip" data-original-title="Delete">
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