@extends('pages.sidebar')
@section('content')
    <div class="row justify-content-center">

            <div class="col-md-10">
                <h2 class="text-center mb-4">Menu Button</h2>
                <table class="table table-bordered">

                        <tr style="background-color: lightgray;">
                            <th style="background-color: lightgray;">Id</th> 
                            <td >{{ $menus->id }}</td>

                            <th>Menu Name</th>
                            <td>{{ $menus->menu_name }}</td>
                        </tr>
                       
                        <tr>
                            <th>Status</th> 
                            <td>{{ $menus->status}}</td> 
                            <th>Permissions</th> 
                            <td>
                                @foreach($menus->permissions as $permission)
                            <div class="permission-item">
                                {{ $permission->button_name }}
                                @if (!$loop->last)
                                    <hr class="my-1">
                                @endif
                            </div>
                        @endforeach
                            </td>
                        </tr>

                        
                </table>
            </div>
    </div>
    <div class="row">
        <div class="col-sm-8 offset-sm-4">
            <a href="{{Route('menu.index')}}">
            <button type="back" class="btn btn-primary" style="background-color: #186c6c; border-color: #186c6c; color: white;">Back</button></a>
        </div>
    </div>

@endsection

@section('title')
-View User Page
@endsection