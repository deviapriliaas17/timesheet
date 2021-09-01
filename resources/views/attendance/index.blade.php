@extends('layouts.main')

@section('title', 'Timesheet')

@section('content')
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6">
                    <h6 class="h2 text-white d-inline-block mb-0">Timesheet</h6>
                </div>
                <div class="col-lg-6 text-right">
                    <a class="btn btn-sm btn-danger" href="{{ url()->previous() }}">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid mt--6">
        <div class="row">
            <div class="col">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header border-0">
                        <div class="row">
                            <div class="col-9">
                                <h3 class="mb-0">Attendance</h3>
                            </div>
                            <div class="col-3 text-right">
                                <div class="form-group">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                                </div>
                                                <input name="date" id="date" data-date-format="yyyy-mm-dd" class="form-control datepicker"
                                                    placeholder="Month" type="text">
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Light table -->
                    <div class="table-responsive">
                        <table class="table align-items-center table-bordered">
                            <thead class="thead-light">
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Working Days</th>
                                    <th>Mandays</th>
                                    <th>Absent</th>
                                    <th>Note</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <tr class="text-center">
                                        <td>1</td>
                                        <td>Agus</td>
                                        <td>
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" id="workingCheck" type="checkbox">
                                            <label class="custom-control-label" for="workingCheck"></label>
                                        </div>
                                        </td>
                                        <td>
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" id="mandayCheck" type="checkbox">
                                            <label class="custom-control-label" for="mandayCheck"></label>
                                        </div>
                                        </td>
                                        <td>
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" id="absentCheck" type="checkbox">
                                            <label class="custom-control-label" for="absentCheck"></label>
                                        </div>
                                        </td>    
                                        <td>
                                            <input type="text" id="note">
                                       </td>
                                    </tr>
                                    <tr class="text-center">
                                        <td>2</td>
                                        <td>Bambang</td>
                                        <td>
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" id="workingCheck2" type="checkbox">
                                            <label class="custom-control-label" for="workingCheck2"></label>
                                        </div>
                                        </td>
                                        <td>
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" id="mandayCheck2" type="checkbox">
                                            <label class="custom-control-label" for="mandayCheck2"></label>
                                        </div>
                                        </td>
                                        <td>
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" id="absentCheck2" type="checkbox">
                                            <label class="custom-control-label" for="absentCheck2"></label>
                                        </div>
                                        </td>    
                                        <td>
                                            <input type="textarea" id="note">
                                       </td>
                                    </tr>
                                </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-12 text-right mb-3">
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </div>
        </div>
    </div>
@endsection
