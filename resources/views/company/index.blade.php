@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header font-weight-bold h3 ">Company List<a href="/companies/create" class="btn-primary btn mb-2 float-right btn-sm">Create</a></div>
                <div class="card-body">
                    <table class="table table-striped">    
                        <thead>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Website</th>
                            <th>Employee(s)</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach($companies as $company)
                                <tr>
                                    <td>{{$company->name}}</td>
                                    <td>
                                        @if($company->email == "")
                                            -
                                        @else
                                            {{$company->email}}
                                        @endif
                                    </td>
                                    <td>
                                        @if($company->website_url=="")
                                            -
                                        @else
                                            {{$company->website_url}}
                                        @endif    
                                    </td>
                                    <td>{{$company->employee->count()}}</td>
                                    <td>
                                    <form method="POST" action="/companies/{{$company->id}}">
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
                    {{ $companies->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
    window.onload = function() {
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist)
        alert(msg);
}
</script>