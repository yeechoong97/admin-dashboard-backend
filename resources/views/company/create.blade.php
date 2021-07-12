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
                        <div class="form-inline px-5 py-3">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control mx-3 col-md-7 ml-auto" />
                        </div>
                        <div class="form-inline px-5 py-3">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control mx-3 col-md-7 ml-auto" />
                        </div>
                        <div class="form-inline px-5 py-3">
                            <label>Logo</label>
                            <input type="file" name="logo" class="mx-4 col-md-7 ml-auto" accept="image/*" />
                        </div>
                        <div class="form-inline px-5 py-3">
                            <label>Website URL</label>
                            <input type="text" name="website_url" class="form-control mx-3 col-md-7 ml-auto" />
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
