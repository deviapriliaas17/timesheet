@extends('layouts.main')

@section('title', 'Summary')

@section('content')
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Summary</h6>
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
                                <h3 class="mb-0"></h3>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group  text-left ">
                                    <label class="form-control-label text-align-left"
                                        for="formControl">Location Project</label>
                                    <select class="form-control small" id="formControlSelect"
                                        name="position">
                                        @foreach($location_project as $key => $value)
                                            <option value="{{ $key }}"
                                                {{ $key == $id ? 'selected' : '' }}>
                                                {{ $value }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- <div class="col-3 text-right">
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
                            </div> -->
                        </div>
                    </div>


                    <!-- Light table -->
                    <div class="table-responsive">
                        <table class="table align-items-center table-bordered mb-4">
                        <col>
                        <colgroup span="2"></colgroup>
                        <colgroup span="2"></colgroup>
                        
                        <thead class="thead-light">
                            <tr class="text-center">
                            <th rowspan="2">Date</th>
                            @foreach($data as $timesheet)
                                <th colspan="3" scope="colgroup">{{ $timesheet->name_employee }}</th>
                            @endforeach
                            </tr>
                            <tr>
                            @foreach($data as $timesheet)
                                <th scope="col">Work</th>
                                <th scope="col">Mandays</th>
                                <th scope="col">Absent</th>
                            @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="text-center">
                                <td>{{ $timesheet->created_at }}</td>
                            @foreach($data as $timesheet)
                                <td>{{ $timesheet->work }}</td>
                                <td>{{ $timesheet->mandays }}</td>
                                <td>{{ $timesheet->absent }}</td>
                            @endforeach
                            </tr>
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

<!-- @foreach($attendance->date as $date)
<td>
    <div>
        <input type="hidden" name="location_name[]" value="{{ $attendance->location_name }}">
        <input  name="day[]" value="{{ $day }}">
        @if($date == $day)
            <a href="#" style="pointer-events: none;cursor: default;">
                <i class="fas fa-edit text-danger"></i>
            </a>
        @else
            <a href="{{ url('/attendance/'.$attendance->project_location_code).'/'.$day }}">
                    <i class="fas fa-edit text-primary"></i>
            </a>
        @endif
    </div>
</td>
@endforeach -->