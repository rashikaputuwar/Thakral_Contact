@extends('pages.sidebar')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h2 class="display-6 text-center"> Menu Information</h2>
                    </div>

                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                        <a href="{{ route('menu.create') }}" class="btn btn-success btn-sm btn-add-user" style="background-color: #186c6c; border-color: #186c6c; color: white;">Add Menu</a>
                        
                     </div>

                        <table class="table table-bordered">
                            <thead class="text-center">
                            <tr>
                                <th>Id</th>
                                <th>Menu</th>
                                {{-- <th>Status</th> --}}
                                <th>Action</th>            
                                {{-- <th>Button</th>             --}}
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($menus as $id => $menu)
                            <tr>
                                <td>{{ $menu->id }}</td>
                                <td>{{ $menu->menu_name }}</td>
                                {{-- <td>{{ $menu->status }}</td> --}}
                                <td>
                                    {{-- <a href="{{Route('menu.show',$menu->id)}}" style="background-color:#186c6c ; border-color: #186c6c ; color: white;"><button class="btn btn-primary">View</button></a> --}}
                                    <a href="{{Route('menu.show', $menu->id)}}" class="btn btn-primary" style="background-color: rgb(125,125,235); border-color: rgb(125,125,235); color: white;">View</a>

                                    <a href="{{Route('menu.show', $menu->id)}}" class="btn btn-primary"style="background-color: rgb(125,125,235); border-color: rgb(125,125,235); color: white;">Update</a>
                                    {{-- <a> <button class="btn btn-primary">Update</button></a> --}}
                                </td>
                                {{-- <td></td> --}}
                            </tr>
                           @endforeach
                        </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- adding title name --}}
@section('title')
- Role  
@endsection