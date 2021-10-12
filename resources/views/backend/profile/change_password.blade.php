@extends('admin.admin_master')

@section('main_admin')

<div class="col-lg-12">
   <div class="card">
      <div class="card-body">
         <h4 class="card-title">
            <font style="vertical-align: inherit;">
               <font style="vertical-align: inherit;">Change Password</font>
            </font>
         </h4>
         <div class="basic-form">
            <form method="post" action="{{ route('profile.update.password')}}">
               @csrf 
               <div class="form-group row">
                  <label class="col-md-4 col-form-label text-center">
                     <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">Current Pasword</font>
                        <span class="text-danger">*</span>
                     </font>
                  </label>
                  <div class="col-md-4">
                     <input type="password" id="current_password" name="current_password" class="form-control input-rounded" placeholder="Current Password" autocomplete="off">
                  </div>
                  @error('current_password')
                     <div class="text-danger">{{ $message}}</div>
                  @enderror
               </div>
               <div class="form-group row">
                  <label class="col-md-4 col-form-label text-center">
                     <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">New Password</font>
                        <span class="text-danger">*</span>
                     </font>
                  </label>
                  <div class="col-md-4">
                     <input type="password" id="password" name="password" class="form-control input-rounded" placeholder="New Password" autocomplete="off">
                  </div>
                  @error('password')
                     <div class="text-danger">{{ $message}}</div>
                  @enderror
               </div>
               <div class="form-group row">
                  <label class="col-md-4 col-form-label text-center">
                     <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">Confirm Password</font>
                        <span class="text-danger">*</span>
                     </font>
                  </label>
                  <div class="col-md-4">
                     <input type="password" id="password_confirmation" name="password_confirmation" class="form-control input-rounded" placeholder="Confirm password" autocomplete="off">
                  </div>
                  @error('password_confirmation')
                     <div class="text-danger">{{ $message}}</div>
                  @enderror
               </div>
               <div class="form-group row">
                  <div class="col-md-12">
                     <input type="submit" value="Save change" class="btn btn-primary btn-rounded" style="float: right;">
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
@endsection