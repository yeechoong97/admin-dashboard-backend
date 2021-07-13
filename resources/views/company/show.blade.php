@extends('layouts.app')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header font-weight-bold h3 text-center">Company Details<a href="/companies" class="btn-primary btn mb-2 float-left btn-sm">Back</a></div>
                <div class="card-body">
                        <div class="px-5 py-3 text-center">
                        @if(Storage::disk('public')->exists('logo/'.$company->logo))         
                            <img src ="/storage/logo/{{$company->logo}}" width="150" height="150" class="rounded" >
                        @else
                            <img src ="https://upload.wikimedia.org/wikipedia/commons/1/14/No_Image_Available.jpg" width="150" height="150" class="rounded" >
                        @endif
                        </div>
                        <div class="form-inline px-5 py-3">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control mx-3 col-md-7 ml-auto" value="{{$company->name}}" readonly/>
                        </div>
                        <div class="form-inline px-5 py-3">
                            <label>Email</label>
                            @if($company->email == "")
                            <input type="text" name="email" class="form-control mx-3 col-md-7 ml-auto" value="-"  readonly />
                            @else
                            <input type="text" name="email" class="form-control mx-3 col-md-7 ml-auto" value="{{$company->email}}"  readonly />
                            @endif
                        </div>
                        <div class="form-inline px-5 py-3">
                            <label>Logo</label>
                            @if($company->logo =="defaultLogo")
                                <input type="text" name="email" class="form-control mx-3 col-md-7 ml-auto" value="-" readonly />
                            @else
                                <input type="text" name="email" class="form-control mx-3 col-md-7 ml-auto" value="{{$company->logo}}" readonly />
                            @endif
                        </div>
                        <div class="form-inline px-5 py-3">
                            <label>Website URL</label>
                            @if($company->website_url=="")
                                <input type="text" name="website_url" class="form-control mx-3 col-md-7 ml-auto" value="-" readonly /> 
                            @else
                                <input type="text" name="website_url" class="form-control mx-3 col-md-7 ml-auto" value="{{$company->website_url}}" readonly />
                            @endif
                        </div>
                        <div class="row justify-content-center my-4">
                            <form method="POST" action="/companies/{{$company->id}}">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger mx-1">Delete</button>
                            <a href="/companies/{{$company->id}}/edit" class="btn btn-success mx-1">Edit</a>
                            </form>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
