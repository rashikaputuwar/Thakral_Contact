@extends('pages.sidebar')
@section('content')
@php
    $roleMenus = session('role_menus', collect([]));

    // Check permissions for add, edit, and view actions
    $hasAddPermission = $roleMenus->contains(fn($item) => $item->menu_id == 2 && $item->permission_id == 1);
    $hasEditPermission = $roleMenus->contains(fn($item) => $item->menu_id == 2 && $item->permission_id == 4);
    $hasViewPermission = $roleMenus->contains(fn($item) => $item->menu_id == 2 && $item->permission_id == 5);
@endphp
    <div class="container">

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h2 class="display-6 text-center"> Employees Details</h2>
                    </div>

                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            @if ($hasAddPermission)
                        <a href="{{Route('employee.create')}}" class="btn btn-success btn-sm btn-add-user">Add Employee</a>
                        @endif
                        </div>
                        <table class="table table-bordered">
                            <thead class="text-center">
                            <tr>
                                <th>ID</th>
                                {{-- <th>Employee Code</th> --}}
                                <th>Name</th>
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
                            {{-- <td>{{ $employee->emp_code }}</td> --}}
                            <td>
                                {{ $employee->fname }}
                                {{ $employee->midname }}
                                {{ $employee->lname }}
                            </td>
                            <td>{{ $employee->gender}}</td>
                            <td>{{ $employee->departments->dept_name}}</td>
                            <td>{{ $employee->designations->desig_name}}</td>
                            <td>
                                @if ($hasViewPermission)
                                <a href="{{Route('employee.show',$employee->id)}}" class="btn btn-primary btn-sm">View</a>
                                @endif 
                                @if ($hasEditPermission)
                                <a href="{{Route('employee.edit',$employee->id)}}" class="btn btn-primary btn-sm">Update</a>
                                @endif 
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