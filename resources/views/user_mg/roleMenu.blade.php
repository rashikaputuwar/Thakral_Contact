@extends('pages.sidebar')
@section('content')
<hr>
<div class="container">
    <div class="section-container">
        <h1>View Role and Menu to Assign Menu</h1>

        <div class="filter-section">
            <select id="role-select">
                <option value="Super Administrator">Super Administrator</option>
                <option value="Administrator">Administrator</option>
                <option value="Officer">Officer</option>
                <option value="Data Entry">Data Entry</option>
                <option value="Report Viewer">Report Viewer</option>
            </select>
            <button id="filter-btn">Filter</button>
        </div>
        <h1>Selected Role:...</h1>
    </div>

    <div class="section-container">
        <h1>Assigned Menu</h1>
        <div class="menu-section assigned-menu">
            <table class="leaderboard">
                <thead>
                    <tr>
                        <th>SN</th>
                        <th>Menu Id</th>
                        <th>Reference no</th>
                        <th>Active</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>R001</td>
                        <td>Admin</td>
                        <td>Yes</td>
                        <td>
                            <select>
                                <option value="">Select Action</option>
                                <option value="add">Active</option>
                                <option value="edit">Inactive</option>
                                <option value="delete">Closed</option>
                            </select>
                            
                        </td>
                    </tr>
                </tbody>

            </table>
        </div>

    </div>

    <div class="section-container">
        <h1>Unassigned Menu</h1>
        <div class="menu-section unassigned-menu">
            <table class="leaderboard">
                <thead>
                    <tr>
                        <th>SN</th>
                        <th>Menu Id</th>
                        <th>Reference no</th>
                        <th>Active</th>
                        <th>Add</th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>R001</td>
                        <td>Admin</td>
                        <td>
                            <select>
                                <option value="">Select Action</option>
                                <option value="add">Active</option>
                                <option value="edit">Inactive</option>
                                <option value="delete">Closed</option>
                            </select>
                        </td>
                        <td><button>Add</button></td>
                    </tr>
            </table>
        </div>
    </div>
</div>
@endsection

{{-- adding title name --}}
@section('title')
-Role_Menu
@endsection