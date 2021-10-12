<form action="{{ route('user.update',$user->id)}}" method="post" autocomplete="off">
   @csrf
   <div class="modal fade bd-example-modal-lg" id="ModalEditUser{{$user->id}}" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title">Update User</h5>
               <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
               </button>
            </div>
            <div class="modal-body">
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
                     <input type="text" class="form-control rounded" id="val-username" name="name" value="{{ $user->name}}">
                  </div>
                  @error('name')
                  <div class="text-danger">{{$message}}</div>
                  @enderror
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
                     <input type="text" class="form-control rounded" id="val-email" name="email" value="{{ $user->email}}">
                  </div>
                  @error('email')
                     <div class="text-danger">{{ $message}}</div>
                  @enderror
               </div>
               <div class="form-group row">
                  <label class="col-lg-4 col-form-label" for="val-skill">
                     <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">User Role : </font>
                     </font><span class="text-danger">
                        <font style="vertical-align: inherit;">
                           <font style="vertical-align: inherit;">*</font>
                        </font>
                     </span>
                  </label>
                  <div class="col-lg-6">
                     <select class="form-control rounded" id="val-skill" name="usertype">
                        <option value="" selected='' disabled="">
                           <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">Select role</font>
                           </font>
                        </option>
                        <option value="admin" {{($user->usertype == "admin") ? "selected" : ""}}>
                           <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">Admin </font>
                           </font>
                        </option>
                        <option value="user" {{($user->usertype == "user") ? "selected" : ""}}>
                           <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">User </font>
                           </font>
                        </option>
                        @error('usertype')
                        <div class="text-danger">{{ $message}}</div>
                        @enderror
                     </select>
                  </div>
               </div>

            </div>
            <div class="modal-footer">
               <input type="submit" value="Update" class="btn btn-primary btn-rounded">
            </div>
         </div>
      </div>
   </div>
</form>