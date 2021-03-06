@extends('layouts/main')

@section('title', 'Project')

@section('content')

    {{-- header --}}
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Project Table</h6>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                        <!-- Button trigger modal -->
                        @can("Create Project")
                        <button type="button" class="btn btn-sm btn-neutral" data-toggle="modal"
                            data-target="#projectModal">
                            Add Project
                        </button>
                        @endcan
                        <!-- Modal Add Project-->
                        <div class="modal fade" id="projectModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add Project</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" action="{{ route('addProject') }}" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <div class="row">
                                                <div class="col text-left">
                                                    <div class="form-group">
                                                        <label for="project-name" class="form-control-label">Project</label>
                                                        <input type="text" id="project-name" class="form-control @if ($errors->has('project')) is-invalid @endif"
                                                        name="project" placeholder="Project name.."
                                                        value="{{ old('project') }}">
                                                        @if ($errors->has('project'))
                                                            <div class="invalid-feedback">{{ $errors->first('project') }}
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
                                <h3 class="mb-0">Project Data</h3>
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
                                    <!-- <th>Code Project</th> -->
                                    <th>Project Name</th>
                                    @canany(['Edit Project','Delete Project'])
                                    <th>Actions</th>
                                    @endcanany
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($projects as $project )
                                    <tr class="text-center">
                                        <td>{{ $project->project_name}}</td>
                                        <td class="table-actions">
                                            @can("Edit Project")
                                            <a type="button" class="table-action" data-myproject="{{ $project->project_name }}" data-projectid="{{ $project->id }}" data-toggle="modal"
                                                data-target="#editProject">
                                                <i class="fas fa-user-edit text-primary"></i>
                                            </a>
                                            @endcan
                                            @can("Delete Project")
                                            <a href="/project/{{ $project->id }}" class="table-action table-action-delete text-danger" data-toggle="tooltip" data-original-title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                            @endcan
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
    <div class="modal fade" id="editProject" tabindex="-1" role="dialog"
    aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Project</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('updateProject') }}" enctype="multipart/form-data">
                    {{method_field('patch')}}
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col text-left">
                            <div class="form-group">
                                <input type="hidden" name="project_id" id="project_id" value="">
                                <label for="project">Project</label>
                                <input type="text" class="form-control" name="project" id="project">    
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