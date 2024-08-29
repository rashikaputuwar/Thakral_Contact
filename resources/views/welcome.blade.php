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
                <h3>Clients</h3>
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
                <h3>Users</h3>
                <div class="card-content">
                    <span class="number">{{ $usersCount }}</span>
                    <span class="icon users-icon">👥</span>
                </div>
            </div>
        </div>
    
       {{-- Calendar --}}
       <div id='calendar'></div>
   
       @else
           <p>You are not logged in.</p>
       @endauth
   
       {{-- External CSS and JS --}}
       <link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css' rel='stylesheet' />
       <style>
        
           
           .dashboard-cards {
                flex: 1;
               display: flex;
               gap: 20px;
               margin-right: 20px; /* Space between cards and calendar */
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
           
           /* Calendar styles */
        #calendar {
            max-width: 300px; /* Smaller width */
            height: 300px; /* Smaller height */
            border: 1px solid #ddd; /* Optional border */
            border-radius: 8px; /* Rounded corners */
            padding: 10px; /* Padding around calendar */
            margin-top: 30px; /* Space above the calendar */
            margin-bottom: 20px; /* Space below the calendar */
        }

        .fc-header-toolbar {
            background-color: #12245c; /* Header background color */
            color: white; /* Header text color */
            border-radius: 8px 8px 0 0; /* Rounded top corners */
        }

        .fc-day.fc-today {
            background-color:  #12245c !important; /* Highlight today's date */
        }

        .fc .fc-toolbar>*>:first-child {
            margin-left: 0;
            font-size: 23px;
        }
        .fc-day-top.fc-today .fc-day-number {
            background-color: #12245c;
            color: white;
            border-radius: 50%;
            width: 24px;
            height: 24px;
            line-height: 24px;
            text-align: center;
            margin: 2px;
        }

        
       </style>
       <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
       <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js'></script>
       <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js'></script>
       <script>
           $(document).ready(function() {
                $('#calendar').fullCalendar({
                    header: {
                        left: '',
                        center: 'title',
                        right: ''
                    },
                    defaultView: 'month',
                    editable: false,
                    events: [],
                    eventClick: function(calEvent, jsEvent, view) {
                        // Handle event click
                        alert('Event: ' + calEvent.title);
                    },
                    viewRender: function(view, element) {
                        // Set the calendar to the current month
                        var now = moment();
                        $('#calendar').fullCalendar('gotoDate', now);

                        // Change the month name to lowercase
                        $('.fc-title').each(function() {
                            $(this).text($(this).text().toLowerCase());
                        });
                    }
                });
            });
       </script>
@endsection
