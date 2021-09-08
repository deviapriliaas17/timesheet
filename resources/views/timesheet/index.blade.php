@extends('layouts.main')

@section('title', 'Timesheet')

@section('content')
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Timesheet</h6>
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
                    <div class="card-header border-0 mb--4">
                        <div class="row">
                            <div class="col-9">
                                <!-- <h3 class="mb-0">Company</h3> -->
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
                            <col>
                            <colgroup span="2"></colgroup>
                            <thead class="thead-light">
                                <tr class="text-center">
                                    <th rowspan="2" scope="rowgroup">No</th>
                                    <th rowspan="2" scope="rowgroup">Project</th>
                                    <th rowspan="2" scope="rowgroup">Location Project</th>
                                    <th colspan="32" scope="colgroup">August-September</th>
                                </tr>
                                <tr class="date text-center" id="datepicker" name="date" data-date-format="dd-mm-yyyy">

                                    @foreach($tanggal as $hari)
                                <th scope="col">
                                        {{ $hari }}
                                    </th>
                                    @endforeach
                                </tr> 
                            </thead>
                            <tbody>
                            @foreach ($data as $attendance)
                                    <tr class="text-center">
                                        <td>{{ $attendance->id}}</td>
                                        <td>{{ $attendance->project_name}}</td>
                                        <td>{{ $attendance->location_name}}</td>
                                        @for ($i = 1; $i <= 32; $i++)
                                        <td>
                                            <div>
                                                <a href="{{ url('/attendance') }}">
                                                    <i class="fas fa-edit text-primary"></i>
                                                </a>
                                            </div>
                                        </td>
                                        @endfor
                                    </tr>
                                    @endforeach
                                </tbody>
                        </table> <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
