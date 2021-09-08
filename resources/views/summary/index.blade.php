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
                                <h3 class="mb-0">Salak</h3>
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
                        <table class="table align-items-center table-bordered mb-4">
                            <col>
                            <colgroup span="2"></colgroup>
                            <thead class="thead-light">
                                <tr class="text-center">
                                    <th rowspan="2" scope="rowgroup">Date</th>
                                    <th colspan="2" scope="colgroup">Agus</th>
                                    <th colspan="2" scope="colgroup">Bambang</th>
                                </tr>
                                <tr class="text-center">
                                <th scope="col">
                                        W
                                </th>
                                <th scope="col">
                                        M        
                                </th>
                                <th scope="col">
                                        W
                                </th>
                                <th scope="col">
                                        M        
                                </th>
                                </tr> 
                            </thead>
                            <tbody>
                                    <tr class="text-center">
                                        <td>1</td>
                                        <td>v</td>
                                        <td>v</td>
                                        <td>v</td>
                                        <td></td>
                                    </tr>
                                    <tr class="text-center">
                                        <td>2</td>
                                        <td>v</td>
                                        <td></td>
                                        <td></td>
                                        <td>v</td>
                                    </tr>
                                    <tr class="text-center">
                                        <td>3</td>
                                        <td>v</td>
                                        <td></td>
                                        <td>v</td>
                                        <td>v</td>
                                    </tr>
                                </tbody>
                            <tbody>
                                    <tr class="text-center">
                                        <td>Total</td>
                                        <td>3</td>
                                        <td>1</td>
                                        <td>2</td>
                                        <td>2</td>
                                    </tr>
                                </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection