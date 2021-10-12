<form action="{{ route('store.user')}}" method="post" autocomplete="off"   >
   @csrf 
   <div class="modal fade bd-example-modal-lg" id="ModalAddUser" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title">Add user</h5>
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
                     <input type="text" class="form-control rounded" id="val-username" name="name" placeholder="Enter username"  required>
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
                     <input type="text" class="form-control rounded" id="val-email" name="email" placeholder="Enter email" required>
                  </div>
               </div>
               <div class="form-group row">
                  <label class="col-lg-4 col-form-label" for="val-email">
                     <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">Password : </font>
                     </font><span class="text-danger">
                        <font style="vertical-align: inherit;">
                           <font style="vertical-align: inherit;">*</font>
                        </font>
                     </span>
                  </label>
                  <div class="col-lg-6">
                     <input type="password" class="form-control rounded" id="val-password" name="password" placeholder="Enter password" required>
                  </div>
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
                     <select class="form-control rounded" id="val-skill" name="usertype" required>
                        <option value="" selected='' disabled="" >
                           <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">Select role</font>
                           </font>
                        </option>
                        <option value="admin">
                           <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">Admin role</font>
                           </font>
                        </option>
                        <option value="user">
                           <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">User role</font>
                           </font>
                        </option>
                     </select>
                  </div>
               </div>

            </div>
            <div class="modal-footer">
               <input type="submit" value="Save" class="btn btn-primary btn-rounded">
            </div>
         </div>
      </div>
   </div>
</form>