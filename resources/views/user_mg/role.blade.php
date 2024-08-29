@extends('pages.sidebar')
@section('content')
    <div class="container">
        
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="d-flex flex-grow-1 justify-content-center">
                            <h3 class="display text-center"> Roles Information</h3>
                         </div>
                        <a href="{{ route('roles.create') }}" class="btn btn-success btn-sm btn-add-user" style="background-color: #186c6c; border-color: #186c6c; color: white;">
                            <i class="fas fa-plus"></i> Add Roles</a>
                    </div>
                    
                    <div class="card-body">
                        <div class="table-responsive mt-3">
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
                            
                            @forelse($roles  as $id => $role)
                            <tr>
                                <td>{{$role->id}}</td>
                                <td>{{$role->role_id}}</td>
                                <td>{{$role->role_name }}</td>
                                <td>{{$role->status}}</td>
                                <td><a href="{{Route('roles.show',$role->id)}}" class="btn btn-sm" title="View">
                                    <span style="display: inline-block; width: 30px; height: 30px; background-color: rgb(26, 210, 60); text-align: center; line-height: 30px; border-radius: 5px;">
                                        <i class="fas fa-eye" style="color: white;"></i>
                                    </span>
                                </a>
                                    <a href="{{Route('roles.edit',$role->id)}}" class="btn btn-sm" title="Update">
                                        <span style="display: inline-block; width: 30px; height: 30px; background-color: rgb(56, 25, 213); text-align: center; line-height: 30px; border-radius: 5px;">
                                            <i class="fas fa-edit" style="color: white;"></i>
                                        </span>
                                    </a>
                                </td>
                                @empty
                                    <td rowspan="5">No Data</td>
                            </tr>
                                @endforelse
                            </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-end mt-4 mb-3 pr-4">
                            {{ $roles->links('pagination::bootstrap-5') }}
                        </div>
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