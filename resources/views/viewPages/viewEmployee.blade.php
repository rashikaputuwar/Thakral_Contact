@extends('pages.sidebar')
@section('content')
    <div class="row justify-content-center">
        
            <div class="col-md-8">
                <h2 class="text-center mb-4">Employee Details View</h2>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Employee Code</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Gender</th>
                            <th>Personal Contact no</th>
                            <th>Office contact number</th>
                            <th>Email</th>
                            <th>Employee start date</th>
                            <th>Temporary Address</th>
                            <th>Permanent Address</th>
                            <th>DOB(A.D)</th>
                            <th>Employee Extention Number</th>
                            <th>Department</th>
                            <th>Designation</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $employee->id }}</td>
                            <td>{{ $employee->emp_code }}</td>
                            <td>{{ $employee->fname }}</td>
                            <td>{{ $employee->lname }}</td>
                            <td>{{ $employee->gender}}</td>
                            <td>{{ $employee->personalcontact}}</td>
                            <td>{{ $employee->officecontact}}</td>
                            <td>{{ $employee->email}}</td>
                            <td>{{ $employee->startdate}}</td>
                            <td>{{ $employee->temp_address}}</td>
                            <td>{{ $employee->perm_address}}</td>
                            <td>{{ $employee->dob}}</td>
                            <td>{{ $employee->extention_num}}</td>
                            <td>{{ $employee->departments->dept_name}}</td>
                            <td>{{ $employee->designations->desig_name}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
    </div>
    <div class="row">
        <div class="col-sm-8 offset-sm-4">
            <a href="/employee">
            <button type="back" class="btn btn-primary">Back</button></a>
        </div>
    </div>

@endsection

@section('title')
-Employee Details View
@endsection