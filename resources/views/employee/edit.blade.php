@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header font-weight-bold h3 text-center">Edit Employee Details</div>
                <div class="card-body">
                    <form method="POST" action="/employees/{{$employee->id}}">
                        @method('PUT')
                        @csrf
                        <div class="form-group row px-5 py-2">
                            <label>First Name</label>
                            <div class="col-md-8 mx-3 ml-auto">
                            <input type="text" name="first_name" class="form-control mx-3" value="{{$employee->first_name}}" />
                                @error('first_name')
                                <span class="invalid-feedback ml-3" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror   
                            </div>
                        </div>  
                        <div class="form-group row px-5 py-2">
                            <label>Last Name</label>
                            <div class="col-md-8 mx-3 ml-auto">
                                <input type="text" name="last_name" class="form-control mx-3" value="{{$employee->last_name}}" />
                                @error('last_name')
                                <span class="invalid-feedback ml-3" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror   
                            </div>
                        </div>
                        <div class="form-group row px-5 py-2">
                            <label>Company</label>
                            <div class="col-md-8 mx-3 ml-auto">
                                <select name="company_id" class="form-control mx-3">
                                @foreach($companies as $company)
                                    @if($company->id == $employee->company_id)
                                    <option value="{{$company->id}}" selected>{{$company->name}}</option>
                                    @else
                                    <option value="{{$company->id}}">{{$company->name}}</option>
                                    @endif
                                @endforeach
                                </select>
                                @error('company_id')
                                <span class="invalid-feedback ml-3" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror   
                            </div>
                        </div>   
                        <div class="form-group row px-5 py-2">
                            <label>Email</label>
                            <div class="col-md-8 mx-3 ml-auto">
                            <input type="text" name="email" class="form-control mx-3" value="{{$employee->email}}" />
                            @error('email')
                                <span class="invalid-feedback ml-3" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror   
                            </div>
                        </div>
                        <div class="form-group row px-5 py-2">
                            <label>Phone</label>
                            <div class="col-md-8 mx-3 ml-auto">
                            <input type="text" name="phone" class="form-control mx-3" value="{{$employee->phone}}" placeholder="0123456789" maxlength="11" />
                            @error('phone')
                                <span class="invalid-feedback ml-3" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror   
                            </div>
                        </div>
                        <div class="row justify-content-center my-4">
                            <a href="/employees" class="btn btn-danger mx-1">Cancel</a>
                            <button type="submit" class="btn btn-success mx-1">Confirm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
