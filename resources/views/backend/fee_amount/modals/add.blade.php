<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<form action="{{ route('fee.amount.store')}}" method="post" autocomplete="off">
   @csrf
   <div class="modal fade bd-example-modal-lg" id="AddFeeAmount" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title">Add Fee Category</h5>
               <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <div class="add_item">
                  <div class="form-group row">
                     <div class="col-lg-6">
                        <select class="form-control input-rounded" id="val-skill" name="fee_category_id" required>
                           <option value="" selected='' disabled="">
                              <font style="vertical-align: inherit;">
                                 <font style="vertical-align: inherit;">Select Category</font>
                              </font>
                           </option>
                           @foreach($fee_categories as $fee_category)
                           <option value="{{ $fee_category->id}}">
                              <font style="vertical-align: inherit;">
                                 <font style="vertical-align: inherit;">{{ $fee_category->name}}</font>
                              </font>
                           </option>
                           @endforeach
                        </select>
                     </div>
                  </div>
                  <div class="form-group row">
                     <div class="col-lg-4">
                        <select class="form-control input-rounded" id="val-skill" name="class_id[]" required>
                           <option value="" selected='' disabled="">
                              <font style="vertical-align: inherit;">
                                 <font style="vertical-align: inherit;">Select Class</font>
                              </font>
                           </option>
                           @foreach($classes as $class)
                           <option value="{{ $class->id}}">
                              <font style="vertical-align: inherit;">
                                 <font style="vertical-align: inherit;">{{ $class->name}}</font>
                              </font>
                           </option>
                           @endforeach
                        </select>
                     </div>
                     <div class="col-lg-5">
                        <input type="text" class="form-control input-rounded" id="name" name="amount[]" placeholder="Enter Amount">
                     </div>
                     <div class="col-lg-3" style="padding-top: 10px;">
                        <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i></span>
                     </div>
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <input type="submit" value="Insert" class="btn btn-primary btn-rounded">
            </div>
         </div>
      </div>
   </div>
   </div>
</form>

<div style="visibility: hidden;">
   <div class="whole_extra_item_add" id="whole_extra_item_add">
      <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
         <div class="form-group row">
            <div class="col-lg-5">
               <select class="form-control input-rounded" id="val-skill" name="class_id[]" required>
                  <option value="" selected='' disabled="">
                     <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">Select Class</font>
                     </font>
                  </option>
                  @foreach($classes as $class)
                  <option value="{{ $class->id}}">
                     <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">{{ $class->name}}</font>
                     </font>
                  </option>
                  @endforeach
               </select>
            </div>
            <div class="col-lg-5">
               <input type="text" class="form-control input-rounded" id="name" name="amount[]" placeholder="Enter Amount">
            </div>
            <div class="col-lg-2" style="padding-top: 10px;">
               <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i></span>
               <span class="btn btn-danger removeeventmore"><i class="fa fa-minus-circle"></i></span>
            </div>
         </div>
      </div>
   </div>
</div>

<script type="text/javascript">
   $(document).ready(function() {
      var counter = 0;
      $(document).on("click", ".addeventmore", function() {
         var whole_extra_item_add = $("#whole_extra_item_add").html();
         $(this).closest('.add_item').append(whole_extra_item_add);
         counter++
      });
      $(document).on("click",".removeeventmore",function(){
         $(this).closest(".delete_whole_extra_item_add").append(delete_whole_extra_item_add).remove();
         counter -=1;
      })
   });
</script>