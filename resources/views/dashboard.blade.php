@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')
<!-- HEADER -->
<div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-5 col-9">
              <h6 class="h2 text-white d-inline-block mb-0">Dashboards</h6>
              {{-- <h6 class="h2 text-white d-inline-block mb-0">{{ Auth::user()->name_employee }}</h6> --}}
            </div>

            <div class="col-lg-7 col-3 text-right">
                      <form action="{{ route('search') }}" method="POST">
                      {{ csrf_field() }}
                  <div class="row">
                      <div class="col-sm-5">
                          <div class="form-group">
                              {{-- <label class="form-control-label text-white" for="toDate">From
                              date</label> --}}
                              <div class="form-group">
                                  <div class="input-group">
                                      <div class="input-group-prepend">
                                          <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                      </div>
                                      <input name="fromDate" id="fromDate" data-date-format="yyyy-mm-dd" class="form-control datepicker"
                                          placeholder="From date.." type="text">
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="col-sm-5">
                          <div class="form-group">
                              {{-- <label class="form-control-label text-white" for="toDate">To
                                      date</label> --}}
                              <div class="form-group">
                                  <div class="input-group">
                                      <div class="input-group-prepend">
                                          <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                      </div>
                                      <input name="toDate" id="toDate" data-date-format="yyyy-mm-dd" class="form-control datepicker"
                                          placeholder="To date.." type="text">
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="col-sm-2 ml--3">
                          <button type="submit" name="filter" id="filter"
                              class="btn btn-md btn-warning">Filter</button>
                      </div>
                      {{-- <div class="col-sm-2 ml--2">
                          <button type="submit" href="{{ url('/attendance_report') }}" name="refresh" id="refresh"
                              class="btn btn-md btn-neutral">Refresh</button>
                      </div> --}}
                  </div>
              </form>
            </div>
          </div>


          <!-- Card stats -->
          <div class="row">
            <div class="col-xl-3 col-md-6 text-center">
                <span class="avatar avatar-lg rounded-circle" style="width:150px; height:150px">
                  <img src="{{ asset('uploads/employee/' . Auth::user()->avatar) }}">
                </span>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col ">
                      @foreach($times as $t)
                            <tr class="text-center">
                                <td>{{ date('', strtotime($t->date)) }}</td>
                              </tr>
                            @endforeach
                      {{-- <h5 class="card-title text-uppercase text-muted mb-0">Oktober</h5> --}}
                      @foreach($employees as $em)
                        @if ($em->name_employee == Auth::user()->name_employee )   
                          <span class="h3 font-weight-bold mb-0">Mandays</span> <br>
                          <span class="h1 font-weight-bold mb-0 ml-6" style="font-size:65px">{{ $em->mandaysCount }}</span>                             
                        @endif
                      @endforeach
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                        <i class="ni ni-briefcase-24"></i>
                      </div>
                    </div>
                  </div>
                  {{-- <p class="mt-3 mb-0 text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                    <span class="text-nowrap">Since last month</span>
                  </p> --}}
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      @foreach($times as $t)
                            <tr class="text-center">
                                <td>{{ date('', strtotime($t->date)) }}</td>
                              </tr>
                            @endforeach
                      {{-- <h5 class="card-title text-uppercase text-muted mb-0">Oktober</h5> --}}
                      @foreach($employees as $em)
                        @if ($em->name_employee == Auth::user()->name_employee ) 
                          <span class="h3 font-weight-bold mb-0">Working</span> <br> 
                          <span class="h1 font-weight-bold mb-0 ml-6" style="font-size: 65px">{{ $em->workCount }}</span>                        
                        @endif
                      @endforeach
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-success text-white rounded-circle shadow">
                        <i class="ni ni-check-bold"></i>
                      </div>
                    </div>
                  </div>
                  {{-- <p class="mt-3 mb-0 text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                    <span class="text-nowrap">Since last month</span>
                  </p> --}}
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      @foreach($times as $t)
                            <tr class="text-center">
                                <td>{{ date('', strtotime($t->date)) }}</td>
                              </tr>
                            @endforeach
                      {{-- <h5 class="card-title text-uppercase text-muted mb-0">Oktober</h5> --}}
                      @foreach($employees as $em)
                        @if ($em->name_employee == Auth::user()->name_employee ) 
                          <span class="h3 font-weight-bold mb-0">Absent</span> <br>
                          <span class="h1 font-weight-bold mb-0 ml-6" style="font-size: 65px">{{ $em->absentCount }}</span>                                
                        @endif
                      @endforeach
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-danger text-white rounded-circle shadow">
                        <i class="ni ni-fat-remove"></i>
                      </div>
                    </div>
                  </div>
                  {{-- <p class="mt-3 mb-0 text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                    <span class="text-nowrap">Since last month</span>
                  </p> --}}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    {{-- table summary --}}
    <div class="row align-items-center py-4">
      <div class="col">
        <h6 class="h2 text-center">Summary</h6>
        {{-- <h6 class="h2 text-white d-inline-block mb-0">{{ Auth::user()->name_employee }}</h6> --}}
      </div>
    </div>

    {{-- main --}}
    <div class="table-responsive">
      <div class="container">
      <table class="table align-items-center table-bordered mb-4">
      <col>
      <colgroup span="2"></colgroup>
      <colgroup span="2"></colgroup>
      
      <thead class="thead-light">
          <tr class="text-center">
          <th rowspan="2">Date</th>
          @foreach($employees as $em)
            @if ($em->name_employee == Auth::user()->name_employee ) 
              <th colspan="3" scope="colgroup">{{ $em->name_employee }}</th>
            @endif
          @endforeach
          </tr>
          <tr class="text-center">
          @foreach($employees as $em)
            @if ($em->name_employee == Auth::user()->name_employee)
            <th scope="col">Mandays</th>
            <th scope="col">Working</th>
            <th scope="col">Absent</th>
            @endif
            @endforeach
          </tr>
      </thead>
      
      <tbody>
        @foreach($times as $t)
        <tr class="text-center">
          <td>{{ date('d-m-Y', strtotime($t->date)) }}</td>
          @foreach($t->data as $d)
              <td>{{ isset($d->mandays) ? $d->mandays : '' }}</td>
              <td>{{ isset($d->work) ? $d->work : '' }}</td>
              <td>{{ isset($d->absent) ? $d->absent : '' }}</td>
          @endforeach
        </tr>
        @endforeach
      </tbody>
      
      </table>
    </div>
  </div>
@endsection
