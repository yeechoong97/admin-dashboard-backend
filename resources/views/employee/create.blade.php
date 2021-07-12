@extends('layouts.app')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header font-weight-bold h3">Create New Employee</div>
                <div class="card-body">
                    <form method="POST" action="{{route('employee-store')}}">
                    @csrf
                        <div class="form-group row px-5 py-2">
                            <label>First Name</label>
                            <div class="col-md-8 mx-3 ml-auto">
                                <input type="text" name="first_name" class="form-control mx-3" autofocus/>
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
                                <input type="text" name="last_name" class="form-control mx-3"/>
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
                                    <option value="{{$company->id}}">{{$company->name}}</option>
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
                                <input type="text" name="email" class="form-control mx-3" />
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
                            <input type="text" name="phone" class="form-control mx-3" placeholder="0123456789" />
                            @error('phone')
                                <span class="invalid-feedback ml-3" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror   
                            </div>
                        </div>
                        <div class="row justify-content-center my-4">
                            <a href="/employees" class="btn btn-danger mx-1">Cancel</a>
                            <button type="submit" class="btn btn-success mx-1">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
