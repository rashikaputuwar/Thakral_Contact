@extends('pages.sidebar')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="d-flex flex-grow-1 justify-content-center">
                            <h3 class="display text-center">User Role </h3>
                            </div>
                    </div>
                    <div class="card-body">
                       <div class="table-responsive mt-3">
                            <table class="table table-bordered">
                                <thead class="text-center">
                                    <tr>
                                        <th>User</th>
                                        <th>Role</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                    @php
                                        $roles = $user->roles; // Ensure roles are fetched correctly
                                    @endphp
                                    @forelse ($roles as $role)
                                        <tr>
                                            @if ($loop->first)
                                                <td rowspan="{{ $roles->count() }}">
                                                    {{-- {{ $user->employee->full_name }} --}}
                                                    @if ($user->employee)
                                                    {{ $user->employee->full_name }}
                                                @else
                                                    No Employee Data
                                                @endif
                                                </td>
                                            @endif
                                            <td>{{ $role->role_name }}</td>
                                            <td>
                                                <a href="" class="btn btn-sm" title="View">
                                                    <span style="display: inline-block; width: 30px; height: 30px; background-color: rgb(26, 210, 60); text-align: center; line-height: 30px; border-radius: 5px;">
                                                        <i class="fas fa-eye" style="color: white;"></i>
                                                    </span>
                                                </a>
                                                <a href="" class="btn btn-sm" title="Update">
                                                    <span style="display: inline-block; width: 30px; height: 30px; background-color: rgb(56, 25, 213); text-align: center; line-height: 30px; border-radius: 5px;">
                                                        <i class="fas fa-edit" style="color: white;"></i>
                                                    </span>
                                                </a>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td>{{ $user->employee->full_name }}</td>
                                            <td colspan="2">No roles assigned</td>
                                        </tr>
                                    @endforelse
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-end mt-4 mb-3 pr-4">
                            {{ $users->links('pagination::bootstrap-5') }}
                        </div>
                        <div class="d-flex justify-content-end  mt-4 mb-3 pr-4">
                            
                            <a href="{{ route('userRole.export') }}" class="btn btn-info btn-sm" style="background-color: #4a90e2; border-color: #4a90e2; color: white;">Export to Excel</a>
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('title')
    Role Menu
@endsection



