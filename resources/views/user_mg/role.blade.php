@extends('pages.sidebar')
@section('content')
    <div class="container mt-4">
        
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h4 class="my-0">Roles Information</h4>
                        <div class="d-flex align-items-center gap-2">
                       
                        <form action="{{ route('employee.search') }}" method="GET" class="d-flex align-items-center">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control form-control-sm" placeholder="Search..." value="{{ request('search') }}">
                                <button type="submit" class="btn btn-outline-primary btn-sm">
                                    <i class="fas fa-search"></i> 
                                </button>
                            </div>
                        </form>
                         
                        <a href="{{ route('roles.create') }}" class="btn btn-success btn-sm btn-add-user" style="background-color: #186c6c; border-color: #186c6c; color: white;">
                            <i class="fas fa-plus"></i> Add </a>
                    </div>
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
                                    <span style="display: inline-block; width: 30px; height: 30px; border-color: brown; text-align: center; line-height: 30px; border-radius: 5px;">
                                        <i class="fas fa-eye" style="color: brown;"></i>
                                    </span>
                                </a>
                                    <a href="{{Route('roles.edit',$role->id)}}" class="btn btn-sm" title="Update">
                                        <span style="display: inline-block; width: 30px; height: 30px; border-color: brown; text-align: center; line-height: 30px; border-radius: 5px;">
                                            <i class="fas fa-edit" style="color: brown;"></i>
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