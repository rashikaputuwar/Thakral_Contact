@extends('pages.sidebar')
@section('content')
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
                            <thead class="text-center">
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
                                        <a href="{{Route('showRoles',$role->id)}}" class="btn btn-primary btn-sm">View</a>
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
                            @endforelse
                    </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- adding title name --}}
@section('title')
- Role  
@endsection