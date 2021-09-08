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
                        <form method="post" action="{{ route('addEmployee') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="name" class="form-control-label">{{ __('Name') }}</label>
                                            <input type="text" id="input-name" class="form-control @if ($errors->has('name')) is-invalid @endif"
                                            name="name" placeholder="Employee Name.." value="{{ old('name') }}"
                                            autocomplete="name" autofocus>
                                            @if ($errors->has('name'))
                                                <div class="invalid-feedback">{{ $errors->first('name') }}</div>
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
                                    <!-- <div class="col sm-6">
                                        <div class="form-group">
                                            <label for="email" class="form-control-label">{{ __('Email') }}</label>
                                            <input type="text" id="input-email" class="form-control @if ($errors->has('email')) is-invalid @endif"
                                            name="email" placeholder="Email Address.." value="{{ old('email') }}"
                                            autocomplete="email" autofocus>
                                            @if ($errors->has('email'))
                                                <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                                            @endif
                                        </div>
                                    </div> -->
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
                                <!-- <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group  text-center ">
                                            <label class="form-control-label text-align-center"
                                                for="exampleFormControlTextarea1">Position</label>
                                            <select class="form-control small " id="exampleFormControlSelect1"
                                                name="position">
                                            </select>
                                        </div>
                                    </div>
                                </div> -->
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
