@extends('admin.admin_master')

@section('main_admin')
<div class="col-12">
   <div class="card">
      <div class="card-body">
         <div class="text-center">
            <div class="row">
               <div class="col" style="float: left;">
               </div>
               <div class="col">
                  <img class="rounded-circle mr-3" src="{{(!empty($user->image)) ?  url('upload/admin_image/'.$user->image) : url('upload/no_image.jpg') }}" width="120" height="120">
               </div>
               <div class="col">
                  <a href="{{ route('profile.edit')}}" class="btn btn-primary input-rounded" style="float: right;">Edit profile</a>
               </div>
            </div>
            <div class="media-body">
               <h3 class="mb-0">
                  <font style="vertical-align: inherit;">
                     <font style="vertical-align: inherit;">{{ $user->name}}</font>
                  </font>
               </h3>
            </div>
         </div>

         <h4>
            <font style="vertical-align: inherit;">
               <font style="vertical-align: inherit;">About Me :</font>
            </font>
         </h4>
         <p class="text-muted">
            <font style="vertical-align: inherit;">
               <font style="vertical-align: inherit;">Hi i'm {{$user->name}}, i'am a {{($user->role== "admin")?"Adminstrator" : "Operator"}} in Hamma School.</font>
            </font>
         </p>
         <ul class="card-profile__info">
            <li class="mb-1 form-group row">
               <strong class="text-dark mr-4 col-md-4">
                  <font style="vertical-align: inherit;">
                     <font style="vertical-align: inherit;">Mobile </font>
                  </font>
               </strong>
               <span class="col-md-4">
                  <font style="vertical-align: inherit;">
                     <font style="vertical-align: inherit;">{{$user->mobile}}</font>
                  </font>
               </span>
            </li>
            <li class="mb-1 form-group row">
               <strong class="text-dark mr-4 col-md-4">
                  <font style="vertical-align: inherit;">
                     <font style="vertical-align: inherit;">Email </font>
                  </font>
               </strong>
               <span class="col-md-4">
                  <font style="vertical-align: inherit;">
                     <font style="vertical-align: inherit;">{{$user->email }}</font>
                  </font>
               </span>
            </li>
            <li class="mb-1 form-group row">
               <strong class="text-dark mr-4 col-md-4">
                  <font style="vertical-align: inherit;">
                     <font style="vertical-align: inherit;">Gender </font>
                  </font>
               </strong>
               <span class="col-md-4">
                  <font style="vertical-align: inherit;">
                     <font style="vertical-align: inherit;">{{$user->gender }}</font>
                  </font>
               </span>
            </li>
            <li class="mb-1 form-group row">
               <strong class="text-dark mr-4 col-md-4">
                  <font style="vertical-align: inherit;">
                     <font style="vertical-align: inherit;">Adress </font>
                  </font>
               </strong>
               <span class="col-md-4">
                  <font style="vertical-align: inherit;">
                     <font style="vertical-align: inherit;">{{$user->adress }}</font>
                  </font>
               </span>
            </li>
            <li class="mb-1 form-group row">
               <strong class="text-dark mr-4 col-md-4">
                  <font style="vertical-align: inherit;">
                     <font style="vertical-align: inherit;">Registerd </font>
                  </font>
               </strong>
               <span class="col-md-4">
                  <font style="vertical-align: inherit;">
                     <font style="vertical-align: inherit;">{{($user->created_at->diffForHumans())?$user->created_at->diffForHumans():"No date" }}</font>
                  </font>
               </span>
            </li>
            @if($user->updated_at)
            <li class="mb-1 form-group row">
               <strong class="text-dark mr-4 col-md-4">
                  <font style="vertical-align: inherit;">
                     <font style="vertical-align: inherit;">Updated </font>
                  </font>
               </strong>
               <span class="col-md-4">
                  <font style="vertical-align: inherit;">
                     <font style="vertical-align: inherit;">{{$user->updated_at->diffForHumans()}}</font>
                  </font>
               </span>
            </li>
            @else
            <li class="mb-1 form-group row">
               <strong class="text-dark mr-4 col-md-4">
                  <font style="vertical-align: inherit;">
                     <font style="vertical-align: inherit;">Updated </font>
                  </font>
               </strong>
               <span class="col-md-4 text-danger">
                  <font style="vertical-align: inherit;">
                     <font style="vertical-align: inherit;">No date selected</font>
                  </font>
               </span>
            </li>
            @endif
         </ul>
      </div>
   </div>
</div>
@endsection