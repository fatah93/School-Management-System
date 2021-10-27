@extends('admin.admin_master')

@section('main_admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@include('student_management.student_registration.add_student')

<div class="row">
   <div class="row col-lg-12">
      <div class="col-lg-4">
         <div class="row page-titles mx-0">
            <div class="p-md-0">
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="javascript:void(0)">Student</a></li>
                  <li class="breadcrumb-item active"><a href="javascript:void(0)">View List</a></li>
               </ol>
            </div>
         </div>
      </div>
      <div class="col-lg-8">
         <button class="btn btn-primary btn-rounded mt-2" data-toggle="modal" data-target="#AddStudentList" style="float: right;">Add Student</button>
      </div>
   </div>

   <div class="container">
      <div class="col-lg-12">
         <div class="card">
            <div class="card-body">
               <h4 class="card-title">
                  Student Search :
               </h4>
               <form method="get" action="{{ route('student.year.class.wise')}}">
                  @csrf
                  <div class="row">
                     <div class="col-lg-4">
                        <select class="form-control rounded" id="year" name="year_id">
                           <option value="" selected='' disabled="">
                              <font style="vertical-align: inherit;">
                                 <font style="vertical-align: inherit;">Search By Year</font>
                              </font>
                           </option>
                           @foreach($Years as $year)
                           <option value="{{ $year->id}}" {{@$year_id == $year->id ? "selected":""}}>
                              <font style="vertical-align: inherit;">
                                 <font style="vertical-align: inherit;">{{ $year->name}}</font>
                              </font>
                           </option>
                           @endforeach
                        </select>
                     </div>
                     <div class="col-lg-4">
                        <select class="form-control rounded" id="class" name="class_id">
                           <option value="" selected='' disabled="">
                              <font style="vertical-align: inherit;">
                                 <font style="vertical-align: inherit;">Search By Class</font>
                              </font>
                           </option>
                           @foreach($Classes as $class)
                           <option value="{{ $class->id}}" {{@$class_id == $class->id ? "selected":""}}>
                              <font style="vertical-align: inherit;">
                                 <font style="vertical-align: inherit;">{{ $class->name}}</font>
                              </font>
                           </option>
                           @endforeach
                        </select>
                     </div>
                     <div class="col-lg-4 ">
                        <input type="submit" class="btn btn-rounded btn-dark" value="Search ..." name="search">
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>

   <!-- row -->
   <div class="container-fluid">
      <div class="row">
         <div class="col-12">
            <div class="card">
               <div class="card-body">
                  @if(count($AllData)>=1)
                  <div class="table-responsive">
                     <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                        <h5>List Student :</h5>
                        <hr>
                        <div class="row">
                           <div class="col-sm-12">
                              @if(!@search)
                              <table class="table table-hover" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                 <thead>
                                    <tr role="row">
                                       <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Nom : activer pour trier les colonnes par ordre décroissant" style="width: 124.719px;">
                                          SL
                                       </th>
                                       <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Nom : activer pour trier les colonnes par ordre décroissant" style="width: 124.719px;">
                                          Name
                                       </th>
                                       <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Nom : activer pour trier les colonnes par ordre décroissant" style="width: 124.719px;">
                                          ID No
                                       </th>
                                       <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Nom : activer pour trier les colonnes par ordre décroissant" style="width: 124.719px;">
                                          Roll
                                       </th>
                                       <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Nom : activer pour trier les colonnes par ordre décroissant" style="width: 124.719px;">
                                          Year
                                       </th>
                                       <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Nom : activer pour trier les colonnes par ordre décroissant" style="width: 124.719px;">
                                          Class
                                       </th>
                                       <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Nom : activer pour trier les colonnes par ordre décroissant" style="width: 124.719px;">
                                          Image
                                       </th>
                                       @if(auth()->check() && Auth::user()->role == "admin")
                                       <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Nom : activer pour trier les colonnes par ordre décroissant" style="width: 124.719px;">
                                          Code
                                       </th>
                                       @endif
                                       <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Date de début : activer pour trier les colonnes par ordre croissant" style="width: 83.5938px;">
                                          Action
                                       </th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    @foreach($AllData as $key=>$value)
                                    <tr role="row" class="odd">
                                       <td width='5%'>{{$key+1}} </td>
                                       <td width='15%'>{{ $value->student->name}}</td>
                                       <td width='10%'>{{ $value->student->id_no}}</td>
                                       <td width='10%'>{{ ($value->roll)?$value->student->roll:"//"}} </td>
                                       <td width='10%'>{{ $value->student_year->name}} </td>
                                       <td width='15%'>{{ $value->student_class->name}} </td>
                                       <td width='10%'>
                                          <img class="rounded-circle mr-3" src="{{ (!empty($value->student->image))?url('upload/student_image/'.$value->student->image):'No image'}}" height="40" width="40" alt="">
                                       </td>
                                       <td width='10%'>{{ $value->student->code}} </td>
                                       <td width='20%'>
                                          <a href="{{ route('student.registration.edit',$value->student_id)}}">
                                             <i class="fa fa-pencil color-muted m-r-5"></i>
                                          </a>
                                          <a href="" id="delete">
                                             <i class="fa fa-trash color-muted m-r-5"></i>
                                          </a>
                                          <a href="{{ route('student.registration.promotion',$value->student_id)}}">
                                             <i class="fa fa-check color-muted m-r-5"></i>
                                          </a>
                                          <a target="_blank" href="{{ route('student.registration.details',$value->student_id)}}">
                                             <i class="fa fa-eye color-muted m-r-5"></i>
                                          </a>
                                          <!--Student class update-->

                                          <!-- End form update name class-->
                                       </td>
                                    </tr>
                                    @endforeach
                                 </tbody>
                              </table>
                              @else
                              <table class="table table-hover" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                 <thead>
                                    <tr role="row">
                                       <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Nom : activer pour trier les colonnes par ordre décroissant" style="width: 124.719px;">
                                          SL
                                       </th>
                                       <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Nom : activer pour trier les colonnes par ordre décroissant" style="width: 124.719px;">
                                          Name
                                       </th>
                                       <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Nom : activer pour trier les colonnes par ordre décroissant" style="width: 124.719px;">
                                          ID No
                                       </th>
                                       <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Nom : activer pour trier les colonnes par ordre décroissant" style="width: 124.719px;">
                                          Roll
                                       </th>
                                       <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Nom : activer pour trier les colonnes par ordre décroissant" style="width: 124.719px;">
                                          Year
                                       </th>
                                       <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Nom : activer pour trier les colonnes par ordre décroissant" style="width: 124.719px;">
                                          Class
                                       </th>
                                       <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Nom : activer pour trier les colonnes par ordre décroissant" style="width: 124.719px;">
                                          Image
                                       </th>
                                       @if(auth()->check() && Auth::user()->role == "Admin")
                                       <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Nom : activer pour trier les colonnes par ordre décroissant" style="width: 124.719px;">
                                          Code
                                       </th>
                                       @endif
                                       <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Date de début : activer pour trier les colonnes par ordre croissant" style="width: 83.5938px;">
                                          Action
                                       </th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    @foreach($AllData as $key=>$value)
                                    <tr role="row" class="odd">
                                       <td width='5%'>{{$key+1}} </td>
                                       <td width='15%'>{{ $value->student->name}}</td>
                                       <td width='10%'>{{ $value->student->id_no}}</td>
                                       <td width='10%'>{{ $value->student->roll}} </td>
                                       <td width='10%'>{{ $value->student_year->name}} </td>
                                       <td width='15%'>{{ $value->student_class->name}} </td>
                                       <td width='10%'>
                                          <img class="rounded-circle mr-3" src="{{ (!empty($value->student->image))?url('upload/student_image/'.$value->student->image):'No image'}}" height="40" width="40" alt="">
                                       </td>
                                       <td width='10%'>{{ $value->student->code}} </td>
                                       <td width='15%'>
                                          <a href="{{ route('student.registration.edit',$value->student_id)}}">
                                             <i class="fa fa-pencil color-muted m-r-5"></i>
                                          </a> &nbsp;
                                          <a href="" id="delete">
                                             <i class="fa fa-trash color-muted m-r-5"></i>
                                          </a> &nbsp;
                                          <a href="{{ route('student.registration.promotion',$value->student_id)}}">
                                             <i class="fa fa-check color-muted m-r-5"></i>
                                          </a>

                                          <a target="_blank" href="{{ route('student.registration.details',$value->student_id)}}">
                                             <i class="fa fa-eye color-muted m-r-5"></i>
                                          </a>
                                          <!--Student class update-->

                                          <!-- End form update name class-->
                                       </td>
                                    </tr>
                                    @endforeach
                                 </tbody>
                              </table>
                              @endif
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-sm-12 col-md-5">
                              <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">
                                 <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">Affichage de 1 à 10 sur 57 entrées</font>
                                 </font>
                              </div>
                           </div>
                           <div class="col-sm-12 col-md-7">
                              <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                                 <ul class="pagination">
                                    <li class="paginate_button page-item previous disabled" id="DataTables_Table_0_previous"><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="0" tabindex="0" class="page-link">
                                          <font style="vertical-align: inherit;">
                                             <font style="vertical-align: inherit;">Précédent</font>
                                          </font>
                                       </a></li>
                                    <li class="paginate_button page-item active"><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="1" tabindex="0" class="page-link">
                                          <font style="vertical-align: inherit;">
                                             <font style="vertical-align: inherit;">1</font>
                                          </font>
                                       </a></li>
                                    <li class="paginate_button page-item "><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="2" tabindex="0" class="page-link">
                                          <font style="vertical-align: inherit;">
                                             <font style="vertical-align: inherit;">2</font>
                                          </font>
                                       </a></li>
                                    <li class="paginate_button page-item "><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="3" tabindex="0" class="page-link">
                                          <font style="vertical-align: inherit;">
                                             <font style="vertical-align: inherit;">3</font>
                                          </font>
                                       </a></li>
                                    <li class="paginate_button page-item "><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="4" tabindex="0" class="page-link">
                                          <font style="vertical-align: inherit;">
                                             <font style="vertical-align: inherit;">4</font>
                                          </font>
                                       </a></li>
                                    <li class="paginate_button page-item "><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="5" tabindex="0" class="page-link">
                                          <font style="vertical-align: inherit;">
                                             <font style="vertical-align: inherit;">5</font>
                                          </font>
                                       </a></li>
                                    <li class="paginate_button page-item "><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="6" tabindex="0" class="page-link">
                                          <font style="vertical-align: inherit;">
                                             <font style="vertical-align: inherit;">6</font>
                                          </font>
                                       </a></li>
                                    <li class="paginate_button page-item next" id="DataTables_Table_0_next"><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="7" tabindex="0" class="page-link">
                                          <font style="vertical-align: inherit;">
                                             <font style="vertical-align: inherit;">Prochain</font>
                                          </font>
                                       </a></li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  @else
                  <p>No data selected for student regsitation add new one</p>
                  @endif
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!--Student class Store-->

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