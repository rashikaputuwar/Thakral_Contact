@extends('pages.sidebar')
@section('content')
@php
    $roleMenus = session('role_menus', collect([]));

    // Check permissions for add, edit, and view actions
    $hasAddPermission = $roleMenus->contains(fn($item) => $item->menu_id == 2 && $item->permission_id == 1);
    $hasEditPermission = $roleMenus->contains(fn($item) => $item->menu_id == 2 && $item->permission_id == 4);
    $hasViewPermission = $roleMenus->contains(fn($item) => $item->menu_id == 2 && $item->permission_id == 5);
@endphp
    <div class="container ">

        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="d-flex flex-grow-1 justify-content-center">
                        <h3 class="display text-center my-0"> Employees Details</h3>
                    </div>
                    @if ($hasAddPermission)
                    <a href="{{Route('employee.create')}}" class="btn btn-success btn-sm btn-add-user" style="background-color: #186c6c; color: white; border-color: #90B494;"><i class="fas fa-plus"></i> Add </a>
                    @endif
                    </div>

                    <div class="card-body">
                        <div class="table-responsive mt-3">
                            <table class="table table-bordered table-fixed">
                                <thead class="text-center">
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Gender</th>
                                    <th>Department</th>
                                    <th>Designation</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                              
                                @foreach($employees as $employee)
                            <tr>
                                <td>{{ $employee->id }}</td>
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
                                    <a href="{{Route('employee.show',$employee->id)}}" class="btn btn-sm" title="View">
                                        <span style="display: inline-block; width: 30px; height: 30px; border-color: brown;  text-align: center; line-height: 30px; border-radius: 5px;">
                                            
                                            <i class="fas fa-eye" style="color:  brown;"></i>
                                        </span>
                                    </a>
                                    @endif
                                    @if ($hasEditPermission)
                                    <a href="{{Route('employee.edit',$employee->id)}}" class="btn btn-sm" title="Update">
                                        <span style="display: inline-block; width: 30px; height: 30px; border-color: brown; text-align: center; line-height: 30px; border-radius: 5px;">
                                            <i class="fas fa-edit" style="color:  brown;"></i>
                                        </span>
                                    </a>
                                    @endif
                                </td>
                            </tr>
                                @endforeach
                            </tbody>
                            </table>
                        </div>
                   
                            <div class="d-flex justify-content-end mt-4 mb-3 pr-4 pl-5" >
                                {{ $employees->links('pagination::bootstrap-5') }}
                            </div>
                        <div class="d-flex justify-content-end mt-4 mb-3 pr-4" type="margin-top: 20px;">
                            @if ($hasExportPermission)
                            <a href="{{ route('employee.export') }}" class="btn btn-info btn-sm ml-auto" style="background-color: #107c41; border-color: #107c41; color: white;">Export to Excel</a>
                        @endif
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