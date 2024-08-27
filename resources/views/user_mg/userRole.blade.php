@extends('pages.sidebar')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h2 class="display-6 text-center">User Role </h2>
                    </div>
                    <div class="card-body">
                        {{-- <a href="{{ route('rolesMenu.create') }}" class="btn btn-success btn-sm btn-add-user">Add</a> --}}
                        <a href="{{ route('userRole.export') }}" class="btn btn-info btn-sm" style="background-color: #4a90e2; border-color: #4a90e2; color: white;">Export to Excel</a>
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
                                            <a href="" class="btn btn-primary btn-sm">View</a>
                                            <a href="" class="btn btn-primary btn-sm">Update</a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td>{{ $user->employee->full_name }}</td>
                                        <td colspan="2">No roles assigned</td>
                                    </tr>
                                @endforelse
                            @endforeach

                                {{-- @foreach ($users as $user)
                                @php
                                    $roles = $user->roles->unique('id');
                                    // dd($roles);
                                @endphp
                                @foreach ($roles as $role)
                                    <tr>
                                        @if ($loop->first)
                                            <td rowspan="{{ $roles->count() }}">{{  $user->employee->full_name  }}</td>
                                        @endif
                                        <td>{{ $role->role_name }}</td>
                                        <td>
                                            <a href="{{ route('roleMenu.show', $user->id) }}" class="btn btn-primary btn-sm">View</a>
                                            <a href="{{ route('edit.User', $user->id) }}" class="btn btn-primary btn-sm">Update</a>
                                        </td>
                                    </tr>
                                @endforeach
                                @if ($user->roles->isEmpty())
                                    <tr>
                                        <td>{{ $user->employee->full_name  }}</td>
                                        <td colspan="2">No roles assigned</td>
                                    </tr>
                                @endif
                            @endforeach --}}
                               
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('title')
    Role Menu
@endsection



