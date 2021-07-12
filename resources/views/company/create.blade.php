@extends('layouts.app')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header font-weight-bold h3">Create New Company</div>
                <div class="card-body">
                    <form method="POST" action="{{route('company-store')}}" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group row px-5 py-2">
                            <label>Name</label>
                            <div class="col-md-8 mx-3 ml-auto">
                                <input type="text" name="name" class="form-control mx-3" autofocus/>
                                @error('name')
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
                            <label>Logo</label>
                            <div class="col-md-8 mx-3 ml-auto">
                            <input type="file" name="logo" class="mx-4" accept="image/*" />
                            <br/>
                            @error('logo')
                                <span class="invalid-feedback ml-3" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror   
                            </div>
                        </div>
                        <div class="form-group row px-5 py-2">
                            <label>Website URL</label>
                            <div class="col-md-8 mx-3 ml-auto">
                            <input type="text" name="website_url" class="form-control mx-3" placeholder="https://google.com" />
                            @error('website_url')
                                <span class="invalid-feedback ml-3" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror   
                            </div>
                        </div>
                        <div class="row justify-content-center my-4">
                            <a href="/companies" class="btn btn-danger mx-1">Cancel</a>
                            <button type="submit" class="btn btn-success mx-1">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
