@extends('pages.sidebar')

@section('content')
    @auth
        {{-- Welcome message and role list --}}
        {{-- 
        <p>Welcome, {{ Auth::user()->user_name }}! You are logged in.</p>
        <p>Welcome, {{ session('employee_fname') }} {{ session('employee_lname') }}! You are logged in.</p>
        <ul>
            @foreach(session('userRoles', []) as $role)
                <li>{{ $role }}</li>
            @endforeach
        </ul>
        --}}
        
        {{-- Dashboard Cards --}}
        <div class="dashboard-cards">
            <div class="card">
                <h3>Contact</h3>
                <div class="card-content">
                    <span class="number">{{ $clientsCount }}</span>
                    <span class="icon schedule-icon">📅</span>
                </div>
            </div>
            <div class="card">
                <h3>Departments</h3>
                <div class="card-content">
                    <span class="number">{{ $departmentsCount }}</span>
                    <span class="icon department-icon">👥</span>
                </div>
            </div>
            <div class="card">
                <h3>Employees</h3>
                <div class="card-content">
                    <span class="number">{{ $employeesCount }}</span>
                    <span class="icon employee-icon">👤</span>
                </div>
            </div>
            <div class="card">
                <h3>Users & Members</h3>
                <div class="card-content">
                    <span class="number">{{ $usersCount }}</span>
                    <span class="icon users-icon">👥</span>
                </div>
            </div>
        </div>
    @else
        <p>You are not logged in.</p>
    @endauth

    <style>
        .dashboard-cards {
            display: flex;
            gap: 20px;
        }
        
        .card {
            background-color: white;
            border-radius: 8px;
            padding: 20px; /* Increased padding */
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            width: 240px; /* Increased width */
        }
        
        .card h3 {
            margin-top: 0;
            color: #666;
            font-size: 16px; /* Increased font size */
        }
        
        .card-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .number {
            font-size: 28px; /* Increased font size */
            font-weight: bold;
        }
        
        .icon {
            background-color: #e6f3ff;
            border-radius: 50%;
            width: 50px; /* Increased icon size */
            height: 50px; /* Increased icon size */
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px; /* Increased font size */
        }
        
        /* You might want to use actual icons instead of emojis */
        .schedule-icon { content: '📅'; }
        .department-icon { content: '👥'; }
        .employee-icon { content: '👤'; }
        .users-icon { content: '👥'; }
        </style>

        
@endsection
