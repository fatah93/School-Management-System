@extends('admin.admin_master')

@section('main_admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="row">
   <div class="row page-titles mx-0">
      <div class="col p-md-0">
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Setup</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Add Assign subject</a></li>
         </ol>
      </div>
   </div>
   <!-- row -->
   <div class="container-fluid">
      <div class="row">
         <div class="col-12">
            <div class="card">
               <div class="card-body">
                  <form action="{{ route('assign.subject.store')}}" method="post" autocomplete="off">
                     @csrf
                     <div class="form-group row">
                        <div class="col-lg-3">

                        </div>
                        <div class="col-lg-6">
                           <select class="form-control input-rounded" id="val-skill" name="class_id" required>
                              <option value="" selected='' disabled="">
                                 <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">Select class</font>
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
                     </div>
                     <div class="add_item">
                        <div class="form-group row">
                           <div class="col-lg-4">
                              <select class="form-control input-rounded" id="val-skill" name="subject_id[]" required>
                                 <option value="" selected='' disabled="">
                                    <font style="vertical-align: inherit;">
                                       <font style="vertical-align: inherit;">Select Subject</font>
                                    </font>
                                 </option>
                                 @foreach($subjects as $subject)
                                 <option value="{{ $subject->id}}">
                                    <font style="vertical-align: inherit;">
                                       <font style="vertical-align: inherit;">{{ $subject->name}}</font>
                                    </font>
                                 </option>
                                 @endforeach
                              </select>
                           </div>
                           <div class="col-lg-2">
                              <input type="text" class="form-control input-rounded" id="name" name="full_mark[]" placeholder=" Full Mark">
                           </div>
                           <div class="col-lg-2">
                              <input type="text" class="form-control input-rounded" id="name" name="pass_mark[]" placeholder=" Pass Mark">
                           </div>
                           <div class="col-lg-2">
                              <input type="text" class="form-control input-rounded" id="name" name="subjective_mark[]" placeholder="Subjective Mark">
                           </div>
                           <div class="col-lg-2" style="padding-top: 10px;">
                              <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i></span>
                           </div>
                        </div>
                     </div>
                     <div class="col">
                        <input type="submit" value="Insert" class="btn btn-primary btn-rounded" style="float:right">
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
               <div class="col-lg-4">
                  <select class="form-control input-rounded" id="val-skill" name="subject_id[]" required>
                     <option value="" selected='' disabled="">
                        <font style="vertical-align: inherit;">
                           <font style="vertical-align: inherit;">Select Subject</font>
                        </font>
                     </option>
                     @foreach($subjects as $subject)
                     <option value="{{ $subject->id}}">
                        <font style="vertical-align: inherit;">
                           <font style="vertical-align: inherit;">{{ $subject->name}}</font>
                        </font>
                     </option>
                     @endforeach
                  </select>
               </div>
               <div class="col-lg-2">
                  <input type="text" class="form-control input-rounded" id="name" name="full_mark[]" placeholder="Enter Full Mark">
               </div>
               <div class="col-lg-2">
                  <input type="text" class="form-control input-rounded" id="name" name="pass_mark[]" placeholder="Enter Pass Mark">
               </div>
               <div class="col-lg-2">
                  <input type="text" class="form-control input-rounded" id="name" name="subjective_mark[]" placeholder="Subjective Mark">
               </div>
               <div class="col-lg-2" style="padding-top: px;">
                  <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i></span>
                  <span class="btn btn-danger removeeventmore"><i class="fa fa-minus-circle"></i></span>
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
   </div>
</div>
@endsection