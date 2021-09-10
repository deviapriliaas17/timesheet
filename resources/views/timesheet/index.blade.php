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
                            @foreach ($data as $key => $attendance)
                                    <tr class="text-center">
                                        <td>{{ $data->firstItem() + $key }}</td>
                                        <td>{{ $attendance->project_name}}</td>
                                        <td>{{ $attendance->location_name}}</td>
                                        @foreach($dates as $day)
                                        <td>
                                            <div>
                                                <input type="hidden" name="location_name[]" value="{{ $attendance->location_name }}">
                                                <input type="hidden" name="day[]" value="{{ $day }}">
                                                <a href="{{ url('/attendance/'.$attendance->project_location_code).'/'.$day }}">
                                                    <i class="fas fa-edit text-primary"></i>
                                                </a>
                                            </div>
                                        </td>
                                        @endforeach
                                    </tr>
                                    @endforeach
                                </tbody>
                        </table> <br>
                        <!-- <div class="row mt-3 mb-3">
                            <div class="ml-4 col-xs-6 col-8">
                                Showing
                                {{ $data->firstItem() }}
                                to
                                {{ $data->lastItem() }}
                                of
                                {{ $data->total() }}
                                enteries
                            </div>
                            <div class="ml-5 col-xs-6">
                                {{ $data->links() }}
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
