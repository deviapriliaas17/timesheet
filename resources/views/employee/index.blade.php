@extends('layouts.main')

@section('title', 'Employee')

@section('content')

    {{-- header --}}
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Employee Table</h6>
                    </div>
                    @can("Create Employee")
                    <div class="col-lg-6 col-5 text-right">
                        <a href="{{ url('create_employee') }}" class="btn btn-sm btn-neutral">Add Employee</a>
                    </div>
                    @endcan
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
                                <h3 class="mb-0">Employee</h3>
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
                                    <th class="text-left">Employee Name</th>
                                    <th>Position</th>
                                    <th>Roles</th>
                                    <th>Address</th>
                                    <th>Contact</th>
                                    <th>Project Location</th>
                                    @canany(['Edit Employee','Delete Employee'])
                                    <th>Actions</th>
                                    @endcanany
                                </tr> 
                            </thead>
                            <tbody>
                            @foreach ($data as $user)
                                    <tr class="text-center">
                                        <td class="table-user text-left">
                                            <img src="{{ asset('uploads/employee/' . $user->avatar) }}"
                                                class="avatar rounded-circle mr-3">
                                            <b>{{ $user->name_employee }}</b>
                                        </td>
                                        <td>{{ $user->name_position}}</td>
                                        <td>
                                            @foreach ($user->roles as $role)
                                                {{ $role->name }}
                                            @endforeach
                                        </td>
                                        <td>{{ $user->address}}</td>
                                        <td>{{ $user->contact}}</td>
                                        <td>{{ $user->project_location_code}}</td>
                                        {{-- @can('Actions Employee') --}}
                                        <td class="table-actions">
                                            @can("Edit Employee")
                                            <a href="{{ url('/employee/'.$user->id.'/edit') }}" class="table-action text-primary"  data-toggle="tooltip" data-original-title="Edit">
                                                <i class="fas fa-user-edit"></i>
                                            </a>
                                            @endcan
                                            @can("Delete Employee")
                                            <a href="/employee/{{ $user->id }}" class="table-action table-action-delete text-danger" data-toggle="tooltip" data-original-title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                            @endcan
                                        </td>
                                        {{-- @endcan --}}
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
