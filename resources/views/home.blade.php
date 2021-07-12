@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- {{ __('You are logged in!') }} -->
                    <div class="row">
                        <a href="/companies" class="btn btn-primary mx-3">Manage Companies</a>
                        <a href="#" class="btn btn-primary mx-3">Manage Employees</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
