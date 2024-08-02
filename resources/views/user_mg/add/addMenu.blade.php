@extends('pages.sidebar')
@section('content')
     <div class="container">
       <div class="row justify-content-center">
         <div class="col-md-8">
           <h2 class="text-center text-complementary">Add Menu</h2>
           <form action="{{Route('menu.store')}}" method="post">
             @csrf
              {{-- <div class="row mb-3">
                       <label for="menuid" class="col-sm-4 col-form-label text-end required-asterisk">Menu Id</label>
                       <div class="col-sm-8">
                           <input type="text" class="form-control" id="menuid" name="menuid" required>
                       </div>
               </div> --}}

               <div class="row mb-3">
                       <label for="menuname" class="col-sm-4 col-form-label text-end required-asterisk">Name</label>
                       <div class="col-sm-8">
                           <input type="text" class="form-control" id="menuname" name="menuname" required>
                       </div>
                 </div>

                 <div class="row mb-3">
                    <label for="status" class="col-sm-4 col-form-label text-end required-asterisk">Status</label>
                    <div class="col-sm-8">
                        <select class="form-control" id="status" name="status" required>
                          <option value="">---Select Status---</option>
                            <option value="active">Active</option>
                            <option value="inactive">Closed</option>
                            
                        </select>
                    </div>
                </div>

                
               <div class="row mb-3">
                <label for="permissions" class="col-sm-4 col-form-label text-end ">Permissions</label>
                <div class="col-sm-8">
                  
                @foreach ($permissions as $permission)
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="permission{{$permission->id}}" name="permissions[]" value="{{$permission->id}}">
                  <label for="permission{{$permission->id}}" class="form-check-label">{{$permission->button_name}}</label>
                </div>
                    
                @endforeach
          {{-- {{-- </div> --}}
          </div>
          <br>
               <<div class="row">
                <div class="col-sm-8 offset-sm-4">
                    <button type="submit" class="btn btn-primary" style="background-color: #186c6c; border-color: #186c6c; color: white;">Submit</button>
                    <button type="reset" class="btn btn-success" style="background-color: #186c6c; border-color: #186c6c; color: white;">Reset</button>
                </div>
            </div>
           </form>
         </div>
       </div>
     </div>
@endsection
{{-- adding title name --}}
@section('title')
Add_Menu
@endsection