@extends('pages.sidebar')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h2 class="display-6 text-center"> User Information Details</h2>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                        
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-10">
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
                </div>
            </div>
        </div>
    </div>

@endsection

@section('title')
-View User Page
@endsection


