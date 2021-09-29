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
                        <div class="row">
                            <div class="col-1">
                                <a href="{{ url('/employee') }}"><i class="fas fa-arrow-left"></i></a> 
                            </div>
                            <div class="col-5 ml--5">
                                <b>Add Employee</b>
                            </div>
                            <!-- <div class="col-6 text-right ml-5">
                                <button type="submit" name="submit" class="btn btn-large btn-primary">Submit</button>
                            </div> -->
                        </div>
                        {{-- <div class="row align-items-center">
                            <div class="col-8">
                                <h3>Add Employee</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ url()->previous() }}" class="btn btn-sm btn-danger">Back</a>
                            </div>
                        </div> --}}
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('addEmployee') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="name_employee" class="form-control-label">{{ __('Name') }}</label>
                                            <input type="text" id="input-name" class="form-control @if ($errors->has('name_employee')) is-invalid @endif"
                                            name="name_employee" placeholder="Employee Name.." value="{{ old('name_employee') }}"
                                            autocomplete="name_employee" autofocus>
                                            @if ($errors->has('name_employee'))
                                                <div class="invalid-feedback">{{ $errors->first('name_employee') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="address" class="form-control-label">{{ __('Address') }}</label>
                                            <input type="text" id="input-address" class="form-control  @if ($errors->has('address')) is-invalid @endif"
                                            name="address" placeholder="Address.." value="{{ old('address') }}" autocomplete="address"
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
                                            name="email" placeholder="Email Address.." value="{{ old('email') }}"
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
                                            name="contact" placeholder="Contact.." value="{{ old('contact') }}"
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
                                                for="position">Position</label>
                                            <select class="form-control small" id="position"
                                                name="position">
                                                @foreach ($positions as $key => $value)
                                                    <option value="{{ $key }}"
                                                        {{ $key == $id_positions ? 'selected' : '' }}>
                                                        {{ $value }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-control-label text-align-center"
                                                for="role">Role</label>
                                            <select class="form-control small " id="role"
                                                name="role">
                                                @foreach ($roles as $key => $value)
                                                    <option value="{{ $value }}"
                                                        {{ $key == $id_roles ? 'selected' : '' }}>
                                                        {{ $value }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col sm-6">
                                        <div class="form-group">
                                            <label for="password" class="form-control-label">{{ __('Password') }}</label>
                                            <input type="password" id="input-password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}"
                                            name="password" placeholder="Password.." value="{{ old('password') }}"
                                            autocomplete="password" autofocus>
                                            @if ($errors->has('password'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>    
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col sm-6">
                                        <div class="form-group">
                                            <label for="password_confirmation" class="form-control-label">{{ __('Password Confirmation') }}</label>
                                            <input type="password" id="input-password-confirmation" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}"
                                            name="password_confirmation" placeholder="Repeat Password.." value="{{ old('password_confirmation') }}"
                                            autocomplete="password_confirmation" autofocus>
                                            @if ($errors->has('password'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center mt-1">
                                    <img class="avatar rounded-circle" src="./assets/img/theme/user.jpg" />
                                </div>
                                <br>
                                <div class="row justify-content-center">
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
                                <div class="text-right mt-4">
                                    <button type="submit" name="submit" class="btn btn-large btn-primary">Add
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
