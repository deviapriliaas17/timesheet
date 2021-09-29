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
            <button type="button" class="btn btn-sm btn-neutral" data-toggle="modal" data-target="#addPermission">Add Permission</a>
        </div>
        <!-- Modal Add Project-->
        <div class="modal fade" id="addPermission" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Add Permission</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('addPermission') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col text-left">
                                <div class="form-group">
                                    <label for="permission-name" class="form-control-label">Permission</label>
                                    <input type="text" id="permission-name" class="form-control @if ($errors->has('permission')) is-invalid @endif"
                                    name="permission" placeholder="Permission name.."
                                    value="{{ old('permission') }}">
                                    @if ($errors->has('permission'))
                                        <div class="invalid-feedback">{{ $errors->first('permission') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                  <label class="form-control-label text-align-center"
                                      for="permission_category">Category</label>
                                  <select class="form-control small " id="permission_category"
                                      name="permission_category">
                                      @foreach ($permissions_category as $key => $value)
                                          <option value="{{ $key }}"
                                              {{ $key == $category ? 'selected' : '' }}>
                                              {{ $value }}
                                          </option>
                                      @endforeach
                                  </select>
                              </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="submit" class="btn btn-primary">Save</button>
                </div>
                </form>
            </div>
        </div>
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
            <th>Category</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach($permissions as $permission)
          <tr class="text-center">
            <td>{{ $permission->name}}</td>
            <td>{{ $permission->guard_name}}</td>
            <td>{{ $permission->category}}</td>
            <td class="table-actions">
              <a type="button" class="table-action" data-mypermission="{{ $permission->name }}" data-permissionid="{{ $permission->id }}" data-toggle="modal"
                data-target="#editPermission">
                <i class="fas fa-user-edit text-primary"></i>
            </a>
              <a href="/permission/{{ $permission->id }}" class="table-action table-action-delete text-danger" data-toggle="tooltip" data-original-title="Delete">
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

{{-- modal edit --}}
<div class="modal fade" id="editPermission" tabindex="-1" role="dialog"
aria-labelledby="editModal" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="ModalLabel">Edit Permission</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form method="post" action="{{ route('updatePermission') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col text-left">
                        <div class="form-group">
                            <input type="hidden" name="permission_id" id="permission_id" value="">
                            <label for="permission">Permission</label>
                            <input type="text" class="form-control" name="permission" id="permission">    
                        </div>        
                    </div>
                </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="submit" class="btn btn-primary">Save</button>
        </div>
            </form>
        </div>
    </div>
</div>
  @endsection