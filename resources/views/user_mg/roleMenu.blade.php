@extends('pages.sidebar')
@section('content')
<hr>
<style>
    .container {
    /* font-family: Arial, sans-serif;
    max-width: 600px;
    margin: 0 auto;
    padding: 20px; */
    width: 100%;
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
  }
  
  h2 {
    color: #4a4a4a;
    font-size: 18px;
    margin-bottom: 20px;
  }
  
  h3 {
    color: black;
    font-size: 16px;
    margin-top: 20px;
    margin-bottom: 10px;
  }
  
  .filter-section {
    display: flex;
    gap: 10px;
    align-items: center;
    margin-bottom: 20px;
  }
  
  #role-select {
    flex-grow: 1;
    padding: 8px;
    border: 1px solid #ced4da;
    border-radius: 4px;
  }
  
  #filter-btn {
    background-color: #007bff;
    color: white;
    border: none;
    padding: 8px 16px;
    border-radius: 4px;
    cursor: pointer;
  }
  
  .menu-section {
    border: 1px solid #e9ecef;
    border-radius: 4px;
    min-height: 50px;
    padding: 10px;
    margin-bottom: 20px;
  }

  .section-container {
    
    /* border: 1px solid #ccc; */
    
    border: 1px solid #000;
    padding: 20px;
    margin-bottom: 20px;
    border-radius: 5px;
    
  }
                     /* table */
 
.leaderboard {
  width: 100%;
  border-collapse: collapse;
  font-family: Arial, sans-serif;
}

.leaderboard th {
  background-color:  #dadde1;
  color: black;
  text-align: left;
  padding: 10px;
}

.leaderboard td {
  padding: 10px;
  border-bottom: 1px solid #e0e0e0;
}

.leaderboard tr:nth-child(even) {
  background-color: #f9f9f9;
}

.leaderboard .highlight {
  color: #00a86b;
}

.leaderboard .highlight td {
  font-weight: bold;
}
</style>
<div class="container">
    <div class="section-container">
        <h3>View Role and Menu to Assign Menu</h3>

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
        <h3>Selected Role:</h3>
    </div>

    <div class="section-container">
        <h3>Assigned Menu</h3>
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
                                
                                <option value="add">Active</option>
                                <option value="edit">Inactive</option>
                               
                            </select>
                            
                        </td>
                    </tr>
                </tbody>

            </table>
        </div>

    </div>

    <div class="section-container">
        <h3>Unassigned Menu</h3>
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
                               
                                <option value="add">Active</option>
                                <option value="edit">Inactive</option>
                                
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