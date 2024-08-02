@extends('pages.sidebar')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h2 class="display-6 text-center"> Employee Information Details</h2>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-10">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>ID</th>
                                        <td>{{ $employee->id }}</td>
                                        <th>First Name</th>
                                        <td>{{ $employee->fname }}</td>
                                        {{-- <th>Employee Code</th> 
                                        <td>{{ $employee->emp_code }}</td> --}}
                                    </tr>
                                    <tr>
                                        <th>Middle Name</th>
                                        <td>{{ $employee->midname }}</td>
                                        <th>Last Name</th>
                                        <td>{{ $employee->lname }}</td>
                                    </tr>
                                    <tr> 
                                        <th >Gender</th>
                                        <td>{{ $employee->gender}}</td>
                                        <th>Email</th>
                                        <td>{{ $employee->email}}</td>
                                     </tr>
                                    <tr>
                                        <th>DOB(A.D)</th>
                                        <td>{{ $employee->dob}}</td>
                                        <th>Personal Contact no</th> 
                                        {{--  <th>Personal Num</th>--}}
                                        <td>{{ $employee->personal_contact}}</td>
                                    </tr>
                                    <tr>
                                        <th>Office contact number</th> 
                                        {{--<th>Office Num</th>--}}
                                        <td>{{ $employee->office_contact}}</td>
                                        <th>Employee start date</th>
                                        <td>{{ $employee->join_date}}</td>
                                    </tr>
                                    <tr>
                                        <th>Temporary Address</th>
                                        <td>{{ $employee->temp_address}}</td>
                                        <th>Permanent Address</th>
                                        <td>{{ $employee->perm_address}}</td>
                                    </tr>

                                    <tr> 
                                        <th >Department</th>
                                        <td>{{ $employee->departments->dept_name}}</td>
                                        <th>Designation</th>
                                        <td>{{ $employee->designations->desig_name}}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-8 offset-sm-4">
                                <a href="/employee">
                                <button type="back" class="btn btn-primary">Back</button></a>
                            </div>
                        </div>

                </div>
            </div>
        </div>
    </div>

@endsection

@section('title')
-Employee Details View
@endsection
{{-- @extends('pages.sidebar')
@section('content')
    <div class="row justify-content-center">
        
            <div class="col-md-8">
                <h2 class="text-center mb-4">Employee Details View</h2>
                <table class="table table-bordered">
                    <thead class="text-center">
                        <tr>
                            <th>ID</th>
                            <th>Employee Code</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Gender</th>
                            <th>Email</th>
                            <th>DOB(A.D)</th> --}}
                            {{-- <th>Personal Contact no</th> --}}
                            {{-- <th>Personal Num</th> --}}
                            {{-- <th>Office contact number</th> --}}
                            {{-- <th>Office Num</th>
                            <th>Employee start date</th>
                            <th>Temporary Address</th>
                            <th>Permanent Address</th>
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
                            <td>{{ $employee->email}}</td>
                            <td>{{ $employee->dob}}</td>
                            <td>{{ $employee->personal_contact}}</td>
                            <td>{{ $employee->office_contact}}</td>
                           
                            <td>{{ $employee->join_date}}</td>
                            <td>{{ $employee->temp_address}}</td>
                            <td>{{ $employee->perm_address}}</td>
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

@endsection --}}

{{-- @section('title')
-Employee Details View
@endsection --}}