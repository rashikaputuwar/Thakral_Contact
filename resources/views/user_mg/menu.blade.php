@extends('pages.sidebar')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="d-flex flex-grow-1 justify-content-center">
                            <h2 class="display text-center"> Menu Information</h2>
                            </div>
                            <a href="{{ route('menu.create') }}" class="btn btn-success btn-sm btn-add-user" style="background-color: #186c6c; border-color: #186c6c; color: white;">Add Menu</a>
                        </div>

                    <div class="card-body">
                        <div class="table-responsive mt-3">
                        <table class="table table-bordered">
                            <thead class="text-center">
                            <tr>
                                <th>Id</th>
                                <th>Menu</th>
                                <th>Action</th>  
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($menus as $id => $menu)
                            <tr>
                                <td>{{ $menu->id }}</td>
                                <td>{{ $menu->menu_name }}</td>
                                <td>
                                    <a href="{{Route('menu.show', $menu->id)}}" class="btn btn-sm" title="View">
                                        <span style="display: inline-block; width: 30px; height: 30px; background-color: rgb(26, 210, 60); text-align: center; line-height: 30px; border-radius: 5px;">
                                            <i class="fas fa-eye" style="color: white;"></i>
                                        </span>
                                    </a>

                                    <a href="{{Route('menu.show', $menu->id)}}" class="btn btn-sm" title="Update">
                                        <span style="display: inline-block; width: 30px; height: 30px; background-color: rgb(56, 25, 213); text-align: center; line-height: 30px; border-radius: 5px;">
                                            <i class="fas fa-edit" style="color: white;"></i>
                                        </span>
                                    </a>
                                </td>
                                {{-- <td></td> --}}
                            </tr>
                           @endforeach
                        </tbody>

                        </table>
                    </div>
                    <div class="d-flex justify-content-end mt-4 mb-3 pr-4">
                        {{ $menus->links('pagination::bootstrap-5') }}
                    </div>
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