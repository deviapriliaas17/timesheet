@extends('layouts.main')

@section('title', 'Edit Employee')

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
                        <div class="row">
                            <div class="col-1">
                                <a href="{{ url()->previous() }}"><i class="fas fa-arrow-left"></i></a> 
                            </div>
                            <div class="col-5 ml--5">
                                <b>Edit Employee</b>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('updateEmployee',['id'=> $user->id]) }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="hidden" name="id" id="id" value={{ $user->id }}>
                                            <label for="name" class="form-control-label">{{ __('Name') }}</label>
                                            <input type="text" id="input-name" class="form-control {{ $errors->has('name_employee') ? 'is-invalid' : '' }}"
                                            name="name_employee" placeholder="Employee Name.." value="{{ old('name_employee', $user->name_employee) }}"
                                            autocomplete="name_employee" autofocus>
                                            @if ($errors->has('name_employee'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('name_employee') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="address" class="form-control-label">{{ __('Address') }}</label>
                                            <input type="text" id="input-address" class="form-control  @if ($errors->has('address')) is-invalid @endif"
                                            name="address" placeholder="Address.." value="{{ old('address', $user->address) }}" autocomplete="address"
                                            autofocus>
                                            @if ($errors->has('address'))
                                            <div class="invalid-feedback">{{ $errors->first('address') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col sm-6">
                                        <div class="form-group">
                                            <label for="email" class="form-control-label">{{ __('Email') }}</label>
                                            <input type="text" id="input-email" class="form-control @if ($errors->has('email')) is-invalid @endif"
                                            name="email" placeholder="Email Address.." value="{{ old('email', $user->email) }}"
                                            autocomplete="email" autofocus>
                                            @if ($errors->has('email'))
                                            <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col sm-6">
                                        <div class="form-group">
                                            <label for="contact" class="form-control-label">{{ __('Contact') }}</label>
                                            <input type="text" id="input-contact" class="form-control @if ($errors->has('contact')) is-invalid @endif"
                                            name="contact" placeholder="Contact.." value="{{ old('contact', $user->contact) }}"
                                            autocomplete="contact" autofocus>
                                            @if ($errors->has('contact'))
                                            <div class="invalid-feedback">{{ $errors->first('contact') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-control-label text-align-center"
                                                for="exampleFormControlTextarea1">Position</label>
                                            <select class="form-control small" id="exampleFormControlSelect1"
                                                name="position">
                                            @foreach ($positions as $key => $value)
                                            <option value="{{ $key }}" @if($value == $user->name_position) selected @endif>
                                                    {{ $value }}
                                            </option>
                                            @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-control-label text-align-center"
                                            for="exampleFormControlTextarea1">Role</label>
                                            <select class="form-control small " id="role"
                                            name="role">
                                            @foreach ($roles as $key => $value)
                                            <option value="{{ $key }}" 
                                                @foreach($user->roles as $role)
                                                    @if($value == $role->name)
                                                        selected
                                                    @endif
                                                @endforeach>
                                                {{ $value }}
                                            </option>
                                            @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-control-label text-align-center"
                                            for="project_location">Project Location</label>
                                            <select class="form-control small" id="editProjectLocation"
                                            name="project_location">
                                            @foreach ($project_locations as $key => $value)
                                            <option value="{{ $key }}" @if($key == $user->project_location_code) selected @endif>
                                                    {{ $value }}
                                            </option>
                                            @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 mt-4">
                                        <div class="form-group">
                                            <input type="file" class="form-control-file @if ($errors->has('avatar')) is-invalid @endif" name="avatar" id="AvatarFile"
                                            aria-describedby="fileHelp" value="{{ old('avatar') }}" <small id="fileHelp"
                                            class="form-text- text-muted">Please a valid image file. Size of image should
                                            not be motre than 2MB</small>
                                            @if ($errors->has('avatar'))
                                                <div class="invalid-feedback">{{ $errors->first('avatar') }}</div>
                                                @endif
                                        </div>
                                    </div>
                                </div>
                                    <div class="text-right mt-4">
                                        <button type="submit" name="submit" class="btn btn-large btn-primary">Edit
                                            Employee</button>
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
    