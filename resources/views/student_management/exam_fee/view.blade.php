@extends('admin.admin_master')
@section('main_admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.7/handlebars.min.js" 
        integrity="sha512-RNLkV3d+aLtfcpEyFG8jRbnWHxUqVZozacROI4J2F1sTaDqo1dPQYs01OMi1t1w9Y2FdbSCDSQ2ZVdAC8bzgAg==" 
        crossorigin="anonymous" referrerpolicy="no-referrer">
</script>

<div class="row">
   <div class="row col-lg-12">
      <div class="col-lg-4">
         <div class="row page-titles mx-0">
            <div class="p-md-0">
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="javascript:void(0)">Student</a></li>
                  <li class="breadcrumb-item active"><a href="javascript:void(0)">Exam Fee</a></li>
               </ol>
            </div>
         </div>
      </div>
   </div>

   <div class="container">
      <div class="col-lg-12">
         <div class="card">
            <div class="card-body">
               <div class="row">
                  <div class="col-lg-3">
                     <select class="form-control rounded" id="year_id" name="year_id">
                        <option value="" selected='' disabled="">
                           <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">Select Year</font>
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
                  <div class="col-lg-3">
                     <select class="form-control rounded" id="class_id" name="class_id">
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
                  <div class="col-lg-3">
                     <select class="form-control rounded" id="exam_type_id" name="exam_type_id">
                        <option value="" selected='' disabled="">Select Exam Type</option>
                        @foreach($examType as $exam)
                           <option value="{{ $exam->id}}">{{ $exam->name}}</option>
                        @endforeach
                     </select>
                  </div>
                  <div class="col-lg-3 ">
                     <a class="btn btn-rounded btn-dark" name="Search_rol" id="Search_rol">Search ...</a>
                  </div>
               </div>
               <div class="row">
                  <div class="col-lg-12">
                     <div id="documentResults">
                        <script type="text/x-handlebars-template" id="document-template">
                           <table class="table header-border">
                              <thead>
                                 <tr>
                                    @{{{thsource}}}
                                 </tr>
                              </thead>
                              <tbody>
                                 @{{#each this}}
                                    <tr>
                                       @{{{tdsource}}}
                                    </tr>
                                 @{{/each}}
                              </tbody>
                           </table>
                        </script>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<script type="text/javascript">
   $(document).on('click', '#Search_rol', function() {
      var year_id = $('#year_id').val();
      var class_id = $('#class_id').val();
      var exam_type_id = $('#exam_type_id').val();
      $.ajax({
         url: "{{route('student.exam.fee.classewise.get')}}",
         type: "GET",
         data: {
            'year_id': year_id,
            'class_id': class_id,
            'exam_type_id' : exam_type_id
         },
         beforeSend: function(){

         },
         success: function(data) {
            var source = $('#document-template').html();
            var template = Handlebars.compile(source);
            var html = template(data);
           $('#documentResults').html(html);
           $('[data-toggle="tooltip"]').tooltip();
         }
      });
   });
</script>

@endsection