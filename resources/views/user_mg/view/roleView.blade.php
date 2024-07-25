@extends('pages.sidebar')
@section('content')
    <div class="row justify-content-center">
        
            <div class="col-md-10">
                <h2 class="text-center mb-4">User View</h2>
                <table class="table table-bordered">
                   
                        <tr>
                            <th>Id</th> 
                            <td>{{ $role->role_id }}</td>
                          
                            <th>Role</th>
                            <td>{{ $role->role_name }}</td>
                        </tr>
                        <tr>
                            <th>Status</th> 
                            <td>{{ $user->status}}</td> 
                           <th>hye</th>
                            <td>user_id</td>
                        </tr>
                </table>
            </div>
    </div>
    <div class="row">
        <div class="col-sm-8 offset-sm-4">
            <a href="/roles">
            <button type="back" class="btn btn-primary">Back</button></a>
        </div>
    </div>

@endsection

@section('title')
-View Role Page
@endsection