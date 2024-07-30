@extends('pages.sidebar')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h2 class="display-6 text-center"> User Information Details</h2>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                        
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-10">
                        <table class="table table-bordered">
                <tr>
                    <th>Role</th> 
                    <td>{{ $roles->role_name }}</td>
                    @foreach ($roles->menus as $menu)
                    
                        <th>Menu</th>
                        <td>{{ $menu->menu_name }}</td>
                </tr>
                <tr>
                    <th>Permission</th>
                        <td colspan="3">
                        <ul>
                        @if ($roles->permissions->isNotEmpty())
                            {{ $roles->permissions->first()->button_name }}
                        @endif
                        </ul>
                    </td>
                </tr>
                        
                
                    @endforeach
            </table>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-8 offset-sm-4">
                            <a href="/rolesmenu">
                            <button type="back" class="btn btn-primary">Back</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('title')
-View User Page
@endsection