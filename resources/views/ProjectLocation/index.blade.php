@extends('layouts/main')

@section('title', 'Project Location')

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
                        @can("Create Project Location")
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
                                        <h5 class="modal-title" id="exampleModalLabel">Add Project Location</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" action="{{ route('addProjectLocation') }}" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <div class="row">
                                                <div class="col text-left">
                                                    <div class="form-group">
                                                        <label for="project-name" class="form-control-label">Project Location Name</label>
                                                        <input type="text" id="project_location_name" class="form-control @if ($errors->has('project_location_name')) is-invalid @endif"
                                                        name="project_location_name" placeholder="Project location name.."
                                                        value="{{ old('project_location_name') }}">
                                                        @if ($errors->has('project_location_name'))
                                                            <div class="invalid-feedback">{{ $errors->first('project_location_name') }}
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col text-left">
                                                    <div class="form-group">
                                                        <label class="form-control-label text-align-center"
                                                            for="project_name">Project Name</label>
                                                        <select class="form-control small " id="project_code"
                                                            name="project_code">
                                                            @foreach ($project as $key => $value)
                                                                <option value="{{ $key }}"
                                                                    {{ $key == $id_project ? 'selected' : '' }}>
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
                                    <th>Project Name</th>
                                    <th>Location Name</th>
                                    @canany(['Edit Project Location','Delete Project Location'])
                                    <th>Actions</th>
                                    @endcanany
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $location)
                                    <tr class="text-center">
                                        <td>{{ $location->project_name}}</td>
                                        <td>{{ $location->location_name}}</td>
                                        <td class="table-actions">
                                            @can("Edit Project Location")
                                            <a type="button" class="table-action" data-myprojectcode="{{ $location->project_code }}" data-myprojectlocation="{{ $location->location_name }}" data-projectlocationid="{{ $location->id }}" data-toggle="modal"
                                                data-target="#editLocation">
                                                <i class="fas fa-user-edit text-primary"></i>
                                            </a>
                                            @endcan
                                            @can("Delete Project Location")
                                            {{-- <a class="table-action table-action-delete text-danger deleteConfirmation" data-id="{{ $location->id }}"data-action="/project_location/{{ $location->id }}" onclick="deleteConfirmation({{ $location->id }})"  data-toggle="tooltip" data-original-title="Delete"> --}}
                                                {{-- <button class="btn btn-danger btn-flat btn-sm remove-user" data-id="{{ $user->id }}" data-action="{{ route('users.destroy',$user->id) }}" onclick="deleteConfirmation({{$user->id}})"> Delete</button>  --}}
                                            <a href="/project_location/{{ $location->id }}" class="table-action table-action-delete text-danger" data-toggle="tooltip" data-original-title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                            {{-- <a href="" class="button text-danger" data-id="{{$location->id}}">
                                                <i class="fas fa-trash"></i>
                                            </a> --}}
                                            {{-- <button class="btn btn-danger" onclick="deleteConfirmation({{$location->id}})">Delete</button> --}}
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
    <div class="modal fade" id="editLocation" tabindex="-1" role="dialog"
    aria-labelledby="editModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edtiModal">Edit Project</h5>
                <button type="button" class="close" data-dismiss="modal"
                aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form method="post" action="{{ route('updateProjectLocation') }}" enctype="multipart/form-data">
                {{ method_field('patch') }}
                {{ csrf_field() }}
                <div class="row">
                    <div class="col text-left">
                        <div class="form-group">
                            <input type="hidden" name="project_location_id" id="project_location_id" value="">
                            <label for="project-name" class="form-control-label">Project Location Name</label>
                            <input type="text" class="form-control" name="project_location" id="project_location">    
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col text-left">
                        <div class="form-group">
                            <label class="form-control-label text-align-center"
                            for="project_name">Project Name</label>
                                <select class="form-control small " id="project_code"
                                    name="project_code">
                                    @foreach ($project as $key => $value)
                                    <option value="{{ $key }}"
                                    {{ $key == $id_project ? 'selected' : '' }}>
                                    {{ $value }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                    data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Edit</button>
            </div>
            </form>
        </div>
    </div>
    </div>

    {{-- <script type="text/javascript">
        function deleteConfirmation(id) {
            swal({
                title: "Delete?",
                text: "Please ensure and then confirm!",
                type: "warning",
                showCancelButton: !0,
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel!",
                reverseButtons: !0
            }).then(function (e) {
                console.log(e);
                if (e.value === true) {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    
                    $.ajax({
                        type: 'GET',
                        url: "{{url('/project_location')}}/" + id,
                        data: {_token: CSRF_TOKEN},
                        dataType: 'JSON',
                        success: function () {
                            console.log(results)
                            if (results.success === true) {
                                swal("Done!", results.message, "success");
                            } else {
                                swal("Error!", results.message, "error");
                            }
                        }
                    });
    
                } else {
                    e.dismiss;
                }
    
            }, function (dismiss) {
                return false;
            })
        }
    </script> --}}
    

@endsection