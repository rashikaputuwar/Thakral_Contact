@extends('pages.sidebar')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h2 class="display-6 text-center"> Permission Information</h2>
                    </div>

                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                        <a href="{{Route('button.create')}}" class="btn btn-success btn-sm btn-add-user">Add Button</a>
                     </div>

                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Button Name</th>
                                <th>Status</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($permissions as $permission)
                            <tr>
                                <td>{{$permission["id"]}}</td>
                                <td>{{$permission["button_name"]}}</td>
                                <td>{{$permission["status"]}}</td>
                                {{-- <td>
                                    <a><button class="btn btn-primary">View</button></a>
                                    <a> <button class="btn btn-warning text-white">Update</button></a>
                                </td> --}}
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