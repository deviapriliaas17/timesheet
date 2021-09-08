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
                    @can('Add Employee')
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
                                    <th>Employee Name</th>
                                    <th>Position</th>
                                    <th>Address</th>
                                    <th>Handphone</th>
                                    <!-- <th>Position</th> -->
                                    @can('Actions Employee')
                                    <th>Actions</th>
                                    @endcan
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($data as $employee)
                                    <tr class="text-center">
                                        <td>{{ $employee->name}}</td>
                                        <td>{{ $employee->name_position}}</td>
                                        <td>{{ $employee->address}}</td>
                                        <td>{{ $employee->handphone}}</td>
                                        <!-- <td>Front-end</td> -->
                                        @can('Actions Employee')
                                        <td class="table-actions">
                                            @can('Edit Employee')
                                            <a href="#!" class="table-action text-primary" data-toggle="tooltip" data-original-title="Edit">
                                                <i class="fas fa-user-edit"></i>
                                            </a>
                                            @endcan
                                            @can('Delete Employee')
                                            <a href="#">
                                                <i class="fas fa-trash text-danger"></i>
                                            </a>
                                            @endcan
                                        </td>
                                        @endcan
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
