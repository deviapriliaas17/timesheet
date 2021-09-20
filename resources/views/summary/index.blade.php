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
                            <div class="col-8">
                                <h3 class="mb-0"></h3>
                            </div>
                            <div class="col-3 mt-4 ml--4">
                                <div class="form-group  text-left ">
                                    <form action="{{url('/summary')}}">
                                        <select class="form-control small" id="formControlSelect"
                                            name="location_project">
                                            @foreach($location_project as $key => $value)
                                                <option value="{{ $key }}"
                                                    {{ $key == $id ? 'selected' : '' }}>
                                                    {{ $value }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-1 mt-4 ml--4">
                                    <button type="submit" name="submit" class="btn btn-md btn-warning">Search</button>
                                </div>
                            </form>
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
                            @foreach($employees as $e)
                                <th colspan="3" scope="colgroup">{{ $e->name_employee }}</th>
                            @endforeach
                            </tr>
                            <tr class="text-center">
                            @foreach($employees as $e)
                                <th scope="col">W</th>
                                <th scope="col">M</th>
                                <th scope="col">A</th>
                            @endforeach

                        </tr>
                        </thead>
                        <tbody>
                            @foreach($times as $t)
                            <tr class="text-center">
                                <td>{{ date('d-m-Y', strtotime($t->date)) }}</td>
                                @foreach($t->data as $d)
                                <td>{{ isset($d->work) ? $d->work : '' }}</td>
                                <td>{{ isset($d->mandays) ? $d->mandays : '' }}</td>
                                <td>{{ isset($d->absent) ? $d->absent : '' }}</td>
                                @endforeach
                            </tr>
                            @endforeach
                        </tbody>
                        <tbody>
                            <tr class="text-center">
                                <td>Total</td>
                                @foreach($employees as $em)
                                <td>{{ $em->workCount }}</td>
                                <td>{{ $em->mandaysCount }}</td>
                                <td>{{ $em->absentCount }}</td>
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