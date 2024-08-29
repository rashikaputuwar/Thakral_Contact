@extends('pages.sidebar')
@section('content')
{{-- <a href="/newuser" class="btn btn-success btn-sm btn-add-user">Add Users</a> --}}
    <div class="container">
        
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="d-flex flex-grow-1 justify-content-center">
                        <h2 class="display text-center"> Users Information</h2>
                        </div>
                            <a href="{{Route('create.user')}}" class="btn btn-success btn-sm btn-add-user" style="background-color: #186c6c; border-color: #186c6c; color: white;">Add Users</a>
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
                                        <span style="display: inline-block; width: 30px; height: 30px; background-color: rgb(26, 210, 60); text-align: center; line-height: 30px; border-radius: 5px;">
                                            <i class="fas fa-eye" style="color: white;"></i>
                                        </span>
                                    </a>
                                    <a href="{{Route('edit.User',$user->id)}}" class="btn btn-sm" title="Update">
                                        <span style="display: inline-block; width: 30px; height: 30px; background-color: rgb(56, 25, 213); text-align: center; line-height: 30px; border-radius: 5px;">
                                            <i class="fas fa-edit" style="color: white;"></i>
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
                            <a href="{{ route('user.export') }}" class="btn btn-info btn-sm" style="background-color: #4a90e2; border-color: #4a90e2; color: white;">Export to Excel</a>
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