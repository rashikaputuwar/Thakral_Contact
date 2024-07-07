@extends('pages.sidebar')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Role</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="bg-dark">
    <div class="container">
        
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h2 class="display-6 text-center"> Roles Information</h2>
                    </div>
                    
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                        <a href="{{ route('roles.create') }}" class="btn btn-success btn-sm btn-add-user">Add Roles</a>
                     </div>
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>SN</th>
                                <th>ID</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($roles as $index => $role)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $role['role_id'] }}</td>
                                    <td>{{ $role['role_name'] }}</td>
                                    <td>{{ $role['status'] }}</td>
                                    <td>
                                        <a href="" class="btn btn-primary btn-sm">View</a>
                                        <a href="" class="btn btn-primary btn-sm">Update</a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5">No Data</td>
                                </tr>
                                @endforelse
{{--                         
                        @forelse($roles  as $id => $role)
                        <tr>
                            <td>{{$role->id}}</td>
                            <td>{{$role->role_id}}</td>
                            <td>{{$role->role_name }}</td>
                            <td>{{$role->status}}</td>
                            <td><a href="" class="btn btn-primary btn-sm">View</a>
                                <a href="" class="btn btn-primary btn-sm">Update</a></td>
                            @empty
                                <td rowspan="5">No Data</td>
                        </tr>
                            @endforelse --}}
                    </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection

{{-- adding title name --}}
@section('title')
- Role  
@endsection