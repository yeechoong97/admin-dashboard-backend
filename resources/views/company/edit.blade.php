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
                        <div class="form-group row px-5 py-2">
                            <label>Name</label>
                            <div class="col-md-8 mx-3 ml-auto">
                            <input type="text" name="name" class="form-control mx-3" value="{{$company->name}}" />
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
                                <input type="text" name="email" class="form-control mx-3" value="{{$company->email}}" />
                                @error('email')
                                <span class="invalid-feedback ml-3" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror   
                            </div>
                        </div>
                        @if($company->logo == "defaultLogo")
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
                        @else     
                        <div class="form-group row px-5 py-2" id="current_logo_div">
                            <label>Logo</label>
                            <div class="col-md-8 mx-3 ml-auto">
                                <input type="hidden" name="current_logo" id="currentLogoID" value="true"/>
                                <div class="form-inline">
                                    <input type="text"  class="form-control mx-4 col-md-9 ml-auto" value="{{$company->logo}}" readonly />
                                    <a class="mx-1 text-danger small" onclick="showNewInput()">Remove</a>
                                </div>
                                @error('logo')
                                    <span class="invalid-feedback ml-3" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror   
                            </div>
                        </div>
                        <div class="form-group row px-5 py-2 d-none" id="new_logo_div">
                            <label>New Logo</label>
                            <div class="col-md-8 mx-3 ml-auto">
                                <div class="form-inline">
                                    <input type="file" name="logo" class="mx-4" accept="image/*"/>
                                    <a class=" text-danger small" onclick="showCurrentInput()">Cancel</a>
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="form-group row px-5 py-2">
                            <label>Website URL</label>
                            <div class="col-md-8 mx-3 ml-auto">
                            <input type="text" name="website_url" class="form-control mx-3" value="{{$company->website_url}}" placeholder="https://google.com" />
                            @error('website_url')
                                <span class="invalid-feedback ml-3" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror   
                            </div>
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