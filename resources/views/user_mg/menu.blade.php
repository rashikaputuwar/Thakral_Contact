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
                        <a href="{{ route('menu.create') }}" class="btn btn-success btn-sm btn-add-user">Add Menu</a>
                     </div>

                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Menu</th>
                                <th>Status</th>
                                <th>Action</th>            
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($menus as $item)
                            <tr>
                                <td>{{$item["menu_id"]}}</td>
                                <td>{{$item["menu_name"]}}</td>
                                <td>{{$item["status"]}}</td>
                                <td>
                                    <a><button class="btn btn-primary">View</button></a>
                                    <a> <button class="btn btn-warning text-white">Update</button></a>
                                </td>
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