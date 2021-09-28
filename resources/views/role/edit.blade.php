@extends('layouts.main')

@section('title', 'Edit Role')

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
                            <div class="col-10 ml--5">
                                <b>Edit Role</b>
                            </div>
                                <form method="post" action="{{ route('updateRole',['id'=> $role->id]) }}" enctype="multipart/form-data">
                                {{ method_field('patch') }}
                                {{ csrf_field() }}
                            <div class="col-2 text-right ml-4">
                                <button type="submit" name="submit" class="btn btn-sm btn-dark">Edit</button>
                            </div>
                            {{-- <div class="col-4 text-right ml-5">
                                <a href="#" class="btn btn-sm btn-danger">Reset</a>
                                <a href="#" class="btn btn-sm btn-dark">Create</a>
                            </div> --}}
                        </div>
                    </div>
                    <div class="card-body">
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="role_name" class="form-control-label">{{ __('Role Name') }}</label>
                                            <input type="hidden" name="id[]" value="{{ $role->id }}">
                                            <input type="text" id="input-role-name" class="form-control @if ($errors->has('role_name')) is-invalid @endif"
                                            name="role_name" placeholder="Role Name.." value="{{ old('role_name',$role->name) }}"
                                            autocomplete="role_name" autofocus>
                                            @if ($errors->has('role_name'))
                                                <div class="invalid-feedback">{{ $errors->first('role_name') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>                                
                                @foreach($category as $c)
                                <h3>{{ $c->category }}</h3>
                                <div class="custom-control custom-checkbox">
                                    <div class="row ml-4">
                                        @foreach($c->permission as $p)
                                        <div class="col-sm-3">
                                            <input class="custom-control-input" name="permission[]" id="{{ $p }}" type="checkbox" value="{{ $p }}">
                                            <label class="custom-control-label" for="{{ $p }}">{{ $p }}</label>
                                        </div>
                                        @endforeach
                                    </div>
                                </div> <br>
                                @endforeach
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
    