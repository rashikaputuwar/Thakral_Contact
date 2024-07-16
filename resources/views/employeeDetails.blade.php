@extends('pages.sidebar')
@section('content')
    <div class="container">

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h2 class="display-6 text-center"> Employees Details</h2>
                    </div>

                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                        <a href="{{Route('employee.create')}}" class="btn btn-success btn-sm btn-add-user">Add Employee</a>
                        </div>
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Employee Code</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Gender</th>
                                <th>Department</th>
                                <th>Designation</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @dd($employees) --}}
                            @foreach($employees as $employee)
                         <tr>
                            <td>{{ $employee->id }}</td>
                            <td>{{ $employee->emp_code }}</td>
                            <td>{{ $employee->fname }}</td>
                            <td>{{ $employee->lname }}</td>
                            <td>{{ $employee->gender}}</td>
                            <td>{{ $employee->departments->dept_name}}</td>
                            <td>{{ $employee->designations->desig_name}}</td>
                            <td>
                                <a href="{{Route('employee.show',$employee->id)}}" class="btn btn-primary btn-sm">View</a>
                                <a href="" class="btn btn-primary btn-sm">Update</a>
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
Employee
@endsection