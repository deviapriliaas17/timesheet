@extends('layouts/main')

@section('title', 'Category Permission')

@section('content')

{{-- header --}}
<div class="header bg-primary pb-6">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Category Permission</h6>
        </div>
        {{-- @can("Create Category Permission") --}}
          <div class="col-lg-6 col-2 text-right">
              <button type="button" class="btn btn-sm btn-neutral" data-toggle="modal" data-target="#addCategory">Add Category</a>
          </div>
        {{-- @endcan --}}
        <!-- Modal Add Category-->
        <div class="modal fade" id="addCategory" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Add Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('addCategory') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col text-left">
                                <div class="form-group">
                                    <label for="category-name" class="form-control-label">Category Permission</label>
                                    <input type="text" id="category-name" class="form-control @if ($errors->has('category')) is-invalid @endif"
                                    name="category" placeholder="Category Permission name.."
                                    value="{{ old('category') }}">
                                    @if ($errors->has('category'))
                                        <div class="invalid-feedback">{{ $errors->first('category') }}
                                        </div>
                                    @endif
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
          <h3 class="mb-0">Category Permission Table</h3>
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
            <th>Category Permission</th>
            {{-- @canany(['Edit Category Permission','Delete Category Permission']) --}}
            <th>Actions</th>
            {{-- @endcanany --}}
          </tr>
        </thead>
        <tbody>
          @foreach($categoryPermissions as $cp)
          <tr class="text-center">
            <td>{{ $cp->name_category }}</td>
            <td class="table-actions">
              {{-- @can("Edit Category Permission") --}}
              <a type="button" class="table-action" data-mycategory="{{ $cp->name_category }}" data-categoryid="{{ $cp->id }}" data-toggle="modal"
                data-target="#editCategoryPermission">
                <i class="fas fa-user-edit text-primary"></i>
              </a>
              {{-- @endcan --}}
              {{-- @can("Delete Category Permission") --}}
              <a href="/category_permission/{{ $cp->id }}" class="table-action table-action-delete text-danger" data-toggle="tooltip" data-original-title="Delete">
                <i class="fas fa-trash"></i>
              </a>
              {{-- @endcan --}}
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
  <div class="modal fade" id="editCategoryPermission" tabindex="-1" role="dialog"
  aria-labelledby="editModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="ModalLabel">Edit Category Permission</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
              <form method="post" action="{{ route('updateCategoryPermission') }}" enctype="multipart/form-data">
                  {{ csrf_field() }}
            <div class="row">
              <div class="col text-left">
                  <div class="form-group">
                        <input type="hidden" name="category_id" id="category_id" value="">
                        <label for="category_permission">Category Permission</label>
                        <input type="text" class="form-control" name="category_permission" id="categoryPermission">    
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