@extends('pages.sidebar')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h2 class="display-6 text-center"> Role Menu Details</h2>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                        
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            <h3 class="centre">{{$roles->role_name}}</h3>
                        <table class="table table-bordered">
                <tr>
                <th>Menu</th> 
                <td>
                    @if($roles->menus)
                        <ul style="list-style-type: none;">
                            @foreach($roles->menus as $menu)
                                <li>
                                    <span style="color: black; ">&#8226;</span>
                                    {{ $menu->menu_name }}
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </td>
                
                <th>Permission</th>
                <td colspan="3">
                    <ul style="list-style-type: none;">
                       @if($roles->permissions->isNotEmpty())
                            @foreach($roles->permissions as $permission)
                                <li>
                                    <span style="color: black; ">&#8226;</span>
                                   {{ $permission->button_name }}
                               </li>
                           @endforeach
                       @endif
                   </ul>
                </td>


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
                </div>
            </div>
        </div>
    </div>

@endsection

@section('title')
-View Role MenuPage
@endsection