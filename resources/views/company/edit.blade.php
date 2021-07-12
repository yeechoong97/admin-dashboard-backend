@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header font-weight-bold h3 text-center">Edit Company Details</div>
                <div class="card-body">
                    <form method="POST" action="{{route('company-update',$company->id)}}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="px-5 py-3 text-center">
                        @if(Storage::disk('public')->exists('logo/'.$company->logo))         
                            <img src ="/storage/logo/{{$company->logo}}" width="150" height="150" class="rounded" >
                        @else
                            <img src ="https://upload.wikimedia.org/wikipedia/commons/1/14/No_Image_Available.jpg" width="150" height="150" class="rounded" >
                        @endif
                        </div>
                        <div class="form-inline px-5 py-3">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control mx-3 col-md-7 ml-auto" value="{{$company->name}}" />
                        </div>
                        <div class="form-inline px-5 py-3">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control mx-3 col-md-7 ml-auto" value="{{$company->email}}" />
                        </div>
                        @if($company->logo == "defaultLogo")
                        <div class="form-inline px-5 py-3" id="new_logo_div">
                            <label>New Logo</label>
                            <input type="file" name="logo" class="mx-4 col-md-7 ml-auto" accept="image/*" />
                        </div>
                        @else                    
                        <div class="form-inline px-5 py-3" id="current_logo_div">
                            <label>Current Logo</label>
                            <input type="hidden" name="current_logo" id="currentLogoID" value="true"/>
                            <input type="text"  class="form-control mx-3 col-md-6 ml-auto" value="{{$company->logo}}" readonly />
                            <a class="mx-1 text-danger small" onclick="showNewInput()">Remove</a>
                        </div>
                        <div class="form-inline px-5 py-3 d-none" id="new_logo_div">
                            <label>New Logo</label>
                            <input type="file" name="logo" class="mx-4 col-md-6 ml-auto" />
                            <a class="mx-1 text-danger small" onclick="showCurrentInput()">Cancel</a>
                        </div>
                        @endif
                        <div class="form-inline px-5 py-3">
                            <label>Website URL</label>
                            <input type="text" name="website_url" class="form-control mx-3 col-md-7 ml-auto" value="{{$company->website_url}}" />
                        </div>
                        <div class="row justify-content-center my-4">
                            <a href="/companies" class="btn btn-danger mx-1">Cancel</a>
                            <button type="submit" class="btn btn-success mx-1">Confirm</button>
                            </form>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection

<script>

function showNewInput(){
    document.getElementById('current_logo_div').classList.add('d-none');
    document.getElementById('new_logo_div').classList.remove('d-none');
    document.getElementById('currentLogoID').value ="false";
}

function showCurrentInput(){
    document.getElementById('current_logo_div').classList.remove('d-none');
    document.getElementById('new_logo_div').classList.add('d-none');
    document.getElementById('currentLogoID').value ="true";
}


</script>