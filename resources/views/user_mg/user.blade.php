@extends('pages.sidebar')
@section('content')
{{-- <a href="/newuser" class="btn btn-success btn-sm btn-add-user">Add Users</a> --}}
    <div class="container">
        
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h2 class="display-6 text-center"> Users Information</h2>
                    </div>
                    
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                        <a href="{{Route('create.user')}}" class="btn btn-success btn-sm btn-add-user" style="background-color: #186c6c; border-color: #186c6c; color: white;">Add Users</a>
                        
                        <a href="{{ route('user.export') }}" class="btn btn-info btn-sm" style="background-color: #4a90e2; border-color: #4a90e2; color: white;">Export to Excel</a>
                   
                     </div>
                        <table class="table table-bordered">
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
                                <a href="{{Route('showUser',$user->id)}}" class="btn btn-primary btn-sm" style="background-color: rgb(125,125,235); border-color: rgb(125,125,235); color: white;">View</a>
                                <a href="{{Route('edit.User',$user->id)}}" class="btn btn-primary btn-sm" style="background-color: rgb(125,125,235); border-color: rgb(125,125,235); color: white;">Update</a>
                            </td>
                        </tr>
                             @endforeach
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
User   
@endsection