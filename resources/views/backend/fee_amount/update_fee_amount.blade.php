@extends('admin.admin_master')

@section('main_admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="row">
   <div class="row page-titles mx-0">
      <div class="col p-md-0">
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Setup</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Update Fee Amount</a></li>
         </ol>
      </div>
   </div>
   <!-- row -->
   <div class="container-fluid">
      <div class="row">
         <div class="col-12">
            <div class="card">
               <div class="card-body">
                  <form action="{{ route('fee.amount.update',$editData[0]->fee_category_id)}}" method="post" autocomplete="off">
                     @csrf
                     <div class="form-group row">
                        <div class="col-lg-6">
                           <select class="form-control input-rounded" id="val-skill" name="fee_category_id" required>
                              <option value="" selected='' disabled="">
                                 <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">Select Category</font>
                                 </font>
                              </option>
                              @foreach($fee_categories as $fee_category)
                              <option value="{{ $fee_category->id}}" {{ ($editData["0"]->fee_category_id == $fee_category->id)?"selected":"" }}>
                                 <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">{{ $fee_category->name}}</font>
                                 </font>
                              </option>
                              @endforeach
                           </select>
                        </div>
                     </div>
                     <div class="add_item">
                        @foreach($editData as $edit)
                        <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
                           <div class="form-group row">
                              <div class="col-lg-5">
                                 <select class="form-control input-rounded" id="val-skill" name="class_id[]" required>
                                    @foreach($classes as $class)
                                    <option value="{{ $class->id}}" {{ ($edit->class_id == $class->id)?"selected":""}}>
                                       <font style="vertical-align: inherit;">
                                          <font style="vertical-align: inherit;">{{ $class->name}}</font>
                                       </font>
                                    </option>
                                    @endforeach
                                 </select>
                              </div>
                              <div class="col-lg-5">
                                 <input type="text" class="form-control input-rounded" id="name" name="amount[]" value="{{$edit->amount }}">
                              </div>
                              <div class="col-lg-2" style="padding-top: 10px;">
                                 <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i></span>
                                 <span class="btn btn-danger removeeventmore"><i class="fa fa-minus-circle"></i></span>
                              </div>
                           </div>
                        </div>
                        @endforeach
                     </div>
                     <div class="col">
                        <input type="submit" value="Update" class="btn btn-primary btn-rounded" style="float:right">
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>

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
               <div class="col-lg-2" style="padding-top: px;">
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
            counter++;
         });
         $(document).on("click", ".removeeventmore", function(event) {
            $(this).closest(".delete_whole_extra_item_add").remove();
            counter--;
         })
      });
   </script>
   @endsection