@extends('pages.sidebar')
@section('content')
{{-- <a href="/newuser" class="btn btn-success btn-sm btn-add-user">Add Users</a> --}}
    <div class="container mt-4">
        
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h4 class="my-0"> Users Information</h4>
                        <div class="d-flex align-items-center gap-2">
                    
                            <form action="" method="GET" class="d-flex align-items-center">
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control form-control-sm" placeholder="Search..." value="{{ request('search') }}">
                                    <button type="submit" class="btn btn-outline-primary btn-sm">
                                        <i class="fas fa-search"></i> 
                                    </button>
                                </div>
                            </form>

                            <a href="{{Route('create.user')}}" class="btn btn-success btn-sm btn-add-user" style="background-color: #186c6c; border-color: #186c6c; color: white;">
                                <i class="fas fa-plus"></i> Add </a>
                    </div>
                </div>
                    <div class="card-body">
                        <div class="table-responsive mt-3">
                            <table class="table table-bordered ">
                                <thead class="text-center">
                                <tr>
                                    <th>ID</th>
                                    {{-- <th>User ID</th> --}}
                                    <th>User Name</th>
                                    <th>Employee Name</th>
                                    <th>PW Expiry Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $id => $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                {{-- <td>{{ $user->user_id}}</td> --}}
                                <td>{{ $user->user_name }}</td>
                                {{-- <td>{{ $user->employee->fname}} {{ $user->employee->lname}}</td> --}}
                                <td>
                                    @if ($user->employee)
                                        {{ $user->employee->fname }} {{ $user->employee->lname }}
                                    @else
                                        No Employee Data
                                    @endif
                                </td>
                                <td>{{ $user->expiry_date }}</td>
                                <td>{{ $user->status }}</td>
                                <td>
                                    <a href="{{Route('showUser',$user->id)}}"class="btn btn-sm" title="View">
                                        <span style="display: inline-block; width: 30px; height: 30px; border-color: brown; text-align: center; line-height: 30px; border-radius: 5px;">
                                            <i class="fas fa-eye" style="color: brown;"></i>
                                        </span>
                                    </a>
                                    <a href="{{Route('edit.User',$user->id)}}" class="btn btn-sm" title="Update">
                                        <span style="display: inline-block; width: 30px; height: 30px; border-color: brown; text-align: center; line-height: 30px; border-radius: 5px;">
                                            <i class="fas fa-edit" style="color: brown;"></i>
                                        </span>
                                    </a>
                                </td>
                            </tr>
                                @endforeach
                            </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-end mt-4 mb-3 pr-4">
                            {{ $users->links('pagination::bootstrap-5') }}
                        </div>
                        <div class="d-flex justify-content-end  mt-4 mb-3 pr-4">
                            @if ($hasExportPermission)
                            <a href="{{ route('user.export') }}" class="btn btn-info btn-sm" style="background-color: #107c41; border-color: #107c41; color: white;">Export to Excel</a>
                             @endif
                        </div>  
                    </div>
                </div>
            </div>
        </div>
@endsection

{{-- adding title name --}}
@section('title')
User   
@endsection