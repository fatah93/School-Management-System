@extends('admin.admin_master')

@section('main_admin')
<div class="row ">
   <div class="container-fluid">
      <div class="card">
         <div class="card-body">
            <h4 class="card-title">
               Promotion Student
            </h4>
            <form action="{{ route('promotion.student.registration',$editData->student_id)}}" method="post"  enctype="multipart/form-data">
               @csrf
               <input type="hidden" value="{{$editData->id}}" name="id">

               <div class="form-group row">
                  <div class="col-lg-4">
                     <h5>Year <span class="text-danger">&nbsp;*</span></h5>
                     <select class="form-control rounded" id="year" name="year_id" required>
                        @foreach($Years as $year)
                        <option value="{{ $year->id}} " {{($editData->year_id==$year->id) ? "selected":"" }}>
                           <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">{{ $year->name}}</font>
                           </font>
                        </option>
                        @endforeach
                     </select>
                  </div>
                  <div class="col-lg-4">
                     <h5>Class <span class="text-danger">&nbsp;*</span></h5>
                     <select class="form-control rounded" id="class" name="class_id" required>
                        @foreach($Classes as $class)
                        <option value="{{ $class->id}}" {{($editData->class_id==$class->id)?"selected":"" }}>
                           <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">{{ $class->name}}</font>
                           </font>
                        </option>
                        @endforeach
                     </select>
                  </div>
                  <div class="col-lg-4">
                     <h5>Group <span class="text-danger">&nbsp;*</span></h5>
                     <select class="form-control rounded" id="group" name="group_id" required>
                        @foreach($groupes as $group)
                        <option value="{{ $group->id}}" {{($editData->group_id==$class->id)?"selected":"" }}>
                           <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">{{ $group->name}}</font>
                           </font>
                        </option>
                        @endforeach
                     </select>
                  </div>
               </div>

               <div class="form-group row">
                  <div class="col-lg-4">
                     <h5>Shift <span class="text-danger">&nbsp;*</span></h5>
                     <select class="form-control rounded" id="shift" name="shift_id" required>
                        @foreach($Shifts as $shift)
                        <option value="{{ $shift->id}}" {{($editData->shift_id==$shift->id)?"selected":"" }}>
                           <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">{{ $shift->name}}</font>
                           </font>
                        </option>
                        @endforeach
                     </select>
                  </div>
                  <div class="col-lg-4">
                     <h5>Discount <span class="text-danger">&nbsp;*</span> </h5>
                     <input type="text" class="form-control rounded" id="discount" name="discount" value="{{(@$editData->discount->discount)?$editData->discount->discount:"0"}}" required>
                  </div>
               </div>
               <!---End Fiveth Row-->
               <div class="modal-footer">
                  <input type="submit" value="Promotion" class="btn btn-primary btn-rounded">
               </div>
            </form>
         </div>
      </div>
   </div>

</div>
@endsection