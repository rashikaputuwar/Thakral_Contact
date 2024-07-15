@extends('pages.sidebar')
@section('content')
    <div class="row justify-content-center">
        
            <div class="col-md-8">
                <h2 class="text-center mb-4">User View</h2>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            {{-- <th>User Id</th> --}}
                            <th>UserName</th>
                            <th>Pw Expiry Date</th>
                            <th>Employee ID</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $user->id }}</td>
                            {{-- <td>{{ $user->user_id}}</td> --}}
                            <td>{{ $user->user_name }}</td>
                            <td>{{ $user->expiry_date }}</td>
                            <td>{{ $user->employee_id}}</td>
                            <td>{{ $user->status}}</td>
                        </tr>
                    </tbody>
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