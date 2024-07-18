@extends('pages.sidebar')
@section('content')
     <div class="container">
       <div class="row justify-content-center">
         <div class="col-md-8">
           <h2 class="text-center text-complementary">Add Permission</h2>
           <form action="#" method="post">
             @csrf
              {{-- <div class="row mb-3">
                       <label for="permissionid" class="col-sm-4 col-form-label text-end">Menu Id</label>
                       <div class="col-sm-8">
                           <input type="text" class="form-control" id="permissionid" name="permissionid" required>
                       </div>
               </div> --}}

               <div class="row mb-3">
                       <label for="button_name" class="col-sm-4 col-form-label text-end required-asterisk">Button Name</label>
                       <div class="col-sm-8">
                           <input type="text" class="form-control auto-resize" id="button_name" name="button_name" required>
                       </div>
                 </div>

                 <div class="row mb-3">
                    <label for="status" class="col-sm-4 col-form-label text-end required-asterisk">Status</label>
                    <div class="col-sm-8">
                        <select class="form-control auto-resize" id="status" name="status" required>
                            <option value="">--Select Status---</option>
                            <option value="active">Active</option>
                            <option value="inactive">Closed</option>
                            <option value="locked">Locked</option>
                        </select>
                    </div>
                </div>

               <div class="row">
                     <div class="col-sm-8 offset-sm-4">
                           <button type="submit" class="btn btn-primary">Submit</button>
                           <button type="reset" class="btn btn-success">Reset</button>
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