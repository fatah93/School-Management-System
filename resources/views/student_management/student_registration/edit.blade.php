@extends('admin.admin_master')

@section('main_admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="row ">
   <div class="container-fluid">
      <div class="card">
         <div class="card-body">
            <h4 class="card-title">
               Edit Student
            </h4>
            <form action="{{ route('student.registration.update',$editData->student_id)}}" method="post"  enctype="multipart/form-data">
               @csrf
               <input type="hidden" value="{{$editData->id}}" name="id">
               <!-- First Row  -->
               <div class="form-group row">
                  <div class="col-lg-4">
                     <h5>Student Name <span class="text-danger">&nbsp;*</span></h5>
                     <input type="text" class="form-control rounded" id="name" name="name" value="{{$editData->student->name}} " required>
                  </div>
                  <div class="col-lg-4">
                     <h5>Father's Name <span class="text-danger">&nbsp;*</span> </h5>
                     <input type="text" class="form-control rounded" id="fname" name="fname" value="{{$editData->student->fname}}" required>
                  </div>
                  <div class="col-lg-4">
                     <h5>Mother's Name <span class="text-danger">&nbsp;*</span></h5>
                     <input type="text" class="form-control rounded" id="Mname" name="Mname" value="{{$editData->student->mname}}" required>
                  </div>
               </div>
               <!--End First Row-->

               <!--Second First Row-->
               <div class="form-group row">
                  <div class="col-lg-4">
                     <h5>Mobile Number <span class="text-danger">&nbsp;*</span></h5>
                     <input type="text" class="form-control rounded" id="mobile" name="mobile" value="{{$editData->student->mobile}}" required>
                  </div>
                  <div class="col-lg-4">
                     <h5>Adress <span class="text-danger">&nbsp;*</span> </h5>
                     <input type="text" class="form-control rounded" id="adress" name="adress" value="{{$editData->student->adress}} " required>
                  </div>
                  <div class="col-lg-4">
                     <h5>Gender <span class="text-danger">&nbsp;*</span></h5>
                     <select class="form-control rounded" id="gender" name="gender" required>
                        <option value="" selected='' disabled="">
                           <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">Select gender</font>
                           </font>
                        </option>
                        <option value="Male" {{($editData->student->gender=='Male')?"selected":"" }}>
                           <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">Male</font>
                           </font>
                        </option>
                        <option value="Female" {{($editData->student->gender=='Female')?"selected":"" }}>
                           <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">Female</font>
                           </font>
                        </option>
                     </select>
                  </div>
               </div>
               <!--End Second Row-->

               <!--Third First Row-->
               <div class="form-group row">
                  <div class="col-lg-4">
                     <h5>Date of Birth <span class="text-danger">&nbsp;*</span></h5>
                     <input type="date" class="form-control rounded" id="dob" name="dob" value="{{$editData->student->dob}}" required>
                  </div>
                  <div class="col-lg-4">
                     <h5>Discount <span class="text-danger">&nbsp;*</span> </h5>
                     <input type="text" class="form-control rounded" id="discount" name="discount" value="{{(@$editData->discount->discount)?$editData->discount->discount:"0"}}" required>
                  </div>
                  <div class="col-lg-4">
                     <h5>Religion <span class="text-danger">&nbsp;*</span></h5>
                     <select class="form-control rounded" id="religion" name="religion" required>
                        <option value="Musulmain" {{($editData->student->religion=='Musulmain')?"selected":"" }}>
                           <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">Musulmain</font>
                           </font>
                        </option>
                        <option value="Laique" {{($editData->student->religion=='Laique')?"selected":"" }}>
                           <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">Laique</font>
                           </font>
                        </option>
                        <option value="Chritien" {{($editData->student->religion=='Chritien')?"selected":"" }}>
                           <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">Chritien</font>
                           </font>
                        </option>
                     </select>
                  </div>
               </div>
               <!-- End third Row--->

               <!---Fourth Row-->
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
               <!---End Fourth Row-->

               <!---Fiveth Row-->
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
                     <label>
                        <font style="vertical-align: inherit;">
                           <font style="vertical-align: inherit;">Student image</font>
                        </font>
                     </label>
                     <input type="file" id="image" name="image" value="{{ (!@$editData->student->image)?($editData->student->image):"" }}" class="form-control rounded">
                  </div>
                  <div class="col-lg-4 text-center mt-4">
                     <img id="showImage" src="{{(!empty($editData->student->image)) ?  url('upload/student_image/'.$editData->student->image) : url('upload/no_image.jpg') }}" width="70" height="70">
                  </div>
               </div>
               <!---End Fiveth Row-->
               <div class="modal-footer">
                  <input type="submit" value="Update" class="btn btn-primary btn-rounded">
               </div>
            </form>
         </div>
      </div>
   </div>

</div>

<script type='text/javascript'>
   $(document).ready(function() {
      $("#image").change(function(e) {
         var reader = new FileReader();
         reader.onload = function(e) {
            $('#showImage').attr('src', e.target.result);
         }
         reader.readAsDataURL(e.target.files['0']);
      });
   });
</script>
@endsection