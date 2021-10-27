@php
$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();
@endphp

<div class="nk-sidebar">
   <div class="nk-nav-scroll">
      <ul class="metismenu" id="menu">
         <li class="nav-label {{($prefix =='/dashbord') ? 'active' : ''}}">
            <a href="{{ route('dashboard') }}"> Dashboard</a>
         </li>
         @if(auth()->check() && Auth::user()->role=="Admin")
         <li class="mega-menu mega-menu-sm {{($prefix =='/user') ? 'active' : ''}}">
            <a class="has-arrow" href="javascript:void()" aria-expanded="false">
               <i class="icon-speedometer menu-icon"></i>
               <span class="nav-text">Manage user</span>
            </a>
            <ul aria-expanded="false">
               <li>
                  <a href="{{ route('view.user')}}"> View user</a>
               </li>
               <li>
                  <a href="{{ route('add.user')}}">Add user</a>
               </li>

               <!-- <li><a href="./index-2.html">Home 2</a></li> -->
            </ul>
         </li>
         @endif
         <li class="mega-menu mega-menu-sm {{($prefix =='/profile') ? 'active' : ''}}">
            <a class="has-arrow" href="javascript:void()" aria-expanded="false">
               <i class="icon-globe-alt menu-icon"></i><span class="nav-text">Manage Profile </span>
            </a>
            <ul aria-expanded="false">
               <li>
                  <a href="{{ route('profile.view') }}">Your Profile</a>
               </li>
               <li>
                  <a href="{{ route('profile.change.password') }}">Change Password</a>
               </li>
            </ul>
         </li>

         <li class="mega-menu mega-menu-sm {{($prefix =='/Setup') ? 'active' : ''}}">
            <a class="has-arrow" href="javascript:void()" aria-expanded="false">
               <i class="icon-globe-alt menu-icon"></i><span class="nav-text">Setup Management</span>
            </a>
            <ul aria-expanded="false">
               <li>
                  <a href="{{ route('stuent.class.view') }}">Student Class</a>
               </li>
               <li>
                  <a href="{{ route('stuent.year.view') }}">Student Year</a>
               </li>
               <li>
                  <a href="{{ route('stuent.group.view') }}">Student Group</a>
               </li>
               <li>
                  <a href="{{ route('stuent.shift.view') }}">Student Shift</a>
               </li>
               <li>
                  <a href="{{ route('fee.category.view') }}">Fee Category</a>
               </li>
               <li>
                  <a href="{{ route('fee.amount.view') }}">Fee Category Amount</a>
               </li>
               <li>
                  <a href="{{ route('exam.type.view') }}">Exam Type</a>
               </li>
               <li>
                  <a href="{{ route('school.subject.view') }}">School Subject</a>
               </li>
               <li>
                  <a href="{{ route('assign.subject.view') }}">Assign Subject</a>
               </li>
               <li>
                  <a href="{{ route('designation.view') }}">Designation</a>
               </li>
            </ul>
         </li>
         <li class="mega-menu mega-menu-sm {{($prefix =='/Student') ? 'active' : ''}}">
            <a class="has-arrow" href="javascript:void()" aria-expanded="false">
               <i class="icon-globe-alt menu-icon"></i><span class="nav-text">Student Management</span>
            </a>
            <ul aria-expanded="false">
               <li>
                  <a href="{{ route('stuent.registration.view') }}">Student Resgistration</a>
               </li>
               <li>
                  <a href="{{ route('role.generate.view') }}">Roll Generate</a>
               </li>
               <li>
                  <a href="{{ route('registation.fee.view') }}">Registration fee</a>
               </li>
               <li>
                  <a href="{{ route('monthly.fee.view') }}">Monthly fee</a>
               </li>
               <li>
                  <a href="{{ route('exam.fee.view') }}">Exam fee</a>
               </li>
            </ul>
         </li>
      </ul>
   </div>
</div>