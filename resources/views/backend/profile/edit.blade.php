@extends('admin.admin_master')

@section('main_admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="row justify-content-center">
   <div class="col-lg-12">
      <div class="card">
         <div class="card-body">
            <h4 class="card-title">
               <font style="vertical-align: inherit;">
                  <font style="vertical-align: inherit;">Manage Profile</font>
               </font>
            </h4>
            <div class="text-center col-md-12 " >           
               <img class="rounded-circle mr-3 " src="{{(!empty($editData->image)) ?  url('upload/admin_image/'.$editData->image) : url('upload/no_image.jpg') }}" width="120" height="120">
            </div>
            <div class="basic-form">
               <form method="post" action="{{ route('profile.update')}}" enctype="multipart/form-data">
                  @csrf
                  <div class="form-row mt-3">
                     <div class="form-group col-md-6">
                        <label>
                           <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">User Name</font>
                           </font>
                        </label>
                        <input type="text" name="name" class="form-control input-rounded" value="{{$editData->name }}">
                     </div>
                     <div class="form-group col-md-6">
                        <label>
                           <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">E-mail</font>
                           </font>
                        </label>
                        <input type="email" name="email" class="form-control input-rounded" value="{{$editData->email }}">
                     </div>
                  </div>
                  <div class="form-group">
                     <label>
                        <font style="vertical-align: inherit;">
                           <font style="vertical-align: inherit;">Adresse</font>
                        </font>
                     </label>
                     <input type="text" name="adress" class="form-control input-rounded" value="{{$editData->adress }}">
                  </div>
                  <div class="form-row">
                     <div class="form-group col-md-3">
                        <label>
                           <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">Mobile</font>
                           </font>
                        </label>
                        <input type="text" name="mobile" class="form-control input-rounded" value="{{$editData->mobile  }}">
                     </div>
                     <div class="form-group col-md-3">
                        <label>
                           <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">Select Gender</font>
                           </font>
                        </label>
                        <select id="inputState" name="gender" class="form-control custom-select input-rounded">
                           <option selected="selected">
                              <font style="vertical-align: inherit;">
                                 <font style="vertical-align: inherit;">Choisir...</font>
                              </font>
                           </option>
                           <option value="Man" {{ ($editData->gender == 'Man') ? 'selected' : ''}}>
                              <font style="vertical-align: inherit;">
                                 <font style="vertical-align: inherit;">Man</font>
                              </font>
                           </option>
                           <option value="Woman" {{ ($editData->gender == 'Woman') ? 'selected' : ''}}>
                              <font style="vertical-align: inherit;">
                                 <font style="vertical-align: inherit;">Woman</font>
                              </font>
                           </option>
                        </select>
                     </div>
                     <div class="form-group col-md-3">
                        <label>
                           <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">Profile image</font>
                           </font>
                        </label>
                        <input type="file"  id ="image" name="image" class="form-control input-rounded">
                     </div>
                     <div class="form-group col-md-3 text-center mt-2">
                       <img id="showImage" src="{{(!empty($editData->image)) ?  url('upload/admin_image/'.$editData->image) : url('upload/no_image.jpg') }}" width="70" height="70">
                     </div>
                  </div>
                  <div class="form-row">
                     <div class="form-group col-md-12 mt-3">
                        <label>
                           <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;"></font>
                           </font>
                        </label>
                        <input type="submit" value="Update" class="btn btn-primary btn-rounded" style="float:right;">
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>

<script type='text/javascript'>
   $(document).ready(function(){
      $("#image").change(function(e){
         var reader = new FileReader();
         reader.onload = function(e){
            $('#showImage').attr('src',e.target.result);
         }
         reader.readAsDataURL(e.target.files['0']);
      });
   });
</script>
@endsection