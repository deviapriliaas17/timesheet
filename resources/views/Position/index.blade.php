@extends('layouts/main')

@section('title', 'Position')

@section('content')

    {{-- header --}}
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Position Table</h6>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                        <!-- Button trigger modal -->
                        {{-- @can("Create Position") --}}
                        <button type="button" class="btn btn-sm btn-neutral" data-toggle="modal"
                            data-target="#positionModal">
                            Add Position
                        </button>
                        {{-- @endcan --}}

                        <!-- Modal Add Position-->
                        <div class="modal fade" id="positionModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add Position</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" action="{{ route('addPosition') }}" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <div class="row">
                                                <div class="col text-left">
                                                    <div class="form-group">
                                                        <label for="position-name" class="form-control-label">Positon Name</label>
                                                        <input type="text" id="position_name" class="form-control @if ($errors->has('position_name')) is-invalid @endif"
                                                        name="position_name" placeholder="Position name.."
                                                        value="{{ old('position_name') }}">
                                                        @if ($errors->has('position_name'))
                                                            <div class="invalid-feedback">{{ $errors->first('position_name') }}
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </div>
                                        </form>
                                </div>
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
                                <h3 class="mb-0">Position Data</h3>
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
                                    <th>Position Name</th>
                                    {{-- @canany(['Edit Position','Delete Position']) --}}
                                    <th>Actions</th>
                                    {{-- @endcanany --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($positions as $position)
                                    <tr class="text-center">
                                        <td>{{ $position->name_position}}</td>
                                        <td class="table-actions">
                                            {{-- @can("Edit Position") --}}
                                            <a type="button" class="table-action" data-myposition="{{ $position->name_position }}" data-positionid="{{ $position->id }}" data-toggle="modal"
                                                data-target="#editPosition">
                                                <i class="fas fa-user-edit text-primary"></i>
                                            </a>
                                            {{-- @endcan --}}
                                            {{-- @can("Delete Position") --}}
                                            <a href="/position/{{ $position->id }}" class="table-action table-action-delete text-danger" data-toggle="tooltip" data-original-title="Delete">
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
    <div class="modal fade" id="editPosition" tabindex="-1" role="dialog"
    aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Position</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('updatePosition') }}" enctype="multipart/form-data">
                    {{method_field('patch')}}
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col text-left">
                            <div class="form-group">
                                <input type="hidden" name="position_id" id="position_id" value="">
                                <label for="position">Position</label>
                                <input type="text" class="form-control" name="position" id="position">    
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