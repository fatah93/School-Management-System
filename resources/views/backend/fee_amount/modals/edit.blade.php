<form action="{{ route('fee.amount.update'',$fee_amount_category->id)}}" method="post" autocomplete="off">
   @csrf
   <div class="modal fade" id="MadelEditFeeAmount{{$fee_amount_category->id}}" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title">Update Fee Amount</h5>
               <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <div class="form-group row">
                  <label class="col-lg-3 col-form-label" for="val-username">
                     <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;"> Name :</font>
                     </font><span class="text-danger">
                        <font style="vertical-align: inherit;">
                           <font style="vertical-align: inherit;">*</font>
                        </font>
                     </span>
                  </label>
                  <div class="col-lg-7">
                     <input type="text" class="form-control input-rounded" id="name" name="name" value="{{ $fee_amount_category->name}}">
                     @error('name')
                     <div class="text-danger">{{ $message }}</div>
                     @enderror
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