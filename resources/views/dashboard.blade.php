@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')
<!-- HEADER -->
<div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-9 col-9">
              <h6 class="h2 text-white d-inline-block mb-0">Dashboards</h6>
              {{-- <h6 class="h2 text-white d-inline-block mb-0">{{ Auth::user()->name_employee }}</h6> --}}
            </div>
            <div class="col=lg-3 col-3 text-right">
              <div class="input-group">
                    <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                    </div>
                    <input name="date" id="date" data-date-format="yyyy-mm-dd" class="form-control datepicker"
                        placeholder="Month" type="text">
                </div>
              {{-- <a href="#" class="btn btn-sm btn-neutral">New</a>
              <a href="#" class="btn btn-sm btn-neutral">Filters</a> --}}
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

<!-- PAGE CONTENT -->
{{-- <div class="container-fluid mt--6">
      <div class="row">
        <div class="col-xl-12">
          <div class="card bg-default">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h6 class="text-light text-uppercase ls-1 mb-1">Overview</h6>
                  <h5 class="h3 text-white mb-0">Sales value</h5>
                </div>
                <div class="col">
                  <ul class="nav nav-pills justify-content-end">
                    <li class="nav-item mr-2 mr-md-0" data-toggle="chart" data-target="#chart-sales-dark" data-update='{"data":{"datasets":[{"data":[0, 20, 10, 30, 15, 40, 20, 60, 60]}]}}' data-prefix="$" data-suffix="k">
                      <a href="#" class="nav-link py-2 px-3 active" data-toggle="tab">
                        <span class="d-none d-md-block">Month</span>
                        <span class="d-md-none">M</span>
                      </a>
                    </li>
                    <li class="nav-item" data-toggle="chart" data-target="#chart-sales-dark" data-update='{"data":{"datasets":[{"data":[0, 20, 5, 25, 10, 30, 15, 40, 40]}]}}' data-prefix="$" data-suffix="k">
                      <a href="#" class="nav-link py-2 px-3" data-toggle="tab">
                        <span class="d-none d-md-block">Week</span>
                        <span class="d-md-none">W</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="card-body">
              <!-- Chart -->
              <div class="chart">
                <!-- Chart wrapper -->
                <canvas id="chart-sales-dark" class="chart-canvas"></canvas>
              </div>
            </div>
          </div>
        </div>
      </div>
</div> --}}
@endsection
