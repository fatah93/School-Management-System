@extends('admin.admin_master')

@section('main_admin')
<div class="row">
   <div class="col-12">
      <div class="card">
         <div class="card-body">
            <h4 class="card-title">
               <font style="vertical-align: inherit;">
                  <font style="vertical-align: inherit;">Add new user</font>
               </font>
            </h4>
            <div class="container-fluid">
               <form action="{{ route('store.user')}}" method="post" autocomplete="off">
                  @csrf
                  <div class="form-group row">
                     <label class="col-lg-4 col-form-label" for="val-username">
                        <font style="vertical-align: inherit;">
                           <font style="vertical-align: inherit;">User Name :</font>
                        </font><span class="text-danger">
                           <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">*</font>
                           </font>
                        </span>
                     </label>
                     <div class="col-lg-6">
                        <input type="text" class="form-control input-rounded" id="val-username" name="name" placeholder="Enter username" required>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label class="col-lg-4 col-form-label" for="val-email">
                        <font style="vertical-align: inherit;">
                           <font style="vertical-align: inherit;">User email : </font>
                        </font><span class="text-danger">
                           <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">*</font>
                           </font>
                        </span>
                     </label>
                     <div class="col-lg-6">
                        <input type="text" class="form-control input-rounded" id="val-email" name="email" placeholder="Enter email" required>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label class="col-lg-4 col-form-label " for="val-skill">
                        <font style="vertical-align: inherit;">
                           <font style="vertical-align: inherit;">User Role : </font>
                        </font><span class="text-danger">
                           <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">*</font>
                           </font>
                        </span>
                     </label>
                     <div class="col-lg-6">
                        <select class="form-control input-rounded" id="role" name="role" required>
                           <option value="" selected='' disabled="">
                              <font style="vertical-align: inherit;">
                                 <font style="vertical-align: inherit;">Select role</font>
                              </font>
                           </option>
                           <option value="Admin">
                              <font style="vertical-align: inherit;">
                                 <font style="vertical-align: inherit;">Admin role</font>
                              </font>
                           </option>
                           <option value="Operator">
                              <font style="vertical-align: inherit;">
                                 <font style="vertical-align: inherit;">Operator</font>
                              </font>
                           </option>
                        </select>
                     </div>
                  </div>
                  <div class="form-group ">
                     <input type="submit" value="Save" class="btn btn-primary btn-rounded" style="float: right;">
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection