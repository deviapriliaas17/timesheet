@extends('layouts.main')

@section('title', 'Add Employee')

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
                            <div class="col-8">
                                <h3>Add Employee</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ url()->previous() }}" class="btn btn-sm btn-danger">Back</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="#" enctype="multipart/form-data">
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="name" class="form-control-label">{{ __('Name') }}</label>
                                            <input type="text" id="input-name" class="form-control @if ($errors->has('name')) is-invalid @endif"
                                            name="name" placeholder="Employee Name.." value="{{ old('name') }}"
                                            autocomplete="name" autofocus>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="nik" class="form-control-label">{{ __('NIK') }}</label>
                                            <input type="text" id="input-nik" class="form-control  @if ($errors->has('nik')) is-invalid @endif"
                                            name="nik" placeholder="NIK.." value="{{ old('nik') }}" autocomplete="nik"
                                            autofocus>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col sm-6">
                                        <div class="form-group">
                                            <label for="email" class="form-control-label">{{ __('Email') }}</label>
                                            <input type="text" id="input-email" class="form-control @if ($errors->has('email')) is-invalid @endif"
                                            name="email" placeholder="Email Address.." value="{{ old('email') }}"
                                            autocomplete="email" autofocus>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group  text-left ">
                                            <label class="form-control-label text-align-left"
                                                for="exampleFormControlTextarea1">Position</label>
                                            <select class="form-control small" id="exampleFormControlSelect1"
                                                name="position">
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center mt-1">
                                    <img class="avatar rounded-circle" src="{{ asset('img/theme/user.jpg') }}" />
                                </div>
                                <br>
                                <div class="row justify-content-center">
                                    <div class="form-group">
                                        <input type="file" class="form-control-file @if ($errors->has('avatar')) is-invalid @endif" name="avatar" id="AvatarFile"
                                            aria-describedby="fileHelp" value="{{ old('avatar') }}" <small id="fileHelp"
                                            class="form-text- text-muted">
                                    </div>
                                </div>
                                <div class="text-right">
                                    <button type="submit" name="submit" class="btn btn-large btn-success">Add
                                        Employee</button>
                                </div>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
