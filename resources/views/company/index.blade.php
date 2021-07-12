@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header font-weight-bold h3 ">Companies<a href="/companies/create" class="btn-primary btn mb-2 float-right btn-sm">Create</a></div>
                <div class="card-body">

                    <table class="table table-striped">    
                        <thead>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Website</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach($companies as $company)
                                <tr>
                                    <td>{{$company->name}}</td>
                                    <td>{{$company->email}}</td>
                                    <td>{{$company->website_url}}</td>
                                    <td>
                                    <form method="POST" action="{{route('company-delete',$company->id)}}">
                                        @method('delete')
                                        @csrf
                                        <a href="/companies/{{$company->id}}" class="btn btn-primary btn-sm mx-1">View</a>
                                        <a href="/companies/{{$company->id}}/edit" class="btn btn-success btn-sm mx-1">Edit</a>
                                        <button type="submit" class="btn btn-danger btn-sm mx-1">Delete</button>
                                    </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
