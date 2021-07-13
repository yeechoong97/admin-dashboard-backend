@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header font-weight-bold h3 text-center">Employee Details<a href="/employees" class="btn-primary btn mb-2 float-left btn-sm">Back</a></div>
                <div class="card-body">
                        <div class="form-inline px-5 py-3">
                            <label>Company Name</label>
                            <input type="text" name="name" class="form-control mx-3 col-md-7 ml-auto" value="{{$employee->company->name}}" readonly/>
                        </div>
                        <div class="form-inline px-5 py-3">
                            <label>Company Email</label>
                            @if($employee->company->email=="")
                                <input type="text" name="email" class="form-control mx-3 col-md-7 ml-auto" value="-"  readonly />
                            @else
                                <input type="text" name="email" class="form-control mx-3 col-md-7 ml-auto" value="{{$employee->company->email}}"  readonly />
                            @endif
                        </div>
                        <div class="form-inline px-5 py-3">
                            <label>Company Website</label>
                            @if($employee->company->website_url=="")
                                <input type="text" name="website_url" class="form-control mx-3 col-md-7 ml-auto" value="-" readonly />            
                            @else
                                <input type="text" name="website_url" class="form-control mx-3 col-md-7 ml-auto" value="{{$employee->company->website_url}}" readonly />
                            @endif
                        </div>
                        <hr/>
                        <div class="form-inline px-5 py-3">
                            <label>First Name</label>
                            <input type="text" name="first_name" class="form-control mx-3 col-md-7 ml-auto" value="{{$employee->first_name}}" readonly/>
                        </div>
                        <div class="form-inline px-5 py-3">
                            <label>Last Name</label>
                            <input type="text" name="last_name" class="form-control mx-3 col-md-7 ml-auto" value="{{$employee->last_name}}" readonly/>
                        </div>
                        <div class="form-inline px-5 py-3">
                            <label>Email</label>
                            @if($employee->email=="")
                                <input type="text" name="email" class="form-control mx-3 col-md-7 ml-auto" value="-"  readonly />
                            @else
                                <input type="text" name="email" class="form-control mx-3 col-md-7 ml-auto" value="{{$employee->email}}"  readonly />
                            @endif
                        </div>
                        <div class="form-inline px-5 py-3">
                            <label>Phone</label>
                            @if($employee->phone=="")
                                <input type="text" name="website_url" class="form-control mx-3 col-md-7 ml-auto" value="-" readonly />
                            @else
                                <input type="text" name="website_url" class="form-control mx-3 col-md-7 ml-auto" value="{{$employee->phone}}" readonly />
                            @endif
                        </div>
                        <div class="row justify-content-center my-4">
                            <form method="POST" action="/employees/{{$employee->id}}">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger mx-1">Delete</button>
                            <a href="/employees/{{$employee->id}}/edit" class="btn btn-success mx-1">Edit</a>
                            </form>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
