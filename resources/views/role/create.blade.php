@extends('layouts.main')

@section('title', 'Add Role')

@section('content')
{{-- header --}}
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
            </div>
        </div>
    </div>
</div>    

{{-- body --}}
<div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-1">
                                <a href="{{ url()->previous() }}"><i class="fas fa-arrow-left"></i></a> 
                            </div>
                            <div class="col-7 ml--5">
                                <b>Create New Role</b>
                            </div>
                            <div class="col-4 text-right ml-5">
                                <a href="#" class="btn btn-sm btn-danger">Reset</a>
                                <a href="#" class="btn btn-sm btn-dark">Create</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="#" enctype="multipart/form-data">
                            <!-- {{ csrf_field() }} -->
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="role_name" class="form-control-label">{{ __('Role Name') }}</label>
                                            <input type="text" id="input-role_name" class="form-control @if ($errors->has('role_name')) is-invalid @endif"
                                            role_name="role_name" placeholder="Role Name.." value="{{ old('role_name') }}"
                                            autocomplete="role_name" autofocus>
                                            @if ($errors->has('role_name'))
                                                <div class="invalid-feedback">{{ $errors->first('role_name') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" id="checkAll" type="checkbox">
                                    <label class="custom-control-label" for="checkAll">Check All</label>
                                </div> <br>
                                <h3>Timesheet</h3>
                                <div class="custom-control custom-checkbox">
                                    <div class="row ml-4">
                                        <div class="col-sm-4">
                                            <input class="custom-control-input" id="checkTimesheetView" type="checkbox">
                                            <label class="custom-control-label" for="checkTimesheetView">View</label>
                                        </div>
                                        <div class="col-sm-4">
                                            <input class="custom-control-input" id="checkTimesheetUpdate" type="checkbox">
                                            <label class="custom-control-label" for="checkTimesheetUpdate">Update</label>
                                        </div>
                                        <div class="col-sm-4">
                                            <input class="custom-control-input" id="checkTimesheetView" type="checkbox">
                                            <label class="custom-control-label" for="checkTimesheetView">View</label>
                                        </div>
                                    </div>
                                </div> <br>
                                <h3>Summary</h3>
                                <div class="custom-control custom-checkbox">
                                    <div class="row ml-4">
                                        <div class="col-sm-4">
                                            <input class="custom-control-input" id="checkTimesheetView" type="checkbox">
                                            <label class="custom-control-label" for="checkTimesheetView">View</label>
                                        </div>
                                        <div class="col-sm-4">
                                            <input class="custom-control-input" id="checkTimesheetView" type="checkbox">
                                            <label class="custom-control-label" for="checkTimesheetView">View</label>
                                        </div>
                                        <div class="col-sm-4">
                                            <input class="custom-control-input" id="checkTimesheetView" type="checkbox">
                                            <label class="custom-control-label" for="checkTimesheetView">View</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                         </form>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection
