@extends('admin.admin_master')

@section('main_admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="row">
   <div class="row col-lg-12">
      <div class="col-lg-4">
         <div class="row page-titles mx-0">
            <div class="p-md-0">
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="javascript:void(0)">Student</a></li>
                  <li class="breadcrumb-item active"><a href="javascript:void(0)">Roll Generator</a></li>
               </ol>
            </div>
         </div>
      </div>
   </div>

   <div class="container">
      <div class="col-lg-12">
         <div class="card">
            <div class="card-body">
               <h4 class="card-title">
                  Student Search :
               </h4>
               <form method="post" action="{{ route('roll.generate.store')}}">
                  @csrf
                  <div class="row">
                     <div class="col-lg-4">
                        <select class="form-control rounded" id="year_id" name="year_id">
                           <option value="" selected='' disabled="">
                              <font style="vertical-align: inherit;">
                                 <font style="vertical-align: inherit;">Search By Year</font>
                              </font>
                           </option>
                           @foreach($years as $year)
                           <option value="{{ $year->id}}">
                              <font style="vertical-align: inherit;">
                                 <font style="vertical-align: inherit;">{{ $year->name}}</font>
                              </font>
                           </option>
                           @endforeach
                        </select>
                     </div>
                     <div class="col-lg-4">
                        <select class="form-control rounded" id="class_id" name="class_id">
                           <option value="" selected='' disabled="">
                              <font style="vertical-align: inherit;">
                                 <font style="vertical-align: inherit;">Search By Class</font>
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
                     <div class="col-lg-4 ">
                        <a class="btn btn-rounded btn-dark" name="Search_rol" id="Search_rol">Search ...</a>
                     </div>
                  </div>
                  <table class="table header-border d-none" id="roll-generate">
                     <thead>
                        <tr>
                           <th scope="col">
                              <font style="vertical-align: inherit;">
                                 <font style="vertical-align: inherit;">ID No</font>
                              </font>
                           </th>
                           <th scope="col">
                              <font style="vertical-align: inherit;">
                                 <font style="vertical-align: inherit;">Student Name</font>
                              </font>
                           </th>
                           <th scope="col">
                              <font style="vertical-align: inherit;">
                                 <font style="vertical-align: inherit;">Father Name</font>
                              </font>
                           </th>
                           <th scope="col">
                              <font style="vertical-align: inherit;">
                                 <font style="vertical-align: inherit;">Gender</font>
                              </font>
                           </th>
                           <th scope="col">
                              <font style="vertical-align: inherit;">
                                 <font style="vertical-align: inherit;">Roll</font>
                              </font>
                           </th>
                        </tr>
                     </thead>
                     <tbody id="roll-generat-tr">

                     </tbody>
                  </table>

                  <input type="submit" value="Roll Generator" class="btn btn-info">
               </form>
            </div>
         </div>
      </div>
   </div>
</div>

<script type="text/javascript">
   $(document).on('click', '#Search_rol', function() {
      var year_id = $('#year_id').val();
      var class_id = $('#class_id').val();
      $.ajax({
         url: "{{route('student.registration.getStudent')}}",
         type: "GET",
         data: {
            'year_id': year_id,
            'class_id': class_id
         },
         success: function(data) {
            $('#roll-generate').removeClass('d-none');
            var html = '';
            $.each(data, function(key, v) {
               html +=
                  '<tr>' +
                  '<td>' + v.student.id_no + '<input type="hidden" name="student_id[]" value="' + v.student_id + '"></td>' +
                  '<td>' + v.student.name + '</td>' +
                  '<td>' + v.student.name + '</td>' +
                  '<td>' + v.student.gender + '</td>' +
                  '<td> <input type="text" class="form-control rounded" name="roll[]" value="' + v.roll + '"> </td>' +
                  '</tr>'
            });
            html = $('#roll-generat-tr').html(html);
         }
      });
   });
</script>

@endsection