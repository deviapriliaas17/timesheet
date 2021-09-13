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
                            <div class="col-1">
                                <a href="{{ url('/timesheet') }}"><i class="fas fa-arrow-left"></i></a> 
                            </div>
                            <div class="col-5 ml--5">
                                <b>Attendance</b>
                            </div>
                            <!-- <div class="col-6 text-right ml-5">
                                <button type="submit" name="submit" class="btn btn-large btn-primary">Submit</button>
                            </div> -->
                        </div>
                    </div>

                    <!-- Light table -->
                    <form action="/timesheet_actions" method="post">
                    {{ csrf_field() }}
                        <div class="table-responsive">
                            <table class="table align-items-center table-bordered">
                                <thead class="thead-light">
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Work</th>
                                        <th>Mandays</th>
                                        <th>Absent</th>
                                        <th>Note</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $key => $timesheet)
                                    @foreach($dates as $day)
                                        <tr class="text-center">
                                            <td>{{ $data->firstItem() + $key }}</td>
                                            <td>
                                                <input type="hidden" name="id[]" value="{{ $timesheet->id }}">
                                                <input type="hidden" name="project_location_code[]" value="{{ $timesheet->project_location_code }}">
                                                <input type="hidden" name="namecode[]" value="{{ $timesheet->namecode }}">
                                                <input type="hidden" name="day[]" value="{{ $day }}">
                                                {{ $timesheet->name_employee }}
                                            </td>
                                            <td>
                                            <div class="custom-control custom-checkbox">
                                                <input name="working[{{$timesheet->id}}]" value="" type="hidden">
                                                <input name="working[{{$timesheet->id}}]" value="x" type="checkbox">
                                            </div>
                                            </td>
                                            <td>
                                            <div class="custom-control custom-checkbox">
                                                <input name="mandays[{{$timesheet->id}}]" value="" type="hidden">
                                                <input name="mandays[{{$timesheet->id}}]" value="x" type="checkbox">
                                            </div>
                                            </td>
                                            <td>
                                            <div class="custom-control custom-checkbox">
                                                <input name="absent[{{$timesheet->id}}]" value="" type="hidden">
                                                <input name="absent[{{$timesheet->id}}]" value="x" type="checkbox">
                                            </div>
                                            </td>    
                                            <td>
                                            <div>
                                                <textarea class="form-control" name="noteTimesheet[]" id="note" rows="1"></textarea>
                                            </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="row mt-3 mb-3">
                                <div class="ml-4 col-xs-6 col-8">
                                    Showing
                                    {{ $data->firstItem() }}
                                    to
                                    {{ $data->lastItem() }}
                                    of
                                    {{ $data->total() }}
                                    enteries
                                </div>
                                <div class="ml-8 col-xs-6 ">
                                    {{ $data->links() }}
                                </div>
                                <div class="col-12 text-right mt-4 ml--3">
                                    <button type="submit" name="submit" class="btn btn-large btn-primary">Submit</button>
                                </div> <br>
                            </div>
                        </form>
                    </div>
            </div>
        </div>
    </div>
@endsection
