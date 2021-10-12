@php
   $prefix = Request::route()->getPrefix();
   $route  = Route::current()->getName();
@endphp

<div class="nk-sidebar">
   <div class="nk-nav-scroll">
      <ul class="metismenu" id="menu">
         <li class="nav-label {{($prefix =='/dashbord') ? 'active' : ''}}">
            <a href="{{ route('dashboard') }}"> Dashboard</a>
         </li>
         <li class="mega-menu mega-menu-sm {{($prefix =='/user') ? 'active' : ''}}">
            <a class="has-arrow" href="javascript:void()" aria-expanded="false">
               <i class="icon-speedometer menu-icon"></i>
               <span class="nav-text">Manage user</span>
            </a>
            <ul aria-expanded="false">
               <li class="{{($route =='/user') ? 'active' : ''}}">
                  <a href="{{ route('view.user')}}" >View user</a>
               </li>
               <li class="{{($prefix =='/user') ? 'active' : ''}}">
                  <a href="{{ route('add.user')}}">Add user</a>
               </li>

               <!-- <li><a href="./index-2.html">Home 2</a></li> -->
            </ul>
         </li>
         <li class="mega-menu mega-menu-sm {{($prefix =='/profile') ? 'active' : ''}}">
            <a class="has-arrow" href="javascript:void()" aria-expanded="false">
               <i class="icon-globe-alt menu-icon"></i><span class="nav-text">Manage Profile    </span>
            </a>
            <ul aria-expanded="false">
               <li  class="{{($prefix =='/user') ? 'active' : ''}}">
                  <a href="{{ route('profile.view') }}">Your Profile</a>
               </li>
               <li  class="{{($prefix =='/user') ? 'active' : ''}}">
                  <a href="{{ route('profile.change.password') }}">Change Password</a>
               </li>
            </ul>
         </li> 
      </ul>
   </div>
</div>