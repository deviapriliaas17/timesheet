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
                                    <th colspan="31" scope="colgroup">September-October</th>
                                </tr>
                                <tr class="date text-center" id="datepicker" name="date" data-date-format="dd-mm-yyyy">

                                    @foreach($dates as $day)
                                    <th scope="col">
                                        {{ $day }}
                                    </th>
                                    @endforeach
                                </tr> 
                            </thead>
                            <tbody>
                                <?php $count = 0; ?>
                                @foreach($data as $key => $attendance)
                                <tr class="text-center">
                                    <td>{{ ++$count }}</td>
                                    <td>{{ $attendance->project_name}}</td>
                                    <td>{{ $attendance->location_name}}</td>
                                    @foreach($dates as $day)
                                    <td>
                                        <div>
                                            <input  type="hidden" name="project_location_code[]" value="{{ $attendance->project_location_code }}">
                                            <input  type="hidden" name="day[]" value="{{ $day }}">
                                            @if(!in_array($day, $res[$attendance->project_location_code]))
                                                    @can("Create Timesheet")
                                                    <a href="{{ url('/attendance/create/'.$attendance->project_location_code.'/'.$day) }}">
                                                        <i class="fas fa-edit text-primary"></i>
                                                    </a>
                                                    @else
                                                    <a href="#" style="pointer-events: none">
                                                        <i class="fas fa-edit text-primary"></i>
                                                    </a>
                                                    @endcan
                                                @else
                                                    @can("Edit Timesheet")
                                                    <a href="{{ url('/attendance/'.$attendance->project_location_code.'/'.$day.'/edit') }}">
                                                        <i class="fas fa-edit text-danger"></i>
                                                    </a>
                                                    @else
                                                    <a href="#" style="pointer-events: none">
                                                        <i class="fas fa-edit text-danger"></i>
                                                    </a>
                                                    @endcan
                                                @endif
                                            </div>
                                        </td>
                                        @endforeach
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
