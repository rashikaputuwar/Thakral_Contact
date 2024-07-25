@extends('pages.sidebar')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h2 class="text-center mb-4">User View</h2>
            <table class="table table-bordered">
                <tr>
                    <th>Id</th> 
                    <td>{{ $user->id }}</td>
                    <th>UserName</th>
                    <td>{{ $user->user_name }}</td>
                </tr>
                <tr>
                    <th>Pw Expiry Date</th>
                    <td>{{ $user->expiry_date }}</td>
                    <th>Employee ID</th>
                    <td>{{ $user->employee_id}}</td>
                </tr>
                <tr>
                    <th>Status</th> 
                    <td>{{ $user->status}}</td> 
                </tr>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-8 offset-sm-4">
            <a href="/userPage">
            <button type="back" class="btn btn-primary">Back</button></a>
        </div>
    </div>

@endsection

@section('title')
-View User Page
@endsection


