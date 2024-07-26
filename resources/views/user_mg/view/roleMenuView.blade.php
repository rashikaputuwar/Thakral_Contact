@extends('pages.sidebar')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h2 class="text-center mb-4">Role Menu View</h2>
            <table class="table table-bordered">
                <tr>
                    <th>Role</th> 
                    <td>{{ $user->id }}</td>
                    <th>Menu</th>
                     <td>{{ $menu->menu_name }}</td>
                    
                </tr>
                <tr>
                    <th>Permission</th>
                    
                </tr>
                
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-8 offset-sm-4">
            <a href="/rolesmenu">
            <button type="back" class="btn btn-primary">Back</button></a>
        </div>
    </div>

@endsection

@section('title')
-View User Page
@endsection


