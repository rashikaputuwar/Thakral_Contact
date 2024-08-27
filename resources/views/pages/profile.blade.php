@extends('pages.sidebar')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                    <h3>User Profile</h3>
                </div>
                <div class="card-body">
                    <div class="row mb-4 text-center">
                        <div class="col-md-12">
                            @if ($user->employee && $user->employee->photo_blob)
                            <img src="data:image/jpeg;base64,{{ base64_encode($user->employee->photo_blob) }}" alt="Profile Photo" class="profile-photo rounded-circle" style="width: 150px; height: 150px;">
                        @else
                            <p>No photo available</p>
                        @endif
                        
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 text-end"> 
                            <strong>First Name:</strong>
                        </div>
                        <div class="col-md-8">
                            {{ $user->employee->fname }}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 text-end">
                            <strong>Middle Name:</strong>
                        </div>
                        <div class="col-md-8">
                            {{ $user->employee->midname }}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 text-end">
                            <strong>Last Name:</strong>
                        </div>
                        <div class="col-md-8">
                            {{ $user->employee->lname }}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 text-end">
                            <strong>Email:</strong>
                        </div>
                        <div class="col-md-8">
                            {{ $user->employee->email }}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 text-end">
                            <strong>Designation:</strong>
                        </div>
                        <div class="col-md-8">
                            {{ $user->employee->designation->desig_name ?? 'No Designation' }}
                            {{-- {{ $user->designation->desig_name }} --}}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 text-end">
                            <strong>Department:</strong>
                        </div>
                        <div class="col-md-8">
                            {{ $user->employee->department->dept_name ?? 'No Department Assigned'}}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 text-end">
                            <strong>Joining Date:</strong>
                        </div>
                        <div class="col-md-8">
                            {{ \Carbon\Carbon::parse($user->employee->join_date)->format('d M, Y') }}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 text-end">
                            <strong>Contact:</strong>
                        </div>
                        <div class="col-md-8">
                            {{ $user->employee->personal_contact }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


{{-- adding title name --}}
@section('title')
Profile
@endsection