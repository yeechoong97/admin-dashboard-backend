@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header font-weight-bold h3 ">Employees List<a href="/employees/create" class="btn-primary btn mb-2 float-right btn-sm">Create</a></div>
                <div class="card-body">
                    <table class="table table-striped">    
                        <thead>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Company</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach($employees as $employee)
                                <tr>
                                    <td>{{$employee->first_name}}</td>
                                    <td>{{$employee->last_name}}</td>
                                    <td>{{$employee->company->name}}</td>
                                    <td>
                                        @if($employee->email=="")
                                            -
                                        @else
                                            {{$employee->email}}
                                        @endif
                                    </td>
                                    <td>
                                        @if($employee->phone=="")
                                            -
                                        @else
                                            {{$employee->phone}}
                                        @endif
                                    </td>
                                    <td>
                                    <form method="POST" action="/employees/{{$employee->id}}">
                                        @method('delete')
                                        @csrf
                                        <a href="/employees/{{$employee->id}}" class="btn btn-primary btn-sm mx-1">View</a>
                                        <a href="/employees/{{$employee->id}}/edit" class="btn btn-success btn-sm mx-1">Edit</a>
                                        <button type="submit" class="btn btn-danger btn-sm mx-1">Delete</button>
                                    </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $employees->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
