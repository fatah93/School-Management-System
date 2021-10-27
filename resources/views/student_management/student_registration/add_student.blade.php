<form action="{{ route('sotre.student.registration')}}" method="post" autocomplete="off" enctype="multipart/form-data">
   @csrf
   <div class="modal fade bd-example-modal-lg" id="AddStudentList" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title">Add Student</h5>
               <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <!-- First Row  -->
               <div class="form-group row">
                  <div class="col-lg-4">
                     <h5>Student Name <span class="text-danger">&nbsp;*</span></h5>
                     <input type="text" class="form-control rounded" id="name" name="name" placeholder="Enter student name" required>
                  </div>
                  <div class="col-lg-4">
                     <h5>Father's Name <span class="text-danger">&nbsp;*</span> </h5>
                     <input type="text" class="form-control rounded" id="fname" name="fname" placeholder="Father's Student name" required>
                  </div>
                  <div class="col-lg-4">
                     <h5>Mother's Name <span class="text-danger">&nbsp;*</span></h5>
                     <input type="text" class="form-control rounded" id="Mname" name="Mname" placeholder="Mother's student name" required>
                  </div>
               </div>
               <!--End First Row-->

               <!--Second First Row-->
               <div class="form-group row">
                  <div class="col-lg-4">
                     <h5>Mobile Number <span class="text-danger">&nbsp;*</span></h5>
                     <input type="text" class="form-control rounded" id="mobile" name="mobile" placeholder="Enter Mobile Number" required>
                  </div>
                  <div class="col-lg-4">
                     <h5>Adress <span class="text-danger">&nbsp;*</span> </h5>
                     <input type="text" class="form-control rounded" id="adress" name="adress" placeholder=" Enter Student adress" required>
                  </div>
                  <div class="col-lg-4">
                     <h5>Gender <span class="text-danger">&nbsp;*</span></h5>
                     <select class="form-control rounded" id="gender" name="gender" required>
                        <option value="" selected='' disabled="">
                           <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">Select gender</font>
                           </font>
                        </option>
                        <option value="Male">
                           <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">Male</font>
                           </font>
                        </option>
                        <option value="Female">
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
                     <input type="date" class="form-control rounded" id="dob" name="dob" required>
                  </div>
                  <div class="col-lg-4">
                     <h5>Discount <span class="text-danger">&nbsp;*</span> </h5>
                     <input type="text" class="form-control rounded" id="discount" name="discount" placeholder=" Enter Student adress" required>
                  </div>
                  <div class="col-lg-4">
                     <h5>Religion <span class="text-danger">&nbsp;*</span></h5>
                     <select class="form-control rounded" id="religion" name="religion" required>
                        <option value="" selected='' disabled="">
                           <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">Select Religion</font>
                           </font>
                        </option>
                        <option value="Musulmain">
                           <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">Musulmain</font>
                           </font>
                        </option>
                        <option value="Laique">
                           <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">Laique</font>
                           </font>
                        </option>
                        <option value="Chritien">
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
                        <option value="" selected='' disabled="">
                           <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">Select year</font>
                           </font>
                        </option>
                        @foreach($Years as $year)
                        <option value="{{ $year->id}}">
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
                        <option value="" selected='' disabled="">
                           <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">Select class</font>
                           </font>
                        </option>
                        @foreach($Classes as $class)
                        <option value="{{ $class->id}}">
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
                        <option value="" selected='' disabled="">
                           <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">Select Group</font>
                           </font>
                        </option>
                        @foreach($groupes as $group)
                        <option value="{{ $group->id}}">
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
                        <option value="" selected='' disabled="">
                           <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">Select Shift</font>
                           </font>
                        </option>
                        @foreach($Shifts as $shift)
                        <option value="{{ $shift->id}}">
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
                     <input type="file" id="image" name="image" class="form-control rounded">
                  </div>
                  <div class="col-lg-4 text-center mt-4">
                     <img id="showImage" src="{{(!empty($AllData->image)) ?  url('upload/student_image/'.$AllData->image) : url('upload/no_image.jpg') }}" width="70" height="70">
                  </div>
               </div>
               <!---End Fiveth Row-->
            </div>
            <div class="modal-footer">
               <input type="submit" value="Insert" class="btn btn-primary btn-rounded">
            </div>
         </div>
      </div>
   </div>
</form>